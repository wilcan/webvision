<?php

namespace App\Http\Model;

class User extends BaseModel
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;//默认的更新时间和添加时间

    public static function getByUserName($where)
    {
        return static::where($where)->first();
    }
    
    public static function updateData($data)
    {
        return $data->update();
    }
}
