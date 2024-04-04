<?php

use App\Http\Controllers\DataController;
use App\Http\Middleware\ApiTokenMiddleware;
use App\Livewire\MainLivewire;
use Illuminate\Support\Facades\Route;

Route::get('/', MainLivewire::class);

Route::get('/get-data', [DataController::class, 'getData']);

Route::get('/test', [DataController::class, 'testApiTokenMiddleware']);

Route::get('/fetch-data', function () {
    return [
        'id' => 123,
        'name' => 'Kim'
    ];
});
