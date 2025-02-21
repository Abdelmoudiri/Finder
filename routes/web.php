<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



// login
Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');
// register
Route::get('/register',[AuthManager::class, 'register'])->name('register');
Route::post('/register',[AuthManager::class, 'registerPost'])->name('register.post');
// logout
Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');


// annonce
Route::get('/',[AnnonceController::class, 'index'])->name('getAnnonce');
Route::post('/annonces',[AnnonceController::class, 'store'])->name('addAnnonce');
Route::get('/annonce/{annonce}',[AnnonceController::class, 'getAnnonce'])->name('getAnnonceDetails');

// add annonce page

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::get('/addAnnoce',[AnnonceController::class, 'addPage'])->name('getAnnoncepage');


});
