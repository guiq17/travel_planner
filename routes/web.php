<?php

use App\Http\Controllers\api\FacilitySearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SouvenirItemController;
use App\Models\Travel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PackingItemController;
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
    return view('home');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // しおりの大枠
    Route::get('/travel', [TravelController::class, 'index'])->name('travel.list');
    Route::get('/travel/create', [TravelController::class, 'create'])->name('travel.create');
    Route::post('/travel', [TravelController::class, 'store'])->name('travel.store');
    Route::get('/travel/{id}', [TravelController::class, 'edit'])->name('travel.edit');
    Route::put('/travel/{id}', [TravelController::class, 'update'])->name('travel.update');
    Route::delete('/travel/{id}', [TravelController::class, 'destroy'])->name('travel.destroy');

    // メモ
    Route::get('/memo/{travel_id}', [MemoController::class, 'index'])->name('memo.index');
    Route::get('/memo/create/{travel_id}', [MemoController::class, 'create'])->name('memo.create');
    Route::post('/memo/store', [MemoController::class, 'store'])->name('memo.store');
    Route::get('memo/edit/{id}/{travel_id}', [MemoController::class, 'edit'])->name('memo.edit');
    Route::post('/memo/update/{id}/{travel_id}', [MemoController::class, 'update'])->name('memo.update');
    Route::delete('/memo/destroy/{id}/{travel_id}', [MemoController::class, 'destroy'])->name('memo.destroy');
    
    // お土産に関するルート
    Route::get('/souvenir/{travel_id}', [SouvenirItemController::class, 'index'])->name('souvenir.index');
    Route::get('/souvenir/create/{travel_id}', [SouvenirItemController::class, 'create'])->name('souvenir.create');
    Route::post('/souvenir', [SouvenirItemController::class, 'store'])->name('souvenir.store');
    Route::get('/souvenir/edit/{id}/{travel_id}', [SouvenirItemController::class, 'edit'])->name('souvenir.edit');
    Route::put('/souvenir/{id}/{travel_id}', [SouvenirItemController::class, 'update'])->name('souvenir.update');
    Route::delete('/souvenir/{id}/{travel_id}', [SouvenirItemController::class, 'destroy'])->name('souvenir.destroy');
    
    // 持ち物
    Route::get('/packing/{travel_id}', [PackingItemController::class, 'index'])->name('packing.index');
    Route::get('/packing/create/{travel_id}', [PackingItemController::class, 'create'])->name('packing.create');
    Route::post('/packing/create/{travel_id}', [PackingItemController::class, 'store'])->name('packing.store');
    Route::get('/packing/edit/{packing_item_id}/{travel_id}', [PackingItemController::class, 'edit'])->name('packing.edit');
    Route::put('/packing/edit/{packing_item_id}/{travel_id}', [PackingItemController::class, 'update'])->name('packing.update');
    Route::delete('/packing/destroy/{packing_item_id}/{travel_id}', [PackingItemController::class, 'destroy'])->name('packing.destroy');

    //スケジュールに関するルート
    Route::get('/schedule/{travel_id}', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/create/{travel_id}', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/edit/{id}/{travel_id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::post('/schedule/update/{id}/{travel_id}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/destroy/{id}/{travel_id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
    
    // api
    Route::get('travel/facility_search', [FacilitySearchController::class, 'searchFacilities'])->name('facility.search');
});

require __DIR__.'/auth.php';
