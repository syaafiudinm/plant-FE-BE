<?php


use App\Http\Controllers\DetectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/detect', [DetectionController::class, 'form'])->name('detect.form');
Route::post('/detect/infer', [DetectionController::class, 'infer'])->name('detect.infer');
Route::get('/detect/history', [DetectionController::class, 'history'])->name('detect.history');

Route::get('/detect/calibrate', [DetectionController::class, 'calibrationForm'])->name('detect.calibrate.form');
Route::post('/detect/calibrate', [DetectionController::class, 'calibrate'])->name('detect.calibrate');
