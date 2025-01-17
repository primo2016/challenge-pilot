<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/card/register', [App\Http\Controllers\PosnetController::class, 'register']);
Route::post('/card/payment/{card}', [App\Http\Controllers\PosnetController::class, 'doPayment']);
Route::get('/cards', [App\Http\Controllers\PosnetController::class, 'index']);
