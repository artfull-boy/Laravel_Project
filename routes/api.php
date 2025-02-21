<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/customers', [CustomerController::class,'index']);
    Route::post('/customers', [CustomerController::class,'store']);
    Route::get('/customers/{id}', [CustomerController::class,'show']);
    Route::delete('/customers/{id}', [CustomerController::class,'destroy']);
    Route::delete('/users/{id}', [UserController::class,'destroy']);
});

Route::get('/users', [UserController::class,'index']);
Route::get('/users/{id}', [UserController::class,'show']);
Route::post('/users', [UserController::class,'store']);