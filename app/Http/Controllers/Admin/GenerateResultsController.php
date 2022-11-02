<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGenerateResultRequest;
use App\Http\Requests\StoreGenerateResultRequest;
use App\Http\Requests\UpdateGenerateResultRequest;
use App\Models\AuditScore;
use App\Models\Category;
use App\Models\Criterion;
use App\Models\EliminationRound;
use App\Models\Judge;
use App\Models\MonitroAverage;
use App\Models\Participant;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class GenerateResultsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('generate_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Title::select('id','title','status', 'basetype')->get();
        //echo $titles = Title::select()->get();

        //echo $titles->where('id', '1')->first()->basetype;
        return view('admin.generateResults.index', compact('titles'));
    }

    public function selectedCategory(){
        abort_if(Gate::denies('generate_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $result = Category::where('title_id', request()->input('title_id', 0))->select('id','name', 'percentage')->get();//->pluck( 'name', 'id');

        //echo $result;
        return response()->json($result);

    }

    public function generateParticipantCriteria(){


        $categorySelected = request()->input('category_id', 0);
        $criteriaSelected = request()->input('criteria_id', 0);
        $tabulations = Title::where(['id' => request()->input('title_id', 0)])->firstOrfail();
        $judgeData = Judge::where(['status' => 'true', 'title_id' => $tabulations->id])->orderBy('id', 'asc')->get();
        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected])->first();
        $criterias = Criterion::where(['title_id' => $tabulations->id, 'id' => $criteriaSelected])->first();


        $tableArray = array();
        $scoreValue = "";

        if ($tabulations->basetype == 'single') {
            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true'] )->orderBy('number', 'asc')->orderBy('type', 'ASC')->get();

            $tableArray[0]  = '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category name "'. $categories->name .'" with criteria name of "'. $criterias->name .'".</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double1" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn1" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){
                                                //AuditScore
                                                //$scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                $scoreValue = AuditScore::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, 'criteria_id' => $criteriaSelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->scores;

                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                                        $averageScore = floatval($totalScore)/floatval($judgeData->count());
                                        $convertOrigScore = floatval($averageScore)/floatval($tabulations->score_max);
                                        $getAverageScore = round((floatval($convertOrigScore)*100), 2);
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage="'. ($rowcount+1) .'">
                                            '. $getAverageScore .'%
                                            </label>

                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" readonly>
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>
                            <hr>
                        <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">

                </div>
            </div>
            ';

        }else{

            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true', 'type' => '1'] )->orderBy('number', 'asc')->get();
            $tableArray[0]  = '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Male - Category name "'. $categories->name .'" with criteria name of "'. $criterias->name .'".</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double1" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn1" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){
                                                //AuditScore
                                                //$scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                $scoreValue = AuditScore::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, 'criteria_id' => $criteriaSelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->scores;

                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                                        $averageScore = floatval($totalScore)/floatval($judgeData->count());
                                        $convertOrigScore = floatval($averageScore)/floatval($tabulations->score_max);
                                        $getAverageScore = round((floatval($convertOrigScore)*100), 2);
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage="'. ($rowcount+1) .'">
                                            '. $getAverageScore .'%
                                            </label>

                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" readonly>
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>

                </div>
            </div>
            ';

            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true', 'type' => '2'] )->orderBy('number', 'asc')->get();
            $tableArray[0] .= '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Female - Category name "'. $categories->name .'" with criteria name of "'. $criterias->name .'".</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double2" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn2" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){
                                                //AuditScore
                                                //$scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                $scoreValue = AuditScore::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, 'criteria_id' => $criteriaSelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->scores;

                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                                        $averageScore = floatval($totalScore)/floatval($judgeData->count());
                                        $convertOrigScore = floatval($averageScore)/floatval($tabulations->score_max);
                                        $getAverageScore = round((floatval($convertOrigScore)*100), 2);
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage="'. ($rowcount+1) .'">
                                            '. $getAverageScore .'%
                                            </label>

                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" readonly>
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>
                            <hr>
                        <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">

                </div>
            </div>
            ';
        }


        return response()->json(array_values($tableArray));
    }

    public function generateParticipant(){
        $MultipleCat = count(request()->input('category_id', 0));

        if ($MultipleCat == '1') {

                $this->generateDataTable(request()->input('category_id', 0)[0]);

        }else{
            for ($keyCount=0; $keyCount < $MultipleCat; $keyCount++) {
                    $this->generateMultiDataTable(request()->input('category_id', 0)[$keyCount], $keyCount);
            }

            $this->generateMultiAverageDataTable(request()->input('category_id', 0));

        }
    }

    public function generateDataTable($categorySelected){
        //echo 'working page<br>::' . request()->input('category_id', 0)[0];
        //return count(request()->input('category_id', 0));
        $MultipleCat = count(request()->input('category_id', 0));

        $tabulations = Title::where(['id' => request()->input('title_id', 0)])->firstOrfail();
        $judgeData = Judge::where(['status' => 'true', 'title_id' => $tabulations->id])->orderBy('id', 'asc')->get();
        $categoriesElim = Category::where(['title_id' => $tabulations->id])->get();
        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected])->first();
        $judgeAverage = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected])->get();

        $tableArray = array();
        $scoreValue = "";

        if ($tabulations->basetype == 'single') {
            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true'] )->orderBy('number', 'asc')->orderBy('type', 'ASC')->get();

            $tableArray[0]  = '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category name :: '. $categories->name .'</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double1" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn1" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){

                                                $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                // if ($scoreValue) {
                                                //     $scoreValue = $judgeAverage->where("judge_id", $judge->id )->where("participant_id", $participant->id )->first()->average;
                                                // }else{
                                                //     $scoreValue = "";
                                                // }
                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage="'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>

                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" name="'. ($a++)  . ($rowcount+1) .'" data-participant-id="'. $participant->id .'">
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>
                            <hr>
                            <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">';
                        foreach ($categoriesElim as $key => $categoriesElimate) {
                            if ($categoriesElimate->partipants > 0) {
                    $tableArray[0]  .= '<input type="button" class="btn btn-primary px-3 m-1 moveParticipant"
                                        value="Move to '. $categoriesElimate->name .'" style="float: right;"
                                        data-category-id="'. $categoriesElimate->id .'"
                                        data-column-count="'. $judgeData->count() .'"
                                        data-rows-count="'. $participants->count() .'">';
                        }
                    }
                $tableArray[0]  .='</div>
                    </div>
            ';

        }else{

            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true', 'type' => '1'] )->orderBy('number', 'asc')->get();
            $tableArray[0]  = '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category name :: '. $categories->name .'</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double1" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn1" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){

                                                $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                // if ($scoreValue) {
                                                //     $scoreValue = $judgeAverage->where("judge_id", $judge->id )->where("participant_id", $participant->id )->first()->average;
                                                // }else{
                                                //     $scoreValue = "";
                                                // }
                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage="'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>

                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" name="'. ($a++)  . ($rowcount+1) .'" data-participant-id="'. $participant->id .'">
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>
                            <hr>
                            <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">';
                        foreach ($categoriesElim as $key => $categoriesElimate) {
                            if ($categoriesElimate->partipants > 0) {
                    $tableArray[0]  .= '<input type="button" class="btn btn-primary px-3 m-1 moveParticipant"
                                        value="Move to '. $categoriesElimate->name .'" style="float: right;"
                                        data-category-id="'. $categoriesElimate->id .'"
                                        data-column-count="'. $judgeData->count() .'"
                                        data-rows-count="'. $participants->count() .'">';
                        }
                    }
                $tableArray[0]  .='</div>
                    </div>
            ';

            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true', 'type' => '2'] )->orderBy('number', 'asc')->get();
            $tableArray[0]  .= '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category name :: '. $categories->name .'</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double2" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn2" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){

                                                $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                // if ($scoreValue) {
                                                //     $scoreValue = $judgeAverage->where("judge_id", $judge->id )->where("participant_id", $participant->id )->first()->average;
                                                // }else{
                                                //     $scoreValue = "";
                                                // }
                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage="'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>

                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" name="'. ($a++)  . ($rowcount+1) .'" data-participant-id="'. $participant->id .'">
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>
                            <hr>
                            <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">';
                        foreach ($categoriesElim as $key => $categoriesElimate) {
                            if ($categoriesElimate->partipants > 0) {
                    $tableArray[0]  .= '<input type="button" class="btn btn-primary px-3 m-1 moveParticipant"
                                        value="Move to '. $categoriesElimate->name .'" style="float: right;"
                                        data-category-id="'. $categoriesElimate->id .'"
                                        data-column-count="'. $judgeData->count() .'"
                                        data-rows-count="'. $participants->count() .'">';
                        }
                    }
                $tableArray[0]  .='</div>
                    </div>
            ';
        }

        echo $tableArray[0];

        return response()->json(array_values($tableArray));
    }

    public function generateMultiDataTable($categorySelected, $keyCount){


        //echo 'working page<br>::' . request()->input('category_id', 0)[0];
        //return count(request()->input('category_id', 0));
        $MultipleCat = count(request()->input('category_id', 0));

        $tabulations = Title::where(['id' => request()->input('title_id', 0)])->firstOrfail();
        $judgeData = Judge::where(['status' => 'true', 'title_id' => $tabulations->id])->orderBy('id', 'asc')->get();
        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected])->first();
        $judgeAverage = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected])->get();

        $tableArray = array();
        $scoreValue = "";

        if ($tabulations->basetype == 'single') {
            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true'] )->orderBy('number', 'asc')->orderBy('type', 'ASC')->get();

            $tableArray[0]  = '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category name :: '. $categories->name .'</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double'. ($keyCount+1) .'" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn'. ($keyCount+1) .'" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>

                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){

                                                $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                // if ($scoreValue) {
                                                //     $scoreValue = $judgeAverage->where("judge_id", $judge->id )->where("participant_id", $participant->id )->first()->average;
                                                // }else{
                                                //     $scoreValue = "";
                                                // }
                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>

                                        </td></tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                </tr>
                            </tfoot>
                        </table>

                </div>
            </div>
            ';

        }else{

            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true', 'type' => '1'] )->orderBy('number', 'asc')->get();
            $tableArray[0]  = '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category name :: '. $categories->name .' - Male</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double'. ($keyCount+1) .'" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn'. ($keyCount+1) .'" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>

                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){

                                                $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                // if ($scoreValue) {
                                                //     $scoreValue = $judgeAverage->where("judge_id", $judge->id )->where("participant_id", $participant->id )->first()->average;
                                                // }else{
                                                //     $scoreValue = "";
                                                // }
                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>

                                        </td></tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
            ';

            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true', 'type' => '2'] )->orderBy('number', 'asc')->get();
            $tableArray[0]  .= '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category name :: '. $categories->name .' - Female</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double'. ($keyCount+6) .'" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                        $tableArray[0]  .= '<th width="20" class="text-center text-nowrap" id="lastcolumn'. ($keyCount+6) .'" data-lastcolumn="'. $judgeData->count() .'">Total Average<br>100%</th>

                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';

                                            $a = "A";
                                            $totalScore = floatval(0);

                                        foreach ($judgeData as $key => $judge){

                                                $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected, "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                // if ($scoreValue) {
                                                //     $scoreValue = $judgeAverage->where("judge_id", $judge->id )->where("participant_id", $participant->id )->first()->average;
                                                // }else{
                                                //     $scoreValue = "";
                                                // }
                                                $totalScore = floatval($totalScore) + floatval($scoreValue);


                            $tableArray[0]  .=  '<td class="text-center" >
                                                    <div class="form-group has-validation d-flex justify-content-center">
                                                        <div class="text-center d-none">
                                                            <div class="spinner-grow" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <input class="text-center form-control'; if($scoreValue){
                                                            $tableArray[0]  .=  ' is-valid"'; } $tableArray[0]  .=  'style="width: 8em;"
                                                            min="'. $tabulations->score_min.'"
                                                            max="'. $tabulations->score_max.'"
                                                            type="number" name="'. ($a++)  . ($rowcount+1) .'"
                                                            data-judge-id="'.$judge->id .'"
                                                            data-row-count="' . ($rowcount+1) .'"
                                                            data-participant-id="'. $participant->id .'"
                                                            value="'. $scoreValue .'" data-myvalue="'. $scoreValue .'"  readonly>

                                                    </div>
                                                </td>';
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>

                                        </td></tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>
                                        ';   foreach ($judgeData as $judge){
                                            $tableArray[0]  .= '<th class="text-center text-nowrap px-0 mx-0 py-2">' . $judge->name .' <br> '. $judge->username . '</th>';
                                        }
                                    $tableArray[0]  .= '<th width="20" class="text-center text-nowrap">Total Average<br>100%</th>
                                </tr>
                            </tfoot>
                        </table>

                </div>
            </div>
            ';
        }

        echo $tableArray[0];

        return response()->json(array_values($tableArray));
    }

    public function generateMultiAverageDataTable($categorySelected){
        //echo 'working page<br>::' . request()->input('category_id', 0)[0];
        //return count(request()->input('category_id', 0));
        //$MultipleCat = count(request()->input('category_id', 0));
        //$categorySelected = $MultipleCat;
        $catCount = count($categorySelected);

        $tabulations = Title::where(['id' => request()->input('title_id', 0)])->firstOrfail();
        $judgeData = Judge::where(['status' => 'true', 'title_id' => $tabulations->id])->orderBy('id', 'asc')->get();
        $tableArray = array();
        $scoreValue = "";

        if ($tabulations->basetype == 'single') {
            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true'] )->orderBy('number', 'asc')->orderBy('type', 'ASC')->get();

            $tableArray[0]  = '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Average by category</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double14" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>';

                                    for ($i=0; $i < $catCount; $i++) {
                                        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                        $tableArray[0]  .= '<th class="text-center" >'. $categories->name .'<br>'.  $categories->percentage .'%</th>';
                                    }

                    $tableArray[0]  .= '
                                    <th width="20" class="text-center text-nowrap" id="lastcolumn14" data-lastcolumn="'. $catCount .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';



                                            $a = "A";
                                            $AverageTotal = floatval(0); //Total average
                                            $categoryAverage = floatval(0); //Total average
                                            $AverageScores = floatval(0); //Total average
                                            $categoryPercentage = floatval(0); //get category percentage

                                        for ($i=0; $i < $catCount; $i++) {


                                            $totalScore = floatval(0); //category average

                                        foreach ($judgeData as $key => $judge){
                                                    $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                                    $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected[$i], "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                    $totalScore = floatval($totalScore) + floatval($scoreValue);
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary CategoryAverage'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>
                                        </td>';
                                            $categoryAverage = floatval($totalScore)/floatval($judgeData->count());
                                            $categoryPercentage = floatval($categories->percentage)/100;
                                            $AverageScores = floatval($categoryAverage)*floatval($categoryPercentage);
                                            $AverageTotal = floatval($AverageTotal) + floatval($AverageScores);
                                        }

                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage'. ($rowcount+1) .'">
                                            '. round(floatval($AverageTotal), 2) .'%
                                            </label>
                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" readonly>
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>';

                                    for ($i=0; $i < $catCount; $i++) {
                                        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                        $tableArray[0]  .= '<th class="text-center" >'. $categories->name .'<br>'.  $categories->percentage .'%</th>';
                                    }

                    $tableArray[0]  .= '
                                    <th width="20" class="text-center text-nowrap" id="lastcolumn1" data-lastcolumn="'. $catCount .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>
                        <hr>
                    <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">

                </div>
            </div>
            ';

        }else{

            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true', 'type' => '1'] )->orderBy('number', 'asc')->get();
            $tableArray[0]  = ' <hr>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Average by category - Male</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double14" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>';

                                    for ($i=0; $i < $catCount; $i++) {
                                        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                        $tableArray[0]  .= '<th class="text-center" >'. $categories->name .'<br>'.  $categories->percentage .'%</th>';
                                    }

                    $tableArray[0]  .= '
                                    <th width="20" class="text-center text-nowrap" id="lastcolumn14" data-lastcolumn="'. $catCount .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';



                                            $a = "A";
                                            $AverageTotal = floatval(0); //Total average
                                            $categoryAverage = floatval(0); //Total average
                                            $AverageScores = floatval(0); //Total average
                                            $categoryPercentage = floatval(0); //get category percentage

                                        for ($i=0; $i < $catCount; $i++) {


                                            $totalScore = floatval(0); //category average

                                        foreach ($judgeData as $key => $judge){
                                                    $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                                    $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected[$i], "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                    $totalScore = floatval($totalScore) + floatval($scoreValue);
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary CategoryAverage'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>
                                        </td>';
                                            $categoryAverage = floatval($totalScore)/floatval($judgeData->count());
                                            $categoryPercentage = floatval($categories->percentage)/100;
                                            $AverageScores = floatval($categoryAverage)*floatval($categoryPercentage);
                                            $AverageTotal = floatval($AverageTotal) + floatval($AverageScores);
                                        }

                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage'. ($rowcount+1) .'">
                                            '. round(floatval($AverageTotal), 2) .'%
                                            </label>
                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" readonly>
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>';

                                    for ($i=0; $i < $catCount; $i++) {
                                        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                        $tableArray[0]  .= '<th class="text-center" >'. $categories->name .'<br>'.  $categories->percentage .'%</th>';
                                    }

                    $tableArray[0]  .= '
                                    <th width="20" class="text-center text-nowrap" id="lastcolumn1" data-lastcolumn="'. $catCount .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
            ';

            $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true', 'type' => '2'] )->orderBy('number', 'asc')->get();
            $tableArray[0]  .= '
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Average by category - Female</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="double15" class="table table-bordered table-striped disabled">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>';

                                    for ($i=0; $i < $catCount; $i++) {
                                        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                        $tableArray[0]  .= '<th class="text-center" >'. $categories->name .'<br>'.  $categories->percentage .'%</th>';
                                    }

                    $tableArray[0]  .= '
                                    <th width="20" class="text-center text-nowrap" id="lastcolumn15" data-lastcolumn="'. $catCount .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </thead>

                            <tbody>';
                                foreach ($participants as $rowcount => $participant){
                    $tableArray[0]  .= '<tr>
                                        <td width="10" class="text-center text-nowrap" data-participant-id="' . $participant->id .'"  data-row-count="' . ($rowcount+1) . '">
                                            <b>';
                                                if ($participant->type == 1){
                                $tableArray[0]  .= ' Mr. '. $participant->number;
                                                }elseif ($participant->type == 2){
                                $tableArray[0]  .= ' Ms. ' . $participant->number;
                                                }elseif ($participant->type == 3){
                                $tableArray[0]  .= ' Grp. ' . $participant->number;
                                                }elseif ($participant->type == 4){
                                $tableArray[0]  .= ' Team ' . $participant->number;
                                                }
                        $tableArray[0]  .=  '</b>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="" style="color: inherit;" data-toggle="modal" data-target="#participantPreview'.$participant->id.'">
                                                <u>
                                                    <b>'.$participant->name.'</b>
                                                </u>
                                            </a>
                                        </td>';



                                            $a = "A";
                                            $AverageTotal = floatval(0); //Total average
                                            $categoryAverage = floatval(0); //Total average
                                            $AverageScores = floatval(0); //Total average
                                            $categoryPercentage = floatval(0); //get category percentage

                                        for ($i=0; $i < $catCount; $i++) {


                                            $totalScore = floatval(0); //category average

                                        foreach ($judgeData as $key => $judge){
                                                    $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                                    $scoreValue = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $categorySelected[$i], "judge_id"=> $judge->id, "participant_id" => $participant->id])->first()->average;
                                                    $totalScore = floatval($totalScore) + floatval($scoreValue);
                                        }
                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary CategoryAverage'. ($rowcount+1) .'">
                                            '. round(floatval($totalScore)/floatval($judgeData->count()), 2) .'%
                                            </label>
                                        </td>';
                                            $categoryAverage = floatval($totalScore)/floatval($judgeData->count());
                                            $categoryPercentage = floatval($categories->percentage)/100;
                                            $AverageScores = floatval($categoryAverage)*floatval($categoryPercentage);
                                            $AverageTotal = floatval($AverageTotal) + floatval($AverageScores);
                                        }

                    $tableArray[0]  .=  '<td class="text-center">
                                            <label class="text-primary TotalAverage'. ($rowcount+1) .'">
                                            '. round(floatval($AverageTotal), 2) .'%
                                            </label>
                                        </td>';

                    $tableArray[0]  .=  '<td class="text-center" >
                                        <div class="form-group has-validation d-flex justify-content-center">
                                            <div class="text-center d-none">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <input class="text-center form-control" type="checkbox" readonly>
                                        </div>
                                    </td>
                                </tr>';
                                }
                    $tableArray[0]  .=  '</tbody>

                            <tfoot>
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th class="text-center text-nowrap px-4">Participant Name</th>';

                                    for ($i=0; $i < $catCount; $i++) {
                                        $categories = Category::where(['title_id' => $tabulations->id, 'id' => $categorySelected[$i]])->first();
                                        $tableArray[0]  .= '<th class="text-center" >'. $categories->name .'<br>'.  $categories->percentage .'%</th>';
                                    }

                    $tableArray[0]  .= '
                                    <th width="20" class="text-center text-nowrap" id="lastcolumn1" data-lastcolumn="'. $catCount .'">Total Average<br>100%</th>
                                    <th class="text-center text-nowrap px-4">Select</th>
                                </tr>
                            </tfoot>
                        </table>
                            <hr>
                        <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">

                </div>
            </div>
            ';
        }

        echo $tableArray[0];

        return response()->json(array_values($tableArray));
    }

    public function generateMoveElim(){
        $result = EliminationRound::updateOrCreate(
            [
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('category_id', 0),
                'participant_id' => request()->input('participant_id', 0)
            ],
            [
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('category_id', 0),
                'participant_id' => request()->input('participant_id', 0)
            ]
        );
    }

    function TestFunction(){
        $tableArray = array();
        $tableArray[0] = '
            <table id="double1" class="table table-bordered table-hover {{ Session::get("main-body") ? "table-dark" : "" }} disabled">
                <thead>
                    <tr>
                        <th width="10" class="text-center"></th>
                        <th width="10" class="text-center">Type</th>
                        <th class="text-center text-nowrap">Participant Name</th>
                        <th class="text-center text-nowrap">Judge or Criteria</th>
                        <th class="text-center text-nowrap">Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="10" class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 1</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                    <tr>
                        <td width="10" class="text-center text-nowrap">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 2</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                    <tr>
                        <td width="10" class="text-center text-nowrap">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 3</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                </tbody>

                <tfoot>
                    <th width="10" class="text-center"></th>
                    <th width="10" class="text-center">Type</th>
                    <th class="text-center text-nowrap">Participant Name</th>
                    <th class="text-center text-nowrap">Judge or Criteria</th>
                    <th class="text-center text-nowrap">Judge or Criteria</th>
                    <th width="10" class="text-center text-nowrap">Percentage</th>
                </tfoot>

            </table>
            <hr> ';

        $tableArray[1] = '
            <table id="double2" class="table table-bordered table-hover {{ Session::get("main-body") ? "table-dark" : "" }} disabled">
                <thead>
                    <tr>
                        <th width="10" class="text-center"></th>
                        <th width="10" class="text-center">Type</th>
                        <th class="text-center text-nowrap">Participant Name</th>
                        <th class="text-center text-nowrap">Judge or Criteria</th>
                        <th class="text-center text-nowrap">Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="10" class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 1</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                    <tr>
                        <td width="10" class="text-center text-nowrap">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 2</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                    <tr>
                        <td width="10" class="text-center text-nowrap">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 3</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                </tbody>

                <tfoot>
                    <th width="10" class="text-center"></th>
                    <th width="10" class="text-center">Type</th>
                    <th class="text-center text-nowrap">Participant Name</th>
                    <th class="text-center text-nowrap">Judge or Criteria</th>
                    <th class="text-center text-nowrap">Judge or Criteria</th>
                    <th width="10" class="text-center text-nowrap">Percentage</th>
                </tfoot>

            </table>
            <hr> ';

        $tableArray[3] = '
            <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">
            <input type="button" class="btn btn-primary px-3 m-1" value="Move to elimination Round " style="float: right;">
            ';
    }


}
