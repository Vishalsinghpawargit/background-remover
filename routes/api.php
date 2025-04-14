<?php

use App\Http\Controllers\BackgroupRemoveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/remove-background', [BackgroupRemoveController::class, 'index']);