<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;


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

Route::get('/', [AuthController::class, 'index'])->name('logout'); 
Route::post('/login',[AuthController::class,'auth_login']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class,'store']);

// User 
Route::get('/user', [UserController::class, 'data_user']);
Route::get('/dashboard', [DashboardController::class, 'index']); // page user,admin,editor
Route::get('/user/{id}', [UserController::class, 'show_user_id']);
Route::patch('/user/{id}', [UserController::class, 'update']);
Route::post('/user',[UserController::class, 'store']); // untuk menambah editor atau admin
Route::delete('/user/{id}', [UserController::class, 'delete']); // untuk menghapus editor atau admin

// Notes
Route::post('/notes', [NotesController::class, 'store']);
ROute::patch('/notes/{id}', [NotesController::class, 'update']);
Route::get('/notes', [NotesController::class, 'fetch_notes']);
Route::get('/notes-user', [NotesController::class, 'fetch_notes_user']);
Route::get('/notes-user/{id}', [NotesController::class, 'fetch_notes_id']);
Route::delete('/notes-user/{id}', [NotesController::class, 'delete']);