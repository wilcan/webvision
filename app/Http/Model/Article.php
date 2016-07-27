<?php

namespace App\Http\Model;

class Article extends BaseModel
{
    protected $table = 'article';
    protected $primaryKey = 'art_id';
    protected $guarded = [];//排除create不能填充的字段，为空代表都可以填充
    public $timestamps = false;//默认的更新时间和添加时间

    public static function updateByCondition($where,$data)
    {
        return static::where($where)->update($data);
    }
}
