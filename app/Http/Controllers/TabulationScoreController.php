<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\MonitorController;
use App\Http\Controllers\Admin\MonitroAverageController;
use App\Models\AuditScore;
use App\Models\Category;
use App\Models\Criterion;
use App\Models\MonitroAverage;
use Illuminate\Http\Request;

class TabulationScoreController extends Controller
{
    public function savescore(){

        $result = AuditScore::updateOrCreate(
            [
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('cat_id', 0),
                'criteria_id' => request()->input('cri_id', 0),
                'judge_id' => request()->input('judge_id', 0),
                'participant_id' => request()->input('participant_id', 0)
            ],
            [
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('cat_id', 0),
                'criteria_id' => request()->input('cri_id', 0),
                'judge_id' => request()->input('judge_id', 0),
                'participant_id' => request()->input('participant_id', 0),
                'scores' => request()->input('score_val', 0)
            ]
        );

        //return response()->json($result);

    }

    public function saveaverage(){
        $result = MonitroAverage::updateOrCreate(
            [
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('cat_id', 0),
                'judge_id' => request()->input('judge_id', 0),
                'participant_id' => request()->input('participant_id', 0)
            ],
            [
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('cat_id', 0),
                'judge_id' => request()->input('judge_id', 0),
                'participant_id' => request()->input('participant_id', 0),
                'average' => request()->input('score_val', 0)
            ]
        );
        //return response()->json($result);
    }

    public function getscores(){

        $result = AuditScore::where([
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('cat_id', 0),
                'criteria_id' => request()->input('cri_id', 0),
                'judge_id' => request()->input('judge_id', 0),
                'participant_id' => request()->input('participant_id', 0)
            ])->pluck('scores', 'id');


        return response()->json($result);

    }

    public function getaverage(){

        $result = MonitroAverage::where([
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('cat_id', 0),
                'criteria_id' => request()->input('cri_id', 0),
                'judge_id' => request()->input('judge_id', 0),
                'participant_id' => request()->input('participant_id', 0)
            ])->pluck('scores', 'id');


        return response()->json($result);

    }

    public function criterialock(){
        $result = Criterion::where('id',request()->input('cri_id'))->pluck('status', 'id');

        return response()->json($result);
    }

    public function categorylock(){

        $result = Category::where(['title_id' => request()->input('title_id'), 'id'=> request()->input('cat_id')])->pluck('status', 'id');

        return response()->json($result);
    }

}
