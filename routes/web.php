<?php

use App\Models\Post;
use App\Models\NewsInd;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsIndController;
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

Route::get('/', [PostController::class, 'index']);
Route::get('/post/{slug}', [PostController::class, 'show']);

Route::get('/admin', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/news', [NewsIndController::class, 'index']);
Route::get('/categories/{category}', function ($category) {
    return view('category', [
        "section" => "Admin",
        "berita" => NewsInd::latest('tanggal_berita')->where('category', 'pimpinan')->paginate(16)
    ]);
});

Route::resource('/dashboard/news', DashboardNewsController::class);
Route::resource('/dashboard/categories', DashboardCategoryController::class);
