<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/17
 * Time: 23:03
 */
namespace App\Http\Admin\Services;
use App\Http\Model\User;

class UserService extends BaseService
{
    public function getPassword($where)
    {
        return User::getByUserName($where);        
    }

    public function changePassword($password)
    {        
        return User::updateData($password);
    }
}