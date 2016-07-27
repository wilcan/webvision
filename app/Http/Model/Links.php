<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table = 'links';
    protected $primaryKey = 'link_id';
    protected $guarded = [];//排除create不能填充的字段，为空代表都可以填充
    public $timestamps = false;//默认的更新时间和添加时间
}
