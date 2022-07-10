<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\postController;
use  App\Http\Controllers\CommentController;
use  App\Http\Controllers\followProccess;
use  App\Http\Controllers\likeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/postController', [postController::class, 'create'])->name('create.post');
Route::post('/commentSave', [CommentController::class, 'create'])->name('create.comment');
Route::post('/followSave', [followProccess::class, 'addFollow'])->name('create.addFollow');
Route::post('/likeSave', [likeController::class, 'addLike'])->name('create.addLike');
Route::post('/delLike', [likeController::class, 'deleteLike'])->name('create.deleteLike');
