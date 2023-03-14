<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeClientController;
use App\Http\Controllers\CommandeFornController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\FleurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('clients', ClientController::class);
Route::resource('articles', ArticleController::class);
Route::resource('couleurs', CouleurController::class);
Route::resource('fleurs', FleurController::class);
Route::resource('categories', CategorieController::class);
Route::resource('unites', UniteController::class);
Route::resource('evenements', EvenementController::class);
Route::resource('commandeClients', CommandeClientController::class);
Route::resource('commandeForns', CommandeFornController::class);

require __DIR__.'/auth.php';
