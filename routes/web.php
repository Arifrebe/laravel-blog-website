<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\controllers\BlogController;
use App\Http\controllers\AuthController;
use App\Http\controllers\CategoryController;
use App\Http\controllers\CarouselController;
use App\Http\controllers\UserviewController;
use App\Http\controllers\BloguserController;

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

require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';

Route::prefix('auth')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/',[AuthController::class,'loginview'])->name('login-blade');
        Route::post('/login-check',[AuthController::class,'login'])->name('login');
    });
    Route::prefix('register')->group(function () {
        Route::get('/',[AuthController::class,'registerview'])->name('register-blade');
        Route::post('/register-check',[AuthController::class,'register'])->name('register');
    });
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});