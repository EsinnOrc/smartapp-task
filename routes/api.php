<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/users/search', [UserController::class, 'search'])->name("userSearch");
Route::apiResource('users', UserController::class);