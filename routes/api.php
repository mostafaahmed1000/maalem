<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\FormController;

Route::post('/partnership', [FormController::class, 'storePartnership'])->name('partnership.store');
Route::post('/consultation', [FormController::class, 'storeConsultation'])->name('consultation.store');
Route::post('/application', [FormController::class, 'storeApplication'])->name('training.store');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
