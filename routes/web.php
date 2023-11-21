<?php

use App\Http\Controllers\ProfileController;
use App\Models\Travel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;

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
    Route::get('/travel/{id}/edit', [TravelController::class, 'edit'])->name('travel.edit');
    Route::put('/travel/{id}', [TravelController::class, 'update'])->name('travel.update');
    Route::delete('/travel/{id}', [TravelController::class, 'destroy'])->name('travel.destroy');
});

require __DIR__.'/auth.php';
