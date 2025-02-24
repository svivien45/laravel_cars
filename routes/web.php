<?php

use App\Http\Controllers\BodyController;
use App\Http\Controllers\MakerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});
Route::resource('makers', MakerController::class);
Route::resource('bodies', BodyController::class);
Route::get('/makers/{maker}/fetch-models', [MakerController::class, 'fetchModels'])->name('makers.fetch.models');
