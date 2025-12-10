<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function viewUsers()
    {
        return view("dashboard.users");
    }
}
