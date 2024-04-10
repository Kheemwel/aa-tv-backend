<?php

use App\Http\Controllers\DataController;
use App\Http\Middleware\ApiTokenMiddleware;
use App\Livewire\Announcementslivewire;
use App\Livewire\MainLivewire;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', MainLivewire::class);
Route::get('/announcements', Announcementslivewire::class)->name('announcements');

Route::get('/get-data', [DataController::class, 'getData']);

Route::get('/try', [DataController::class, 'testGet']);

Route::get('/test', [DataController::class, 'testApiTokenMiddleware']);

Route::get('/fetch-data', function () {
    return [
        'id' => 123,
        'name' => 'Kim'
    ];
});
