<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'public'], function () {
    Route::post('/login', 'App\Http\Controllers\Auth\Login@login');
    Route::post('/register', 'App\Http\Controllers\Auth\Register@register');
    Route::group(['prefix' => 'books'], function () {
        Route::get('/getAll', 'App\Http\Controllers\Book\BookController@getAll');
        Route::get('/getOne/{id}', 'App\Http\Controllers\Book\BookController@getOne');
        Route::post('/search', 'App\Http\Controllers\Book\BookController@search');
    });
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::post('/');
    });

});
