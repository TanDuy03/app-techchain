<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function about() {
        return view('frontend.pages.about');
    }

    function contact()
    {
        return view('frontend.pages.contact');
    }
}