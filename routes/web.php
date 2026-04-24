<?php

use App\Http\Controllers\ProfileController;
use App\Models\Attraction;
use App\Models\Review;
use App\Models\Zone;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ZoneController;    


Route::prefix('/')->name('landing.')->group(function () {
    Route::get('/', function () {
        $zones = Zone::all();
        $attractions = \App\Models\Attraction::all();
        return view('landing.pages.index', compact('zones', 'attractions'));
    })->name('index');
    Route::prefix('/attraction')->group(function () {
        Route::get('/{attraction}', [AttractionController::class, 'showAttraction'])->name('attractions');
        Route::post('/review',[ReviewController::class, 'store'])->name('attraction.review.store');
    });

    Route::prefix('/zone')->group(function() {
        Route::get('/{zone}', [ZoneController::class, 'showZone'])->name('zones');
        Route::post('/review', [ReviewController::class, 'store'])->name('zone.review.store');
    });     
});
    
Route::get('/detail', function(){
    return view('landing.pages.detail');

});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        $zones = \App\Models\Zone::all();
        $attractions = \App\Models\Attraction::all();  
        $publishedReviews = \App\Models\Review::where('is_approved', true)->get();
        $unpublishedReviews = \App\Models\Review::where('is_approved', false)->get();
        $counter = [
            'zones' => $zones->count(),
            'attractions' => $attractions->count(),
            'publishedReviews' => $publishedReviews->count(),
            'unpublishedReviews' => $unpublishedReviews->count(),
        ];
        return view('admin.pages.index', compact('counter'));
    })->name('index');

        Route::resource('zones', \App\Http\Controllers\ZoneController::class);
        Route::resource('attractions', \App\Http\Controllers\AttractionController::class);
        Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, 'index'])->name('review.index');
        Route::patch('/reviews/{review}/toggle-approval', [\App\Http\Controllers\ReviewController::class, 'toggleApproval'])->name('reviews.toggleApproval');
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