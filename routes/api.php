<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/register", [AuthController::class, 'createUser']);
Route::post("/login", [AuthController::class, 'loginUser']);

// Route::middleware('auth:sanctum', [AuthController::class, 'createUser']);



Route::group(['middleware'=>'auth:sanctum'], function(){
    Route::post("/create-blog", [BlogController::class, 'store']);
});
