<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');


Route::get('/register',[AuthManager::class, 'register'])->name('register');
Route::post('/register',[AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');

Route::get('/ajouter-annonce',[AnnonceController::class, 'addAnnonce'])->name('addAnnonce');
Route::post('/ajouter-annonce',[AnnonceController::class, 'addAnnoncePost'])->name('addAnnonce.post');
Route::get('/Annoce',[AnnonceController::class, 'index'])->name('Annoce');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');

});


