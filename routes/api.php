<?php

use App\Http\Controllers\Api\V1\WeathersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'name' => 'v1',
    'as' => 'v1.',
    'prefix' => 'v1',
], function () {
    Route::get('/get-geocoding', [WeathersController::class, 'getGeocoding'])->name('get-geocoding');
    Route::get('/get-current-weather-data', [WeathersController::class, 'getCurrentWeatherData'])->name('get-current-weather-data');
});
