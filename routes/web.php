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

// Main Route (The Landing Page)
Route::get('/', LoginLivewire::class);

// Routes for accessing image and videos in the back-end
Route::middleware([FileAccessMiddleware::class, 'auth'])->group(function () {
    Route::get('/images/{image}/{token}', [DataController::class, 'viewImage']);
    Route::get('/videos/{video}/{token}', [DataController::class, 'viewVideo']);
});

// Routes of pages
Route::middleware(['auth'])->group(function () {
    Route::get('/games', GamesLivewire::class);
    Route::get('/announcements', Announcementslivewire::class);
    Route::get('/events', EventsLivewire::class);
    Route::get('/videos', VideosLivewire::class);
    Route::get('/video-categories', VideoCategoriesLivewire::class);
});
