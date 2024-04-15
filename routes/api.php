<?php

use App\Http\Controllers\DataController;
use App\Http\Middleware\ApiTokenMiddleware;
use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware([ApiTokenMiddleware::class])->group(function () {
    Route::post('/save-data', [DataController::class, 'storeData']);
    Route::get('/get-announcements', [DataController::class, 'getAnnouncements']);
    Route::get('/get-videos', [DataController::class, 'getVideos']);
    Route::get('/get-categories', [DataController::class, 'getCategories']);
});

    