<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\User\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return redirect()->route('books.index');});

Route::middleware('auth')->group(function () {
    Route::middleware('status')->group(function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::get('/profile/favourites', [UserController::class, 'favourites'])->name('user.favourites');
        Route::put('/profile/favourites/{book}', [UserController::class, 'editFavourites'])->name('user.editFavourites');
        Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
        Route::post('/feedbacks/create', [FeedbackController::class, 'store'])->name('feedbacks.store');

        Route::prefix('management')->middleware('hasrole:admin,moderator')->group(function () {
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
            Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/categories/search', [CategoryController::class, 'index'])->name('categories.search');
        });

        Route::prefix('management')->as('users')->middleware('hasrole:admin')->group(function () {
            Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('.ban');
            Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('.unban');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('.update');
        });

        Route::prefix('management')->as('categories')->middleware('hasrole:moderator')->group(function () {
            Route::post('/categories/create', [CategoryController::class, 'store'])->name('.store');
            Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('.update');
            Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('.destroy');
        });

        Route::prefix('management')->as('books')->middleware('hasrole:moderator')->group(function () {
            Route::get('/trashBooks', [BookController::class, 'trashbooks'])->name('.trash');
            Route::put('/trashBooks/{book}/restore', [BookController::class, 'restore'])->name('.restore');
            Route::delete('/trashBooks/{book}/forceDelete', [BookController::class, 'forceDelete'])->name('.forceDelete');
        });
        Route::prefix('management')->as('feedbacks')->middleware('hasrole:moderator')->group(function () {
            Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('.index');
            Route::get('/feedbacks/{feedback}', [FeedbackController::class, 'show'])->name('.show');
            Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('.destroy');
        });
        Route::middleware('hasrole:moderator')->group(function () {
            Route::post('books/store', [BookController::class, 'store'])->name('books.store');
            Route::get('books/create', [BookController::class, 'create'])->name('books.create');
            Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
            Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
            Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

        });
    });
});


Auth::routes();

Route::get('lang/{lang}', [LangController::class, 'change'])->name('changeLang');

Route::get('books/', [BookController::class, 'index'])->name('books.index');
Route::get('books/{book}', [BookController::class, 'show'])->name('books.show')
//    ->where('book', '[0-9]+')
;

//Route::resource('books', BookController::class)->only('index', 'show');

Route::get('/books/category/{category}', [BookController::class, 'booksByCategory'])->name('books.category')
//    ->where('category', '[0-9]+')
;



