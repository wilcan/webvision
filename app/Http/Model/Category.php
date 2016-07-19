<?php

namespace App\Http\Model;

class Category extends BaseModel
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];//排除create不能填充的字段，为空代表都可以填充
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

    public static function getByCondition($where)
    {
        return static::where($where)->get();
    }

    public static function insertData($data)
    {
        return static::create($data);
    }

    public static function updateByCondition($where,$data)
    {
        return static::where($where)->update($data);
    }
}
