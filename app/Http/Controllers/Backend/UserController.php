<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use App\Http\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

class UserController extends Controller {
	/**
	 * 登录
	 */
	public function login() {
		if (!Auth::attempt(['user_name' => '', 'password' => ''])) {
			return Redirect::to('user/dashboard');
		}
// 		var_dump((new \Illuminate\Http\Request)->input('user_name'));
// 		var_dump(Input::all());  Input::get();
		// $userService = new UserService();
// 		echo $userService->getMsg();exit;
		return view('backend.user.user', ['name' => 'huanglc']);
	}
	
	public function getDashboard() {
		return view('backend.user.user', ['name' => '用户名错误']);
	}
	
	public function register(){echo (new Request)->getMethod();
		if ((new Request)->isMethod('post')) {
			$validator = Validator::make(Input::all(), User::$rules);
			if ($validator->passes()) {
				echo 111;
			}
			var_dump(Input::all());exit;
		}
		return view('backend.user.register');
	}
}


















