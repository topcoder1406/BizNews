<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware('auth')
    ->name('admin.')
    ->prefix(config('admin.pagesPrefix'))
    ->group(function () {
        Route::controller(AdminPostController::class)->group(function () {
            Route::get('/posts', 'index')->name('index-posts');

            Route::get('/create-post', 'create')->name('create-post');
            Route::post('/create-post', 'store')->name('store-post');

            Route::get('/posts/edit/{post:slug}', 'edit')->name('edit-post')->middleware('can:update-post,post');
            Route::patch('/posts/edit/{post:slug}', 'update')->name('update-post');

            Route::delete('/posts/delete/{post:slug}', 'destroy')->name('delete-post');
        });

        Route::controller(AdminCategoryController::class)->group(function () {
            Route::get('/categories', 'index')->name('index-categories');

            Route::get('/create-category', 'create')->name('create-category');
            Route::post('/create-category', 'store')->name('store-category');

            Route::get('/categories/edit/{category:slug}', 'edit')->name('edit-category');
            Route::patch('/categories/edit/{category:slug}', 'update')->name('update-category');

            Route::delete('/categories/delete/{category:slug}', 'destroy')->name('delete-category');
        });

        Route::view('/settings', 'admin.settings')->name('settings');
        Route::patch('/change-password', [ RegisteredUserController::class, 'changePassword' ])->name('change-password');
    });

require __DIR__ . '/auth.php';
