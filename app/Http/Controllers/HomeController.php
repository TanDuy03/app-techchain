<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    function index() 
    {
        $proHome = new ProductController;
        $proList = $proHome->index()->proNew;
        return view('frontend.pages.home', compact('proList'));
    }
}
