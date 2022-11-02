<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Criterion;
use App\Models\Judge;
use App\Models\Partylist;
use App\Models\Position;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComboboxController extends Controller
{
    public function position(){
        $positions = Position::whereHas('organization', function ($query) {
            $query->whereId(request()->input('organization_id', 0));
        })->pluck('position', 'id');

        return response()->json($positions);

        //return view('admin.candidates.create', compact('positions'));
    }
    public function partylist(){
        $partylists = Partylist::whereHas('organization', function ($query) {
            $query->whereId(request()->input('organization_id', 0));
        })->pluck('name', 'id');

        return response()->json($partylists);

        //return view('admin.candidates.create', compact('positions'));
    }


    public function category(){
        $partylists = Category::whereHas('title', function ($query) {
            $query->whereId(request()->input('title_id', 0));
        })->pluck('name', 'id');

        //echo $partylists;

        return response()->json($partylists);

        //return view('admin.candidates.create', compact('positions'));
    }


    public function criteria(){
        $partylists = Criterion::whereHas('category', function ($query) {
            $query->whereId(request()->input('category_id', 0));
        })->pluck('name', 'id');

        //echo $partylists;

        return response()->json($partylists);

        //return view('admin.candidates.create', compact('positions'));
    }


    public function participant(){
        $tabulations = Title::where('id', request()->input('title_id', 0))->pluck('basetype', 'id');

        //echo $partylists;

        return response()->json($tabulations);

        //return view('admin.candidates.create', compact('positions'));
    }

    public function loadtab(){
        $judges = Judge::where('title_id', request()->input('title_id', 0))->orderBy('id', 'asc')->pluck('username', 'id');

        //echo $partylists;

        return response()->json($judges);

        //return view('admin.candidates.create', compact('positions'));
    }

    public function myStoredSession()
    {
        if(Session::get('main-header') != 'navbar-dark'){
            Session::put('main-header', 'navbar-dark');
            Session::put('main-body', 'dark-mode');
        }else{
            Session::put('main-header', 'bg-white navbar-light');
            Session::put('main-body', '');
        }


       echo Session::get('main-header');
    }
}


