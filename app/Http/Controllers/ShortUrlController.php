<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', ShortUrl::class);

        $user = auth()->user();
        $query = ShortUrl::query();

        if ($user->hasRole('Admin')) {
            $query->where('company_id', $user->company_id)
                ->where('user_id','!=',$user->id);
        }

        if ($user->hasRole('Member')) {
            $query->where('user_id','!=',$user->id);
        }

        return $query->get();
    }

    public function store(Request $request)
    {
        $this->authorize('create', ShortUrl::class);

        ShortUrl::create([
            'company_id' => auth()->user()->company_id,
            'user_id' => auth()->id(),
            'code' => Str::random(6),
            'long_url' => $request->long_url,
        ]);
    }

}
