<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/users/store', [UserController::class, 'postUsers']);
Route::put('/users/edit/{id}', [UserController::class, 'editUsers']);
Route::delete('/users/delete/{id}', [UserController::class, 'deleteUsers']);
Route::put('/users/edit/points/{id}', [UserController::class, 'updatePoints']);
Route::get('/users/grouped-by-score', [UserController::class, 'groupUsersByScore']);
