<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\StatisticController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/', [WelcomeController::class, 'show'])->name('form-specialization');
Route::get('/display_pdf', [PdfController::class , 'index'])->name('display_pdf');

Route::get('/get-data', [StatisticController::class, 'getData']);


Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('doctor', DoctorController::class)->parameters(['doctor' => 'doctor:slug']);
    Route::resource('message', MessageController::class)->parameters(['message']);
    Route::resource('review', ReviewController::class)->parameters(['review']);
    Route::resource('statistic', StatisticController::class)->parameters(['statistic']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
