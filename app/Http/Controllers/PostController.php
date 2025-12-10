<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function viewDashPosts()
    {
        return view("dashboard.posts");
    }
    function viewPost()
    {
        return view("post");
    }
}
