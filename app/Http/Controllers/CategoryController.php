<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('dashboard/categories')->with('success', 'Category created!');
    }

    function viewCategories()
    {
        $categories = Category::all();

        return view("dashboard.categories", compact('categories'));
    }
}
