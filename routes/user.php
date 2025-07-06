<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;
use App\Http\Controllers\User\TagController;

Route::name('user.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    
    Route::prefix('blog')->name('blog.')->group(function() {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/search', [PostController::class, 'search'])->name('search');
        Route::get('/{blog:slug}', [PostController::class, 'show'])->name('show');
    });

    Route::prefix('Kategori')->name('category.')->group(function() {
        Route::get('/{category:name}', [UserCategoryController::class, 'index'])->name('index');
    });    

    Route::prefix('tag')->name('tag.')->group(function() {
        Route::get('/{tag}', [TagController::class, 'index'])->name('index');
    });    
});