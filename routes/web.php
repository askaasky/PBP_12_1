<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadingController;

Route::get('/', [ReadingController::class, 'index']);

Route::get('/create', [ReadingController::class, 'create']);
Route::post('/store', [ReadingController::class, 'store']);

Route::get('/edit/{id}', [ReadingController::class, 'edit']);
Route::put('/update/{id}', [ReadingController::class, 'update']);

Route::delete('/delete/{id}', [ReadingController::class, 'destroy']);