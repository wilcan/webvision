<?php

namespace App\Http\Admin\Controllers\Category;

use App\Http\Admin\Controllers\CommonController;
use App\Http\Admin\Services\Category\LinksService;
use App\Http\Model\Links;
use App\Http\Requests;
class LinksController extends CommonController
{
    protected $_linksService;
    public function __construct(LinksService $linksService)
    {
        $this->_linksService = $linksService;
    }

    //get. admin/links 全部友情链接列表
    public function index()
    {
        $data = Links::orderBy('link_order','asc')->get();
        return view('admin.links.index',compact('data'));
    }
    //get.admin/links/create 添加友情链接
    public function create()
    {
        return view('admin/links/add');
    }
    //POST.admin/links  添加友情链接提交
    public function store()
    {

    }
    //delete.admin/links/{links} 删除单个分类
    public function destroy()
    {

    }
    //put.admin/links/{links} 更新分类
    public function update($cate_id)
    {

    }
    //get.admin/links/{links}  显示单个分类信息
    public function show()
    {

    }
    //get.admin/links/{links}/edit  编辑分类
    public function edit($cate_id)
    {
        Config::pluck('conf_name','conf_content');//只查询获取这两个字段的值，并且以键值，值的形式输出成数据组
    }

    public function changeorder()
    {
        $input = Input::all();
        $res = $this->_linksService->linkChangesort($input);
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
