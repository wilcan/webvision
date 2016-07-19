<?php

use App\Http\Controllers\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix'=>'home','namespace'=>'Article'], function () {
    Route::resource('article', 'ArticleController');
});