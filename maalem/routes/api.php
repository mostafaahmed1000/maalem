<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\FormController;

Route::post('/partnership', [FormController::class, 'storePartnership']);
Route::post('/consultation', [FormController::class, 'storeConsultation']);
Route::post('/application', [FormController::class, 'storeApplication']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
