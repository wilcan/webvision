<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/17
 * Time: 23:03
 */
namespace App\Http\Admin\Services\General;
use App\Http\Model\User;
use App\Http\Admin\Services\BaseService;
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