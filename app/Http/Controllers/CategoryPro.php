<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryPro extends Controller
{
    function info()
    {
        $catePro = Category::where('anhien', 1)->get();
        return view('frontend.layouts.master', compact('catePro'));
    }
}
