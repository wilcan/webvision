<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;//默认的更新时间和添加时间

    public static function categorys()
    {
        return  static::orderBy('cate_order','asc')->get();
    }

    public static function getById($id)
    {
        return static::find($id);
    }

    public static function updata($data)
    {
        return $data->update();
    }
    
}
