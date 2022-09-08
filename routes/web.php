<?php

use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;

Route::middleware('install')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('home');

    Route::post('/newsletter', NewsletterController::class)->name('subscribe-to-newsletter');

    Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('showPost');
    Route::post('/posts/{post:slug}/comment', [CommentController::class, 'store']);

    Route::get('/search/{searchQuery}', [PostController::class, 'search']);
    Route::get('/categories/{category:slug}', [PostController::class, 'showFromCategory'])->name('showCategory');
    Route::get('/categories/{category:slug}/{searchQuery}', [PostController::class, 'searchInCategory']);
    Route::get('/authors/{user:username}', [PostController::class, 'showByAuthor']);
    Route::get('/authors/{user:username}/{searchQuery}', [PostController::class, 'searchAuthorsPosts']);

    Route::view('/contact', 'contact')->name('contact');
});

require __DIR__ . '/admin.php';
