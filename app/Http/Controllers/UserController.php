<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function viewUsers()
    {
        $users = User::all();
        $totalUsers = $users->count();
        $adminCount = $users->where('is_admin', true)->count();
        return view("dashboard.users", compact('users', 'totalUsers', 'adminCount'));
    }

    function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:admin,user,editor',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        $user->is_admin = $request->role === 'admin';

        $user->save();

        return redirect()
            ->route('dashboard.users')
            ->with('success', 'User updated successfully.');
    }
}
