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

Route::get('/', function () {
    return view('welcome');
});
Route::get('test/{id}', function ($id) {
	return 'good'.$id;
});
// Route::get('user', 'UserController@index');
// Route::get('user/login', 'UserController@login');

//控制的方法要加个get方法才可以访问的到
Route::controller('test/user', 'UserController');

//多个文件夹加个命名空间  get  post   any  表示能接收所有请求
Route::any('user/login', ['as' => 'login', 'uses' => 'Backend\UserController@login']);
Route::match(['post', 'get'], 'user/reg', ['as' => 'register', 'uses' => 'Backend\UserController@register']);


/*webvision  https://github.com/wilcan/webvision   wilcan  hlcan1234
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['before' => 'auth'], function() {
	Route::get('user/logout', ['as' => 'logout', 'uses' => 'Backend\UserController@getLogout']);
	Route::get('user/dashboard', ['as' => 'dashboard', 'uses' => 'Backend\UserController@getDashboard']);
});
Route::group(['middleware' => ['web']], function () {
    //
});
