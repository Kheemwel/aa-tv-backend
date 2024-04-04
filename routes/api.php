<?php

use App\Http\Controllers\DataController;
use App\Http\Middleware\ApiTokenMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/save-data', [DataController::class, 'storeData'])
    ->middleware(ApiTokenMiddleware::class); 

    