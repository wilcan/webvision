<?php
/**
 * Created by PhpStorm.
 * User: cdd
 * Date: 2016/7/15
 * Time: 20:10
 */
namespace App\Http\Admin\Services\Category;

use App\Http\Model\Category;
use App\Http\Orms\GetTree;
use App\Http\Admin\Services\BaseService;
class CategoryService extends BaseService
{
    public function categorys()
    {
        $categorys = Category::categorys();
        $gettree = new GetTree();
        return $gettree->getTree($categorys,'cate_name','cate_id','cate_pid');//构建分类数据树形结构        
    }

    public function cateChangesort($input)
    {
        $cate = Category::getById($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        return Category::updata($cate);
    }

    public function getCateByCondition($where)
    {
        return Category::getByCondition($where);
    }

    public function insertCategory($data)
    {
        return Category::insertData($data);
    }

    public function getfield($id)
    {
        return Category::getById($id);
    }

    public function updateData($where,$data)
    {
        return Category::updateByCondition($where,$data);
    }
}