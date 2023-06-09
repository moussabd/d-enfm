<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/accueil',[MyController::class, 'accueil'])->name('accueil');
Route::get('/formation',[MyController::class, 'formation'])->name('formation');
Route::get('/concours',[MyController::class, 'concour'])->name('concours');
Route::get('/galerie',[MyController::class, 'galerie'])->name('galerie');
Route::get('/contact',[MyController::class, 'contact'])->name('contact');




Route::post('/savemail',[MyController::class,'savemail'])->name('emailSave');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
