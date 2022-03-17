<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [UserController::class, 'index']);
Route::get('/new-user', [UserController::class, 'createUserView']);
Route::post('/createUser', [UserController::class, 'createNewUser']);
Route::get('/edit-user/{id}', [UserController::class, 'editUserView']);
Route::PUT('/updateUser/{id}', [UserController::class, 'updateUser']);
