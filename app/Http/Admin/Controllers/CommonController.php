<?php

namespace App\Http\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //图片上传
    public function uploadImage()
    {
        $file = Input::file('Filedata');
        if($file -> isValid()){
            //检验一下上传的文件是否有效.
            //$clientName = $file -> getClientOriginalName();  //获取文件名称
            //$tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php9372.tmp 这种类型的.
            //$mimeTye = $file -> getMimeType();//大家对mimeType应该不陌生了. 我得到的结果是 image/jpeg.
            //$path = $file -> move('storage/uploads');
            //如果你这样写的话,默认是会放置在 我们 public/storage/uploads/php79DB.tmp
            //貌似不是我们希望的,如果我们希望将其放置在app的storage目录下的uploads目录中,并且需要改名的话..
            //$realPath = $file -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径，例如我的是: C:\wamp\tmp\php9372.tmp
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,900).'.'.$entension;
            $path = $file -> move(base_path().'/uploads',$newName);
            $filePath = 'uploads/'.$newName;
            return $filePath;
            //这里app_path()就是app文件夹所在的路径.$newName 可以是你通过某种算法获得的文件的名称.主要是不能重复产生冲突即可.   比如 $newName = md5(date('ymdhis').$clientName).".".$extension;
            //利用日期和客户端文件名结合 使用md5 算法加密得到结果.不要忘记在后面加上文件原始的拓展名.
        }
    }
}
