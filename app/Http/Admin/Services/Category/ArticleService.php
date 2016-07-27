<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/17
 * Time: 23:03
 */
namespace App\Http\Admin\Services\Category;

use App\Http\Model\Article;
use App\Http\Admin\Services\BaseService;
class ArticleService extends BaseService
{
    public function updateData($where,$data)
    {
        return Article::updateByCondition($where,$data);
    }
}