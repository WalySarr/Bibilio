<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ThemeController;

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
/**
 * Ces routes concernent juste les Themes
 */
Route::get('/', [ThemeController::class, 'catalog']);
Route::get('/themes', [ThemeController::class, 'show'])->name('themes');
Route::post('/addTheme', [ThemeController::class, 'addTheme'])->name('addTheme');
Route::get('/catalog', [ThemeController::class, 'catalog'])->name('catalog');
Route::get('/consult/{id}', [ThemeController::class, 'consult'])->named('consult');
Route::delete('/themes/{id}', [ThemeController::class, 'delete'])->name('delete');
Route::get('/themes/{id}/edit', [ThemeController::class, 'edit'])->name('edit');
Route::put('/themes/{id}/update', [ThemeController::class, 'update'])->name('update');

// Ces routes concernent juste les documents
Route::get('/documents', [DocumentsController::class, 'index'])->name('documents.index');
Route::get('/documents/create', [DocumentsController::class, 'add'])->name('documents.add');
Route::post('/documents/create', [DocumentsController::class, 'create'])->name('documents.create');
Route::get('/documents/show', [DocumentsController::class, 'show'])->name('documents.show');
Route::get('/documents/consult/{id}', [DocumentsController::class, 'consult'])->name('documents.consult');
Route::delete('documents/{id}', [DocumentsController::class, 'delete'])->name('documents.delete');
Route::get('/documents/{id}/edit', [DocumentsController::class, 'edit'])->name('documents.edit');
Route::put('/documents/{id}/', [DocumentsController::class, 'update'])->name('documents.update');



require __DIR__.'/auth.php';
