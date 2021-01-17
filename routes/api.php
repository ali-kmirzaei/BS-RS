<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Route::namespace('Api')->group(function (){
//     Route::post('/login', 'UserController@login');
//     Route::post('/register', 'UserController@register');
//
//     Route::get('/books', 'UserController@books');
//     Route::post('/books', 'UserController@postBooks');
//
//     Route::get('/genres', 'UserController@genres');
//     Route::get('/books/{book}', 'UserController@oneBook');
//
//     Route::middleware('auth:api')->group(function(){
//         Route::get('/user',function (){
//             return auth()->user();
//         });
//         Route::post('/comment','CommentController@store');
//         Route::post('/buyBook/{id}','BookController@buyBook');
//     });
//
// });
