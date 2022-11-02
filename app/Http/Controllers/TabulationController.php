<?php

namespace App\Http\Controllers;

use App\Models\AuditScore;
use App\Models\Category;
use App\Models\Criterion;
use App\Models\Judge;
use App\Models\Participant;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TabulationController extends Controller
{

    public function index($slug){

        $tabulations = Title::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();
        $judgeData = Judge::where(['id' => session('judgeData')->id, 'status' => 'true', 'title_id' => $tabulations->id])->latest()->first();
        $categories = Category::where(['title_id' => $tabulations->id])->get();
        $criterias = Criterion::where(['title_id' => $tabulations->id])->get();

        // echo $criterias->where('category_id', 2);
        // return;

        return view('tabulations.index',compact([
                'tabulations',
                'judgeData',
                'slug',
                'categories',
                'criterias',
            ]));

    }


    public function category($slug, $id){

        if(!session('judgeData')){
            return redirect('tabulation/'. $slug);
        }

        session(['slug'=>$slug]);

        $tabulations = Title::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();
        $judgeData = Judge::where(['id' => session('judgeData')->id, 'status' => 'true', 'title_id' => $tabulations->id])->latest()->first();
        $categories = Category::where(['title_id' => $tabulations->id])->get();
        $categorySelected = $id;
        $criterias = Criterion::where(['title_id' => $tabulations->id, 'category_id' => $id])->orderBy('id', 'asc')->get();
        $participants = Participant::where(['title_id' => $tabulations->id, 'status' => 'true'] )->orderBy('number', 'asc')->orderBy('type', 'ASC')->get();
        $judgeScores = AuditScore::where(['title_id' => $tabulations->id, 'category_id' => $id, 'judge_id' => $judgeData->id])->get();

        return view('tabulations.category',compact([
                'tabulations',
                'judgeData',
                'slug',
                'categories',
                'criterias',
                'participants',
                'categorySelected',
                'judgeScores',
            ]));

    }

    public function login($slug){
        session(['slug'=>$slug]);
        $tabulations = Title::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();

        if(session('judgeData')){
            return redirect('tabulation/'. $slug);
        }

        return view('tabulations.login',compact(['tabulations', 'slug']));
    }

    function submit_login($slug, Request $request){

        session(['slug'=>$slug]);
        $tabulations = Title::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();

        $judge = Judge::where(['username' => $request->input('username'), 'status' => 'true', 'title_id' => $tabulations->id])->latest()->first();


        if($judge){
            if (Hash::check($request->password, $judge->password))
            {

                session(['judgeData'=>$judge]);
                //session()->forget('judgeData');
                return redirect('tabulation/'. $slug);

            }else{
                return redirect('tabulation/'. $slug. '/login')->with('message',"Invalid username/password!");
            }

        }else{
            return redirect('tabulation/'. $slug. '/login')->with('message',"Invalid username/password!");
        }

    }

    public function logout($slug, Request $request){
        $tabulations = Title::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();
        session()->forget('judgeData');
        return redirect('tabulation/'.$slug . '/login')->with([
            'elections' =>  $tabulations,
            'slug' => $slug
            ]);
    }

}
