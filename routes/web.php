<?php

use App\Http\Controllers\ProfileController;
use App\Models\Travel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\ScheduleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/travel', [TravelController::class, 'index'])->name('travel.list');
    Route::get('/travel/create', [TravelController::class, 'create'])->name('travel.create');
    Route::post('/travel', [TravelController::class, 'store'])->name('travel.store');
    Route::get('/travel/{id}', [TravelController::class, 'edit'])->name('travel.edit');
    Route::put('/travel/{id}', [TravelController::class, 'update'])->name('travel.update');
    Route::delete('/travel/{id}', [TravelController::class, 'destroy'])->name('travel.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/schedule/{travel_id}', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
});

require __DIR__.'/auth.php';
