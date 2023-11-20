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
    Route::get('/itinerary', [TravelController::class, 'index'])->name('itinerary.index');
    Route::get('/itinerary/create', [TravelController::class, 'create'])->name('itinerary.create');
    Route::post('/itinerary', [TravelController::class, 'store'])->name('itinerary.store');
    Route::get('/itinerary/{id}/edit', [TravelController::class, 'edit'])->name('itinerary.edit');
    Route::put('/itinerary/{id}', [TravelController::class, 'update'])->name('itinerary.update');
    Route::delete('/itinerary/{id}', [TravelController::class, 'destroy'])->name('itinerary.destroy');
});

require __DIR__.'/auth.php';
