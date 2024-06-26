<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/messages', [MessageController::class, 'messages'])
    ->name('messages');
Route::post('/message', [MessageController::class, 'message'])
    ->name('message');


Route::get('/users', [UserController::class, 'viewallusers']);
Route::get('/messages/{userId}', [MessageController::class, 'getUserMessages']);