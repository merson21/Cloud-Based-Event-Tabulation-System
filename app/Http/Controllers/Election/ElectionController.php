<?php

namespace App\Http\Controllers\Election;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index($slug){


        return view('elections.index');
    }
}
