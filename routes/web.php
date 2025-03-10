<?php

use App\Http\Controllers\BodyController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ModelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});
Route::resource('makers', MakerController::class);
Route::resource('bodies', BodyController::class);
Route::resource('models', ModelController::class);
Route::resource('vehicles', VehicleController::class);
Route::get('/makers/{maker}/fetch-models', [MakerController::class, 'fetchModels'])->name('makers.fetch.models');
//Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
