<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Org\Code\Codeclass;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends CommonController
{
    //后台用户登录密码验证
    public function login()
    {
    	if ($input = Input::all()) {
            $code = new Codeclass;
            $_code = $code->get();
            if (strtoupper($input['code']) != $_code){
                return back()->with('msg','验证码错误！');
            }
            $user = User::first();
            if ($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass) != $input['user_pass']){
                return back()->with('msg','用户名或密码错误！');
            }
            session(['user' => $user]);
            return redirect('admin/index');
        } else {
        	return view('admin.login');
    	}
    	
    }

    public function code()
    {
        $code = new Codeclass;
        $code->make();
    }

    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

}
