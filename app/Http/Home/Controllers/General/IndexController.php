<?php

namespace App\Http\Home\Controllers\General;

use App\Http\Admin\Controllers\CommonController;
use App\Http\Requests;
use App\Http\Home\Services\General\IndexService;

class IndexController extends CommonController
{
    protected $_indexService;
    public function __construct(IndexService $indexService)
    {
        $this->_indexService = $indexService;
    }

    public function index()
    {
        $pics = [];
        $data = [];
        return view('home.index',compact('pics','data'));
    }

    public function cate()
    {
        $pics = [];
        $data = [];
        return view('home.list',compact('pics','data'));
    }

    public function article()
    {
        $pics = [];
        $data = [];
        return view('home.new',compact('pics','data'));
    }
}
