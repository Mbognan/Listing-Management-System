<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as ProfileControllerAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.auth.login');
Route::get('/admin/forgot-password',[AdminController::class,'passwordRequest'])->name('admin.password.request');

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

});
