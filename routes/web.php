<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;


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

Route::middleware('lang')->group(function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/about', [HomeController::class, 'about']);
});

Route::get('/lang/{code}', [SettingController::class, 'switchLang']);

Route::middleware('auth')->group(function(){
    Route::get('/my-post', [PostController::class, 'myPost']);
    Route::get('/post/new', [PostController::class, 'create']);
    Route::get('/my-profile', [AuthController::class, 'profile']);
    Route::post('/profile', [AuthController::class, 'updateProfile']);
});

Route::get('/post', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store']);
Route::get('/post/edit/{id}', [PostController::class, 'edit']);
Route::post('/post/update/{id}', [PostController::class, 'update']);
Route::get('/post/{id}', [PostController::class, 'detial']);
Route::get('/post/delete/{id}', [PostController::class, 'delete']);


Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::any('/admin', [HomeController::class, 'admin']);

