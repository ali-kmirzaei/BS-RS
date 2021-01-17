<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

//////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////// ClientSide

Route::namespace('Client')->group(function () {

    // Home Controller Routes
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/singleGenre/{id}', 'HomeController@singleGenre')->name('single_genre');
    Route::get('/book_list','HomeController@book_list')->name('book_list');
    Route::get('/about', 'HomeController@about');

    // User Controller Routes
    Route::get('/bought_books', 'UserController@bought_books')->name('bought_books');
    Route::any('/buyBook/{id}', 'UserController@buy_book')->name('buy_book');

    Route::get('/complete_register', 'UserController@complete_register')->name('complete_register');
    Route::get('/accept_complete_register', 'UserController@accept_complete_register')->name('accept_complete_register');
    Route::post('/accept_complete_register', 'UserController@do_complete_register');

    Route::get('/suggestion', 'UserController@suggestion')->name('suggestion');
    Route::post('/suggestion', 'UserController@do_suggestion');

    });

//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////// AdminPanel

Route::namespace('Admin')->prefix('adminPanel')->group(function () {

    // AdminPanel Controller Routes
    Route::get('/','AdminPanelController@index')->name('adminPanel.index');
    Route::get('/logout','AdminPanelController@logout')->name('adminPanel.logout');

    // Users Controller Routes
    Route::get('/users','UsersController@users')->name('adminPanel.users');
    Route::get('/user_books/{id}','UsersController@user_books')->name('adminPanel.user_books');

    // Genres Controller Routes
    Route::get('/genres','GenresController@genres')->name('adminPanel.genres');
    Route::get('/genre_books/{id}','GenresController@genre_books')->name('adminPanel.genre_books');

    // Books Controller Routes
    Route::get('/books','BooksController@books')->name('adminPanel.books');
    Route::get('/add_book','BooksController@add_book')->name('adminPanel.add_book');
    Route::post('/add_book','BooksController@do_add_book');

    // Order Controller Routes
    Route::get('/suggestion', 'OrderController@suggestion')->name('adminPanel.suggestion');
    Route::post('/suggestion', 'OrderController@do_suggestion');

});

//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////// Other

Route::prefix('other')->group(function () {
    Route::get('/add_genres','BookGenreController@add_genre')->name('add_genre');
    Route::get('/add_test_books','BookGenreController@add_test_books');
});
