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
Route::group(['middleware' => ['web'],'prefix'=>'admin'], function () {
    Route::any('login/login','LoginController@login');
    Route::get('login/code','LoginController@code');
});
Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin'], function () {
    Route::get('index/index', 'IndexController@index');
    Route::get('index/info', 'IndexController@info');
    Route::get('login/quit', 'LoginController@quit');
    Route::any('index/changepass', 'IndexController@changepass');
    Route::resource('category', 'CategoryController');

});