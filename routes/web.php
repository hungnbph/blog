<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::resource('/', CategoryController::class);
Route::resource('categories', CategoryController::class);
Route::get('login', [LoginController::class, 'index'])->name('get-login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('post-login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('products', ProductController::class);
