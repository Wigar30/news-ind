<?php

use App\Models\Post;
use App\Models\NewsInd;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardNewsController;
use App\Http\Controllers\DashboardCategoryController;

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

Route::get('/admin', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/news/category/{category}', [NewsController::class, 'category']);
Route::get('/dashboard/news/export', [NewsController::class, 'export']);

Route::resource('/news', NewsController::class);
Route::resource('/dashboard/news', DashboardNewsController::class);
Route::resource('/dashboard/categories', DashboardCategoryController::class);

