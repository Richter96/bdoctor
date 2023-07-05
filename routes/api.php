<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\SpecializationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/doctors',[DoctorController::class, 'index']);
Route::get('/doctors/{doctor:slug}',[DoctorController::class, 'show']);
Route::get('/specializations',[SpecializationController::class, 'index']);
Route::get('/doctor_by_spec/{specialization:id}',[DoctorController::class, 'showBySpecialization']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
