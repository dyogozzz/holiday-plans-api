<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HolidayPlanController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/holiday-plans', [HolidayPlanController::class, 'store']);
    Route::get('/holiday-plans', [HolidayPlanController::class, 'index']);
    Route::get('/holiday-plans/{id}', [HolidayPlanController::class, 'show']);
    Route::put('/holiday-plans/{id}', [HolidayPlanController::class, 'update']);
    Route::delete('/holiday-plans/{id}', [HolidayPlanController::class, 'destroy']);
    Route::post('/holiday-plans/{id}/generate-pdf', [HolidayPlanController::class, 'generatePdf']);
});