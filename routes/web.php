<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', App\Http\Livewire\Students\Index::class);
Route::get('/users', App\Http\Livewire\Users\Index::class);
Route::get('/regions', App\Http\Livewire\Regions\Index::class);
