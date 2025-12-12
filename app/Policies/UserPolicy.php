<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Only admins can view the users list
        return $user->is_admin === true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        // Admins can view any user, users can view their own profile
        return $user->is_admin === true || $user->id === $model->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only admins can create users
        return $user->is_admin === true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        // Only admins can update users
        return $user->is_admin === true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // Only admins can delete users
        if (!$user->is_admin) {
            return false;
        }

        // Prevent users from deleting themselves
        if ($user->id === $model->id) {
            return false;
        }

        // Prevent deletion of admin users
        if ($model->is_admin) {
            return false;
        }

        // Ensure at least one admin remains (extra safety check)
        if ($model->is_admin && User::where('is_admin', true)->count() <= 1) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        // Only admins can restore users
        return $user->is_admin === true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        // Only admins can permanently delete users
        if (!$user->is_admin) {
            return false;
        }

        // Prevent users from deleting themselves
        if ($user->id === $model->id) {
            return false;
        }

        // Prevent permanent deletion of admin users
        if ($model->is_admin) {
            return false;
        }

        // Ensure at least one admin remains (extra safety check)
        if ($model->is_admin && User::where('is_admin', true)->count() <= 1) {
            return false;
        }

        return true;
    }
}
