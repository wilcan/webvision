<?php

namespace App\Http\Admin\Controllers\Category;
use App\Http\Admin\Controllers\CommonController;
use App\Http\Model\Article;
use App\Http\Requests;
use App\Http\Admin\Services\Category\ArticleService;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
        $data = Article::orderBy('art_id','desc')->paginate(8);//分页
        return view('admin.article.index',compact('data'));
    }
    //get.admin/article/create 添加文章
    public function create()
    {
        $data = (new CategoryService)->categorys();
        return view('admin.article.add',compact('data'));
    }
    //POST.admin/article  添加文章提交
    public function store()
    {
        $input = Input::except('_token');
        $input['art_time'] = time();
        $rules = [
            'art_title'=>'required',
            'art_content'=>'required',
        ];
        $msg = [
            'art_title.required'=>'文章标题不能为空！',
            'art_content.required'=>'文章内容不能为空！',
        ];
        $validator = Validator::make($input,$rules,$msg);
        if ($validator->passes()){
            $res = Article::create($input);
            if($res){
                return redirect('admin/article');
            }else{
                return back()->with('error','数据填充失败，请稍候再试！');
            }
        }else{
            return back()->withErrors($validator);
        }

    }
    //delete.admin/article/{article} 删除单个分类
    public function destroy()
    {
        
    }
    //put.admin/article/{article} 更新文章
    public function update($art_id)
    {
        $input = Input::except('_token','_method');
        $where = ['art_id'=>$art_id];
        $res = $this->_articleService->updateData($where,$input);
        if ($res){
            return redirect('admin/article');
        }else{
            return back()->with('errors','文章更新失败！');
        }

    }
    //get.admin/article/{article}  显示单个分类信息
    public function show()
    {
        
    }
    //get.admin/article/{article}/edit  编辑修改文章
    public function edit($art_id)
    {
        $data = (new CategoryService)->categorys();
        $field = Article::find($art_id);
        return view('admin.article.edit',compact('data','field'));
    }

}
