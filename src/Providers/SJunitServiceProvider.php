<?php

namespace Haokeed\SJunitLaravel\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/**
 * 这是单元测试组件的服务提供者
 * 用来加载sjunit组件的
 * 在对应的laravel项目中config\app.php providers数组的尾部添加 Haokeed\SJunitLaravel\Providers\SJunitServiceProvider::class,
 * 另外一种方式是composer.json中配置自动加载,这个>=5.5版本才能支持,在该组件sjunit-laravel的composer.json尾部加入
    "extra": {
        "laravel": {
            "providers": [
                "Haokeed\\SJunitLaravel\\Providers\\SJunitServiceProvider"
            ]
        }
    }
 *
 *
 * 组件传统方式引用的话 就是 composer require xxxx组件
 * 然后只要网络OK就可以从github上下载下来
 * 本地引用的话，进入到对应的laravel项目中执行 composer config repositories.haokeed path ../sjunit-laravel
 * 注意：path后面的是相对目录
 * 对应的laravel项目的composer.json的最下方就会出现相应的配置
 * "repositories": {
 *  "haokeed": {
 *      "type": "path",
 *      "url": "../sjunit-laravel"
 *  }
 * }
 * 这里表示让composer 有更多的选择机会。
 * composer先去包仓库查找，没有找到就会找本地；根据repositories参数配置信息找本地对应的组件
 *
 * composer.json配置完成后,就需要通过命令将各类组件加载到对应的项目中，如果是本地的包,结尾必须要加载":dev-master"
 * composer require haokeed/sjunit-laravel:dev-master
 *
 *
 *
 */
class SJunitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 设定所有的容器绑定的对应关系
     * @return void
     */
    public function register()
    {
        //echo "这是sjunit 服务提供者";
        // 注册组件路由
        $this->registerRoutes();
        // 指定的组件的名称,自定义的资源目录地址
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'sjunit'
        );
    }

    /**
     * Bootstrap any application services.
     * 设定所有的单例模式容器绑定的对应关系
     * @return void
     */
    public function boot()
    {
        // 该方法在所有服务提供者被注册以后才会被调用
        // 这就是说我们可以在其中访问框架已注册的所有其它服务s
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        });
    }

    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            // 定义访问路由的域名
            // 'domain' => config('telescope.domain', null),
            // 定义路由的命名空间
            'namespace' => 'Haokeed\SJunitLaravel\Http\Controllers',
            // 这是前缀
            'prefix' => 'sjunit',
            //这是中间件
            'middleware' => 'web',
        ];
    }

}
