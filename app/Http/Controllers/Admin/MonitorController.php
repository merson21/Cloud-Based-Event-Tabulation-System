<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMonitorRequest;
use App\Http\Requests\StoreMonitorRequest;
use App\Http\Requests\UpdateMonitorRequest;
use App\Models\AuditScore;
use App\Models\Category;
use App\Models\Criterion;
use App\Models\Judge;
use App\Models\MonitroAverage;
use App\Models\Participant;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MonitorController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('monitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.monitors.index', compact('titles'));
    }

    public function loadData($j_id, $c_id, $t_id){

        $tabulations = Title::where(['id' => $t_id])->firstOrfail();
        $judgeData = Judge::where(['id' => $j_id, 'status' => 'true', 'title_id' => $tabulations->id])->latest()->first();
        $categories = Category::where(['title_id' => $tabulations->id])->get();
        $categorySelected = $c_id;
        $criterias = Criterion::where(['title_id' => $tabulations->id, 'category_id' => $c_id])->orderBy('id', 'asc')->get();
        $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true'] )->orderBy('number', 'asc')->orderBy('type', 'ASC')->get();
        $judgeScores = AuditScore::where(['title_id' => $tabulations->id, 'category_id' => $c_id, 'judge_id' => $j_id])->get();

        // echo $criterias->where('category_id', 2);
        // return;
        $slug = 'test';

        return view('admin.monitors.category',compact([
            'tabulations',
            'judgeData',
            'categories',
            'criterias',
            'participants',
            'categorySelected',
            'judgeScores',
            'slug',

        ]));
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

    public function loadAverage($c_id, $t_id){

        $tabulations = Title::where(['id' => $t_id])->firstOrfail();
        $judgeData = Judge::where(['status' => 'true', 'title_id' => $tabulations->id])->orderBy('id', 'asc')->get();
        $categories = Category::where(['title_id' => $tabulations->id])->get();
        $categorySelected = $c_id;
        $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true'] )->orderBy('number', 'asc')->orderBy('type', 'ASC')->get();
        $judgeAverage = MonitroAverage::where(['title_id' => $tabulations->id, 'category_id' => $c_id])->get();

        // echo $criterias->where('category_id', 2);
        // return;

        return view('admin.monitors.categoryAverage',compact([
            'tabulations',
            'judgeData',
            'categories',
            'participants',
            'categorySelected',
            'judgeAverage'
        ]));
    }

    public function getaverage(){

        $result = MonitroAverage::where([
                'title_id' => request()->input('title_id', 0),
                'category_id' => request()->input('cat_id', 0),
                'judge_id' => request()->input('judge_id', 0),
                'participant_id' => request()->input('participant_id', 0)
            ])->pluck('average', 'id');


        return response()->json($result);

    }

}
