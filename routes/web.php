<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ThemeController;
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
Route::get('/documents/create', [DocumentsController::class, 'show'])->name('documents.show');
Route::post('/documents/create', [DocumentsController::class, 'create'])->name('documents.create');