<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.auth.login');
Route::get('/admin/forgot-password',[AdminController::class,'passwordRequest'])->name('admin.password.request');

Route::group([
    'middleware' => ['auth','user.type:admin'],
     'prefix' => 'admin',
     'as' => 'admin'
    ],
    function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

});
