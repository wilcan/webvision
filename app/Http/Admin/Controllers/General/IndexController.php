<?php

namespace App\Http\Admin\Controllers\General;

use App\Http\Admin\Controllers\CommonController;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Admin\Services\UserService;

class IndexController extends CommonController
{
    protected $_userService;
    public function __construct(UserService $userService)
    {
        $this->_userService = $userService;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }
    //更改管理员密码
    public function changepass()
    {
        if ($input = Input::all()){
            $rules = [
              'password'=>'required|between:6,20|confirmed',
            ];
            $msg = [
               'password.required'=>'新密码不能为空',
               'password.between'=>'新密码必须6到20位',
               'password.confirmed'=>'新密码和确认密码不一致！',
            ];
            $validator = Validator::make($input,$rules,$msg);
            if ($validator->passes()){
                $user_name = session('user')->user_name;
                $where = ['user_name'=>$user_name];
                $user = $this->_userService->getPassword($where);
                $_password = Crypt::decrypt($user->user_pass);
                if($input['password_o'] == $_password){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $this->_userService->changePassword($user);
                    return back()->with('errors','密码修改成功！');
                }else{
                    return back()->with('errors','原密码错误！');
                }
            }else{
//                dd($validator->errors()->all());
                return back()->withErrors($validator);
            }

        }else{
            return view('admin.changepass');
        }
    }
    
}
