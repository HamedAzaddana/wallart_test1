<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FileUploadController;
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
Route::get('/', [HomePageController::class, 'index'])->name('home_page');
Route::get('/file_uploader', [FileUploadController::class, 'index'])->name('files_page');
Route::post('/file_uploader', [FileUploadController::class, 'upload']);
Route::get('/products', [ProductController::class, 'index'])->name('products_page');
Route::post('/products', [ProductController::class, 'store']);
Route::get('/posts', [PostController::class, 'index'])->name('posts_page');
