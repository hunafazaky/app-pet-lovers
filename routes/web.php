<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('pets', PetController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('locations', LocationController::class);
});

Route::get('/halo', function () {
        return view('halo');
    })->name('halo');

require __DIR__.'/settings.php';
