<?php

namespace Haokeed\SJunitLaravel\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * 这是一个控制器 需要继承一个laravel所提供的控制器
 *
 */
class SJunitController extends Controller
{
    public function index()
    {
        return view("sjunit::index");//参数传递

    }

    // 如下内容，想要丰富就自个完善吧
    // 用来接收测试请求
    public function store(Request $request)
    {
        //命名空间
        $namespace = $request->input('namespace');
        //类名
        $className = $request->input('className');
        //方法名
        $action = $request->input('action');
        //参数   用"|"分割
        $param = $request->input('param');


        //获取类并new类
        $class = ($className == "") ? $namespace : $namespace . '\\' . $className; // 要提换的值 需要的结果
        $class = str_replace("/", "\\", $class);
        $object = new $class();

        //解析参数
        $param = ($param == "") ? [] : explode('|', $param);

        //调用方法
        $data = call_user_func_array([$object, $action], $param);

        return (is_array($data)) ? json_encode($data) : dd($data);
    }
}

