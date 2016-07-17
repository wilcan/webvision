<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/15
 * Time: 21:32
 */
namespace App\Http\Orms;

class GetTree
{
    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0)
    {
        $arr = [];
        foreach ($data as $k => $v){
            if ($v -> $field_pid == $pid){
                $data[$k]['_'.$field_name] = $data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m => $n){
                    if ($v -> $field_id == $n -> $field_pid){
                        $data[$m]['_'.$field_name] = '|—'.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }
}