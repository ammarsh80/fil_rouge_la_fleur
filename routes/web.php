<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeClientController;
use App\Http\Controllers\CommandeFornController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\FleurController;
use App\Http\Controllers\FraislivraisonController;
use App\Http\Controllers\GainLoterieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniteController;
use App\Models\FraisLivraison;
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
Route::resource('gainLoteries', GainLoterieController::class);
Route::resource('fraislivraisons', FraislivraisonController::class);



Route::post('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');




Route::post('articles/{id}/attach', [ArticleController::class, 'attach'])->name('articles.attach');
Route::get('articles/{id_article}/attachCategorie/{id_categorie}', [ArticleController::class, 'attachCategorie'])->name('articles.attachCategorie');
Route::get('articles/{id_article}/detachCat/{id_categorie}', [ArticleController::class, 'detachCat'])->name('articles.detachCat');

Route::get('articles/{id_article}/attachEvenement/{id_evenement}', [ArticleController::class, 'attachEvenement'])->name('articles.attachEvenement');
Route::get('articles/{id_article}/detachEven/{id_evenement}', [ArticleController::class, 'detachEven'])->name('articles.detachEven');

require __DIR__.'/auth.php';
