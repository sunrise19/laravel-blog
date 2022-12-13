<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');
    Route::get('/create-blog', [App\Http\Controllers\BlogController::class, 'create']) ->name('blog.create');
    Route::post('/create-blog', [App\Http\Controllers\BlogController::class, 'store']) ->name('blog.store');
    Route::get('edit/{id}', [BlogController::class, 'edit']) ->name('blog.edit');
    Route::post('/edit/{id}', [BlogController::class, 'update']) ->name('blog.update');
    Route::get('/delete/{id}', [BlogController::class, 'destroy']) ->name('blog.destroy');
    Route::resource('/categories', CategoryController::class);
});

Route::get('/blog/{slug}', [App\Http\Controllers\FrontController::class, 'show']) ->name('blog.show');
Route::get('/about', [App\Http\Controllers\FrontController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\FrontController::class, 'contact']);
