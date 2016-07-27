@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/index/info')}}">首页</a> &raquo;友情链接管理
</div>
<!--面包屑导航 结束-->

<!--结果页快捷搜索框 开始-->
{{--<div class="search_wrap">
    <form action="" method="post">
        <table class="search_tab">
            <tr>
                <th width="120">选择分类:</th>
                <td>
                    <select onchange="javascript:location.href=this.value;">
                        <option value="">全部</option>
                        <option value="http://www.baidu.com">百度</option>
                        <option value="http://www.sina.com">新浪</option>
                    </select>
                </td>
                <th width="70">关键字:</th>
                <td><input type="text" name="keywords" placeholder="关键字"></td>
                <td><input type="submit" name="sub" value="查询"></td>
            </tr>
        </table>
    </form>
</div>--}}
<!--结果页快捷搜索框 结束-->

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>友情链接列表</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">排序</th>
                    <th class="tc">ID</th>
                    <th>链接名称</th>
                    <th>链接标题</th>
                    <th>链接地址</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" name="ord[]" value="{{$v->link_order}}" onChange="change(this,'{{$v->link_id}}')">
                    </td>
                    <td class="tc">{{$v->link_id}}</td>
                    <td>
                        <a href="#">{{$v->link_name}}</a>
                    </td>
                    <td>{{$v->link_title}}</td>
                    <td>{{$v->link_url}}</td>
                    <td>
                        <a href="{{url('admin/category/'.$v->link_id.'/edit')}}">修改</a>
                        <a href="{{url('admin/category/'.$v->link_id.'/edit')}}">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="page_list">
                <ul>
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
    function change(obj,link_id) {
        $.post('{{url('admin/links/changeorder')}}',
                {'_token':'{{csrf_token()}}',link_id:link_id,link_order:obj.value},function (data) {

                        layer.msg(data.msg);
                })
    }
</script>
@endsection
