<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssetTypeController;
use App\Http\Controllers\AssetsController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('homepage');
    Route::resource('asset-type', AssetTypeController::class)->except(['show']);
    // Route::get("asset/inactive",[AssetsController::class,"inactive"])->name('inactive');
    Route::resource('asset', AssetsController::class);
    Route::get("/in_activate/{id}",[AssetsController::class,"in_active"])->name('in_active');
    Route::get("/activate/{id}",[AssetsController::class,"active"])->name('active');
});