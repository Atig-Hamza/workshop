<?php

use App\Http\Controllers\ArticleController;
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
    return view('article');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::post('/articles.store', [ArticleController::class, 'store'])->name('articles.store');

Route::delete('/articles.destroy/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');

Route::put('/articles.update/{article}', [ArticleController::class, 'update'])->name('articles.update');

