<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProfileController as ProfileControllerAdmin;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\Amenity;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.auth.login')->middleware('guest');
Route::get('/admin/forgot-password',[AdminController::class,'passwordRequest'])->name('admin.password.request')->middleware('guest');

Route::group([
    'middleware' => ['auth','user.type:admin'],
     'prefix' => 'admin',
     'as' => 'admin.'
    ],
    function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

    /**Profile Route */
    Route::get('/profile', [ProfileControllerAdmin::class,'index'])->name('profile');
    Route::put('/profile-update', [ProfileControllerAdmin::class,'updateAdmin'])->name('profile.update');
    Route::put('/profile-password', [ProfileControllerAdmin::class,'resetPassword'])->name('update.password');

    /** Hero Route */

    Route::get('/her0', [HeroController::class, 'index'])->name('hero.index');
    Route::put('/hero-update', [HeroController::class, 'update'])->name('hero.update');

    /** Category route */
    Route::resource('/category', CategoryController::class);
    /** Location route */
    Route::resource('/location', LocationController::class);
    /** Amenity route */
    Route::resource('/amenity', AmenityController::class);

});
