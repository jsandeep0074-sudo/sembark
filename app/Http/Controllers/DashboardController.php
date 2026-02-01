<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('SuperAdmin')) {
            return view('dashboards.super-admin');
        }

        if ($user->hasRole('Admin')) {
            return view('dashboards.client-admin');
        }

        if ($user->hasRole('Member')) {
            return view('dashboards.client-member');
        }

        abort(403);
    }
}
