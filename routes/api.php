<?php

use App\Http\Controllers\DataController;
use App\Http\Middleware\ApiTokenMiddleware;
use App\Http\Middleware\FileAccessMiddleware;
use Illuminate\Support\Facades\Route;

// Routes for AA TV Flutter app
Route::middleware([ApiTokenMiddleware::class])->group(function () {
    Route::post('/save-game-result', [DataController::class, 'saveGameResult']);
    Route::get('/get-announcements', [DataController::class, 'getAnnouncements']);
    Route::get('/get-videos', [DataController::class, 'getVideos']);
    Route::get('/get-categories', [DataController::class, 'getCategories']);
    Route::get('/get-events', [DataController::class, 'getEvents']);
});

// Routes for accessing image and videos for AA TV Flutter app
Route::middleware([FileAccessMiddleware::class])->group(function () {
    Route::get('/images/{image}/{token}', [DataController::class, 'viewImage']);
    Route::get('/videos/{video}/{token}', [DataController::class, 'viewVideo']);
});

    