<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/17
 * Time: 23:03
 */
namespace App\Http\Admin\Services\Category;

use App\Http\Admin\Services\BaseService;
class LinksService extends BaseService
{
    public function linkChangesort($input)
    {
        $cate = Category::getById($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        return Category::updata($cate);
    }

}