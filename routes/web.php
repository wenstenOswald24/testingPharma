<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/medicines', [MedicineController::class, 'index']);

Route::post('/medicines/{user_type}', [MedicineController::class, 'store']);

Route::delete('/medicines/{user_type}/{id}', [MedicineController::class, 'delete']);

Route::post('/medicines/{user_type}/{id}', [MedicineController::class, 'edit']);
