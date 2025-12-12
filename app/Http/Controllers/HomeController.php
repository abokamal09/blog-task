<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function viewHome(Request $request)
    {
        $categories = Category::all();

        $query = Post::published()->with(['user', 'category'])->latest();

        // Filter by category if provided
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $posts = $query->paginate(8);

        return view("home", compact('categories', 'posts'));
    }
}
