<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

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
Route::resource('teacher',TeacherController::class);
Route::resource('student',StudentController::class);
Route::resource('user',UserController::class);



Route::resource('food',FoodController::class);
Route::get('/searchfood',[FoodController::class,'search']);


//one to many
Route::get('/add-post',[PostCommentController::class,'addPost']);
Route::get('/add-comment/{id}',[PostCommentController::class,'addComment']);
Route::get('/get-comments/{id}',[PostCommentController::class,'getCommentById']);



//many to many
Route::get('/add-roles',[RoleController::class,'addRoles']);
Route::get('/add-userAn drows',[RoleController::class,'addUser']);
Route::get('/rolesbyuser/{id}',[RoleController::class,'getAllRoleByUser']);
Route::get('/usersbyrole/{id}',[RoleController::class,'getAllUserByRole']);

Route::get('/createcom',[PostCommentController::class,'createcommments']);










