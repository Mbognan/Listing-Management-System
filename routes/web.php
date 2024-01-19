<?php

use App\Http\Controllers\Frontend\AgentListingController;
use App\Http\Controllers\Frontend\DasboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard-profile', [FrontendProfileController::class, 'index'])->name('profile.index');
    Route::put('/dashboard-profile-update', [FrontendProfileController::class, 'update'])->name('profile.update');
    Route::put('/dashboard-password', [FrontendProfileController::class, 'resetPassword'])->name('profile-password.reset');
    /**listing route */
    Route::resource('/listing', AgentListingController::class);

});


require __DIR__.'/auth.php';
