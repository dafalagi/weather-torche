<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\Restricted;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// RESOURCES
Route::apiResources([
    'cities' => CityController::class,
    'weathers' => WeatherController::class,
]);
