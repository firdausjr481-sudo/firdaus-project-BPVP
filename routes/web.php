<?php

use App\Http\Controllers\ProfileController;
use App\Models\Zone;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $zones = Zone::all();
    return view('landing.pages.index', compact('zones'));
});

Route::get('/detail', function () {
    return view('landing.pages.detail');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.master');
    })->name('index');

Route::resource('zones', \App\Http\Controllers\ZoneController::class);
Route::resource('attractions', \App\Http\Controllers\AttractionController::class);
Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, 'index'])->name('reviews.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
