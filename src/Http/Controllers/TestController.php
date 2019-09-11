<?php

namespace Haokeed\SJunitLaravel\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * 这是一个控制器 需要继承一个laravel所提供的控制器
 *
 */
class TestController extends Controller
{
    public function index(){
        return "这是测试sjunit的一个测试控制器 测试的目标是 与laravel集成控制器";
    }
}

