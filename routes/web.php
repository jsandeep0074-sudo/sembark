<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/short-urls', [ShortUrlController::class, 'index'])
        ->name('short-urls.index');
    Route::resource('clients', ClientController::class)
        ->only(['index', 'create', 'store']);

    Route::post('/short-urls', [ShortUrlController::class, 'store'])
        ->name('short-urls.store');
});

require __DIR__.'/auth.php';
