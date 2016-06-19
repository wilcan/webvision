<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller {
	public function getIndex() {
		echo 'hello world';
	}
	
	public function getLogin() {
		return view('backend.user.user');
	}
}