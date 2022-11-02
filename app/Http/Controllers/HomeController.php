<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
