<?php

namespace App\Http\Admin\Controllers\Category;

use App\Http\Admin\Controllers\CommonController;
use App\Http\Admin\Services\CategoryService;
use App\Http\Model\Category;
use App\Http\Orms\GetTree;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CategoryController extends CommonController
{
    protected $_categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->_categoryService = $categoryService;
    }

    //get. admin/category 全部分类列表
    public function index()
    {
        $datas = $this->_categoryService->categorys();//获取分类数据
        return view('admin.category.index')->with('data',$datas);
    }
    //POST.admin/category  
    public function store()
    {

    }
    //get.admin/category/create 添加分类
    public function create()
    {
        
    }
    //delete.admin/category/{category} 删除单个分类
    public function destroy()
    {
        
    }
    //put.admin/category/{category} 更新分类
    public function update()
    {
        
    }
    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {
        
    }
    //get.admin/category/{category}/edit  编辑分类
    public function edit()
    {
        
    }

    public function changeorder()
    {
        $input = Input::all();
        $res = $this->_categoryService->catechangesort($input);
        if ($res){
            $data = [
              'status'=>0,
              'msg'=>'分类排序更新成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'分类排序更新失败！'
            ];
        }
        return $data;
    }
}
