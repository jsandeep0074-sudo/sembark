<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ShortUrl;

class ShortUrlPolicy
{
   
    public function create(User $user): bool
    {
        return $user->hasRole('Sales', 'Manager');
    }

    public function viewAny(User $user): bool
    {
        return ! $user->hasRole('SuperAdmin');
    }

    public function view(User $user, ShortUrl $url): bool
    {
        if ($user->hasRole('Admin')) {
            return $user->company_id === $url->company_id
                && $url->user_id !== $user->id;
        }

        if ($user->hasRole('Member')) {
            return $url->user_id !== $user->id;
        }

        return false;
    }
}
