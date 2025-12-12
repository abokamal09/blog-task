<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function viewUsers()
    {
        $this->authorize('viewAny', User::class);

        $users = User::all();
        $totalUsers = $users->count();
        $adminCount = $users->where('is_admin', true)->count();
        return view("dashboard.users", compact('users', 'totalUsers', 'adminCount'));
    }

    function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:admin,user,editor',
        ]);

        // Check if trying to remove admin role from the last admin
        $newIsAdmin = $request->role === 'admin';
        if ($user->is_admin && !$newIsAdmin) {
            $adminCount = User::where('is_admin', true)->count();
            if ($adminCount <= 1) {
                return redirect()
                    ->route('dashboard.users')
                    ->with('error', 'Cannot remove admin role from the last admin user. The system must have at least one admin.');
            }
        }

        $user->name  = $request->name;
        $user->email = $request->email;

        $user->is_admin = $newIsAdmin;

        $user->save();

        return redirect()
            ->route('dashboard.users')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()
            ->route('dashboard.users')
            ->with('success', 'User deleted successfully.');
    }
}
