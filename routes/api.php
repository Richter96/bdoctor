<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\SpecializationController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\VoteController;
use App\Http\Controllers\API\SponsorshipController;

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

Route::get('/sponsored', [DoctorController::class, 'sponsored']);
Route::get('/doctors/{doctor:slug}', [DoctorController::class, 'show']);
Route::get('/specializations', [SpecializationController::class, 'index']);
Route::get('/search', [DoctorController::class, 'search']);
Route::post('/review', [ReviewController::class, 'store']);
Route::post('/message', [MessageController::class, 'store']);
Route::post('/vote', [VoteController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
