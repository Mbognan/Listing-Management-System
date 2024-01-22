<?php

use App\Http\Controllers\Frontend\AgentListingController;
use App\Http\Controllers\Frontend\AgentListingImageController;
use App\Http\Controllers\Frontend\AgentListingSceduleController;
use App\Http\Controllers\Frontend\AgentListingVideoController;
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
Route::get('listing', [FrontendController::class, 'listings'])->name('listings');


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
    /**image gallery */
    Route::resource('/listing-image', AgentListingImageController::class);
    /*video gallery */
    Route::resource('/listing-video', AgentListingVideoController::class);
     /**listing scedule-route */
     Route::get('/listing-scedule/{listing_id}', [AgentListingSceduleController::class, 'index'])->name('listing-scedule.index');
     Route::get('/listing-scedule/{listing_id}/create', [AgentListingSceduleController::class, 'create'])->name('listing-scedule.create');
     Route::post('/listing-scedule/send/{listing_id}', [AgentListingSceduleController::class, 'store'])->name('listing-scedule.store');
     Route::get('/listing-scedule/edit/{id}', [AgentListingSceduleController::class, 'edit'])->name('listing-scedule.edit');
     Route::put('/listing-scedule/{id}', [AgentListingSceduleController::class, 'update'])->name('listing-scedule.update');
     Route::delete('/listing-scedule/{id}', [AgentListingSceduleController::class, 'destroy'])->name('listing-scedule.destroy');
});


require __DIR__.'/auth.php';
