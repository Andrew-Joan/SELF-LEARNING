<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/load-more-comics', [HomeController::class, 'loadMoreComics'])->name('load-more');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::prefix('comics')->controller(ComicController::class)->name('comics.')->group(function() {
    Route::get('/', 'index')->name('allComics');
    Route::get('/filter', 'filterComics')->name('filter');
    Route::get('/search', 'searchComics')->name('search');
    Route::get('/show-search', 'showSearch')->name('showSearch');
    
    Route::prefix('/{comic}')->name('comic.')->group(function() {
        Route::get('/', 'show')->name('single');
        Route::get('/chapters/{chapter}', 'read')->name('read');

        Route::prefix('/comment')->name('comment.')->group(function() {
            Route::post('/save', 'storeComment')->name('storeComment')->middleware('auth');
            Route::put('/edit', 'editComment')->name('editComment');
            Route::delete('/delete', 'deleteComment')->name('deleteComment');
        });
    });
});

Route::prefix('admin')->controller(AdminController::class)->name('admin.')->middleware('isAdmin')->group(function() {
    Route::get('/', 'index')->name('index');

    Route::prefix('comics')->name('comics.')->group(function() {
        Route::get('/', 'allComics')->name('index');
        Route::get('/export', 'comicsExport')->name('comicsExport');

        Route::get('/create', 'create')->name('create');
        Route::get('/create-chapter/{comic}', 'createChapter')->name('createChapter');
        Route::get('{comic}/edit', 'edit')->name('edit');

        Route::post('/store', 'store')->name('store');
        Route::post('/store-chapter', 'storeChapter')->name('storeChapter');

        Route::put('{comic}/update', 'update')->name('update');

        Route::delete('/delete/{comic}', 'delete')->name('delete');
    });
});

Route::get('/load-more-comics', [HomeController::class, 'loadMoreComics'])->name('load-more-comics');
Route::get('/load-more-comments', [ComicController::class, 'loadMoreComments'])->name('load-more-comments');


Route::prefix('/bookmark')->controller(BookmarkController::class)->name('bookmark.')->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/{comic}', 'attach')->name('add');
    Route::delete('/{comic}', 'detach')->name('remove');
}); 
// tidak tahu kenapa jika ini digabung kedalam group dengan prefix /bookmark, nanti di consolenya dibilang not found, padahal route dan controllernya sudah ada
Route::delete('/ajax-delete', [BookmarkController::class, 'removeFromBookmark'])->name('bookmark.ajax-remove');
