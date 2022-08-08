<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/{articles}/show', 'ArticlesController@show')->name('articles.show');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

//        Route::group(['prefix' => 'articles'], function() {
//            Route::get('/', 'ArticlesController@index')->name('articles.index');
//            Route::get('/create', 'ArticlesController@create')->name('articles.create');
//            Route::post('/store', 'ArticlesController@store')->name('articles.store');
//
//            });
        
    });

    Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {
            Route::group(['prefix' => 'articles'], function() {
            Route::get('/', 'ArticlesController@index')->name('articles.index');
            Route::get('/create', 'ArticlesController@create')->name('articles.create');
            Route::post('/store', 'ArticlesController@store')->name('articles.store');

        });

    });






});
