<?php

namespace App\Http\Home\Controllers\Article;

use App\Http\Admin\Controllers\CommonController;
use App\Http\Requests;
use App\Http\Home\Services\ArticleService;

class ArticleController extends CommonController
{
    protected $_articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->_articleService = $articleService;
    }

    //get. admin/article 全部文章列表
    public function index()
    {
        echo '111';
    }
    //get.admin/article/create 添加文章
    public function create()
    {

    }
    //POST.admin/article  添加分类提交
    public function store()
    {

    }
    //delete.admin/article/{article} 删除单个分类
    public function destroy()
    {
        
    }
    //put.admin/article/{article} 更新分类
    public function update($cate_id)
    {

    }
    //get.admin/article/{article}  显示单个分类信息
    public function show()
    {
        
    }
    //get.admin/article/{article}/edit  编辑分类
    public function edit($cate_id)
    {

    }

}
