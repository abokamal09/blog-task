<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function viewCategories()
    {
        return view("dashboard.categories");
    }
}
