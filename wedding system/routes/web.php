<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VillageController;

Auth::routes();

// redirect to login page
Route::get('/', function() {
    return redirect('/login');
});
// check login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// check middleware
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index']);

    Route::resource('villages', VillageController::class);
    Route::get('/villages', VillageController::class, 'index')->name('villages');
    // Route::get('villages', [VillageController::class, 'search'])->name('search');
    Route::post('villages/fetch_data', [VillageController::class, 'fetch_data'])->name('villages.fetch_data');

});
// route for normal users
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
