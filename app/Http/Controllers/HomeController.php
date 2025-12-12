<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function viewHome()
    {
        $categories = Category::all();
        return view("home", compact('categories'));
    }
}
