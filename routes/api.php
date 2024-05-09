<?php

use App\Http\Controllers\DataController;
use App\Http\Middleware\ApiTokenMiddleware;
use App\Http\Middleware\FileAccessMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([ApiTokenMiddleware::class])->group(function () {
    Route::post('/save-data', [DataController::class, 'storeData']);
    Route::get('/get-announcements', [DataController::class, 'getAnnouncements']);
    Route::get('/get-videos', [DataController::class, 'getVideos']);
    Route::get('/get-categories', [DataController::class, 'getCategories']);
    Route::get('/get-events', [DataController::class, 'getEvents']);
});

Route::middleware([FileAccessMiddleware::class])->group(function () {
    Route::get('/images/{image}/{token}', [DataController::class, 'viewImage']);
    Route::get('/videos/{video}/{token}', [DataController::class, 'viewVideo']);
});

    