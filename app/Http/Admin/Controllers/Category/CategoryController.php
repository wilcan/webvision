<?php

namespace App\Http\Admin\Controllers\Category;

use App\Http\Admin\Controllers\CommonController;
use App\Http\Admin\Services\Category\CategoryService;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
    //get.admin/category/create 添加分类
    public function create()
    {
        $where = ['cate_pid'=>0];
        $data = $this->_categoryService->getCateByCondition($where);
        return view('admin/category/add',compact('data'));
    }
    //POST.admin/category  添加分类提交
    public function store()
    {
        if ($input = Input::except('_token')){
            $rules = [
                'cate_name'=>'required',
            ];
            $msg = [
                'cate_name.required'=>'分类名称不能为空！',
            ];
            $validator = Validator::make($input,$rules,$msg);
            if ($validator->passes()){
                $res = $this->_categoryService->insertCategory($input);
                if($res){
                    return redirect('admin/category');
                }else{
                    return back()->with('error','数据填充失败，请稍候再试！');
                }
            }else{
                return back()->withErrors($validator);
            }
        }
    }
    //delete.admin/category/{category} 删除单个分类
    public function destroy()
    {
        
    }
    //put.admin/category/{category} 更新分类
    public function update($cate_id)
    {
        $input = Input::except('_token','_method');
        $where = ['cate_id'=>$cate_id];
        $res = $this->_categoryService->updateData($where,$input);
        if ($res){
            return redirect('admin/category');
        }else{
            return back()->with('errors','分类信息数据更新失败！');
        }
    }
    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {
        
    }
    //get.admin/category/{category}/edit  编辑分类
    public function edit($cate_id)
    {
        $field = $this->_categoryService->getfield($cate_id);
        $data = $this->_categoryService->getCateByCondition(['cate_pid'=>0]);
        return view('admin.category.edit',compact('field','data'));
    }

    public function changeorder()
    {
        $input = Input::all();
        $res = $this->_categoryService->cateChangesort($input);
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
