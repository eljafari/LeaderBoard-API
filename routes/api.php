<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QRCodeController;


Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/users', [UserController::class, 'postUsers']);
Route::put('/users/edit/{id}', [UserController::class, 'editUsers']);
Route::delete('/users/delete/{id}', [UserController::class, 'deleteUsers']);
Route::put('/users/edit/points/{id}', [UserController::class, 'updatePoints']);
Route::get('/users/grouped-by-point', [UserController::class, 'groupUsersByScore']);
Route::get('/users/grouped-by-scorev2', [UserController::class, 'groupUsersByScorev2']);
Route::get('users/{id}/qrcode', [QRCodeController::class, 'show']);

