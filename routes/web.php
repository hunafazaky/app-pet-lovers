<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

Route::get('/halo', function () {
        return view('halo');
    })->name('halo');

require __DIR__.'/settings.php';
