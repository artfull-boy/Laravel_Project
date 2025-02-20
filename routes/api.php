<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', [CustomerController::class,'index']);
Route::get('/{id}', [CustomerController::class,'show']);
Route::post('/customers', [CustomerController::class,'store']);