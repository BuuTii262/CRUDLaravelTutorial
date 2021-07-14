<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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

//one to many
Route::get('/add-post',[PostCommentController::class,'addPost']);
Route::get('/add-comment/{id}',[PostCommentController::class,'addComment']);
Route::get('/get-comments/{id}',[PostCommentController::class,'getCommentById']);

//one to one
Route::get('/add-user',[UserController::class,'insertRecord']);
Route::get('/get-phone/{id}',[UserController::class,'fetchPhoneByuser']);

//many to many
Route::get('/add-roles',[RoleController::class,'addRoles']);
Route::get('/add-userAndrows',[RoleController::class,'addUser']);
Route::get('/rolesbyuser/{id}',[RoleController::class,'getAllRoleByUser']);
Route::get('/usersbyrole/{id}',[RoleController::class,'getAllUserByRole']);










