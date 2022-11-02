<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Faq;
use App\Models\Homepage;
use App\Models\Price;
use App\Models\Service;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){

        $homepages = Homepage::all();
        $aboutpage = About::first();
        $faqs = faq::all();
        $services = Service::all();
        $prices = Price::all();


        return view('landingpage', compact(
            'homepages',
            'aboutpage',
            'faqs',
            'services',
            'prices'
        ));
    }
}
