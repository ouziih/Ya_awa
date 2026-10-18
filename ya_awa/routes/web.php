<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

// Route::inertia('/', 'Welcome')->name('home');

Route::get('/',[MenuController::class,'index'])->name('home');
