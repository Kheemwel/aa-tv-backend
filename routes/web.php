<?php

use App\Http\Controllers\DataController;
use App\Http\Middleware\ApiTokenMiddleware;
use App\Livewire\Announcementslivewire;
use App\Livewire\MainLivewire;
use App\Livewire\VideosLivewire;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', MainLivewire::class);
Route::get('/announcements', Announcementslivewire::class);
Route::get('/videos', VideosLivewire::class);

Route::get('/get-data', [DataController::class, 'getData']);

Route::get('/test-get', [DataController::class, 'testGet']);

Route::get('/test-videos', [DataController::class, 'testVideos']);

Route::get('/test', [DataController::class, 'testApiTokenMiddleware']);

Route::get('/fetch-data', function () {
    return [
        'id' => 123,
        'name' => 'Kim'
    ];
});
