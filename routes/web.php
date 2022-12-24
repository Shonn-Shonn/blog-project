<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Articles */
Route::get('/articles',[ArticleController::class,'index']);
Route::get('/articles/detail/{id}',[ArticleController::class,'detail']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);
Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);
Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::post('/articles/update/{id}', [ArticleController::class, 'update']);


Route::post('/comments/add',[CommentController::class,'create']);
Route::get('/comments/delete/{id}',[CommentController::class,'delete']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
