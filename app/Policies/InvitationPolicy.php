<?php

namespace App\Policies;

use App\Models\User;

class InvitationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function create(User $user, Role $role)
    {
        if ($user->hasRole('SuperAdmin')) {
            return false;
        }

        if ($user->hasRole('Admin')) {
            return in_array($role->name, ['Sales','Manager']);
        }

        return false;
    }
}
