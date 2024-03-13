<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Fleet\Http\Controllers\DriverController;
use Modules\Fleet\Http\Controllers\VehicleController;

Route::resource('/drivers', DriverController::class);
Route::resource('/vehicles', VehicleController::class);
