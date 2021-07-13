<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserController;

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

Route::resource('posts',PostController::class);

Route::get('/add-post',[PostCommentController::class,'addPost']);
Route::get('/add-comment/{id}',[PostCommentController::class,'addComment']);
Route::get('/get-comments/{id}',[PostCommentController::class,'getCommentById']);

Route::get('/add-user',[UserController::class,'insertRecord']);
Route::get('/get-phone/{id}',[UserController::class,'fetchPhoneByuser']);









