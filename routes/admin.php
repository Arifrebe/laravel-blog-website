<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\BlogController;

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('pengguna')->name('user.')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/tambah-pengguna', [UserController::class, 'create'])->name('create');
        Route::get('/edit-pengguna/{user:username}', [UserController::class, 'edit'])->name('edit');
        Route::get('/{user:username}', [UserController::class, 'show'])->name('show');

        Route::post('/tambah-pengguna', [UserController::class, 'store'])->name('store');
        Route::put('/ubah-pengguna/{user:username}', [UserController::class, 'update'])->name('update');
        Route::delete('/hapus-pengguna/{user:username}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('kategori')->name('category.')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('show');

        Route::post('/tambah-kategori', [CategoryController::class, 'store'])->name('store');
        Route::put('/ubah-kategori/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/hapus-kategori/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('blog')->name('blog.')->group(function() {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/Tambah-blog', [BlogController::class, 'create'])->name('create');
        Route::get('/edit-blog/{blog:slug}', [BlogController::class, 'edit'])->name('edit');
        Route::get('/{blog:slug}', [BlogController::class, 'detail'])->name('detail');

        Route::post('/store-blog', [BlogController::class, 'store'])->name('store');
        Route::put('/ubah-blog/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/hapus-blog/{blog}', [BlogController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('carousel')->name('carousel.')->group(function() {
        Route::get('/', [CarouselController::class, 'index'])->name('index');
        Route::get('/{carousel}', [CarouselController::class, 'show'])->name('show');

        Route::post('/tambah-carousel', [CarouselController::class, 'store'])->name('store');
        Route::put('/ubah-carousel/{carousel}', [CarouselController::class, 'update'])->name('update');
        Route::delete('/hapus-carousel/{carousel}', [CarouselController::class, 'destroy'])->name('destroy');
    });
}); 