<?php

use App\Http\Controllers\DataController;
use App\Http\Middleware\FileAccessMiddleware;
use App\Livewire\Announcementslivewire;
use App\Livewire\EventsLivewire;
use App\Livewire\LoginLivewire;
use App\Livewire\GamesLivewire;
use App\Livewire\VideoCategoriesLivewire;
use App\Livewire\VideosLivewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', LoginLivewire::class);

Route::get('/fetch-data', function () {
    return [
        'id' => 123,
        'name' => 'Kim'
    ];
});

Route::middleware([FileAccessMiddleware::class, 'auth'])->group(function () {
    Route::get('/images/{image}/{token}', [DataController::class, 'viewImage']);
    Route::get('/videos/{video}/{token}', [DataController::class, 'viewVideo']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/games', GamesLivewire::class);
    Route::get('/announcements', Announcementslivewire::class);
    Route::get('/events', EventsLivewire::class);
    Route::get('/videos', VideosLivewire::class);
    Route::get('/video-categories', VideoCategoriesLivewire::class);

    Route::get('/get-data', [DataController::class, 'getData']);

    Route::get('/test-get', [DataController::class, 'testGet']);

    Route::get('/test-videos', [DataController::class, 'testVideos']);

    Route::get('/test-categories', [DataController::class, 'getCategories']);

    Route::get('/test', [DataController::class, 'testApiTokenMiddleware']);
});
