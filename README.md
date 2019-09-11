<h1 align="center"> haokeed/sjunit-laravel </h1>

<p align="center"> 
这里是对框架的介绍
</p>


## Installing

```shell
$ composer require haokeed/sjunit-laravel
```

## Usage

### 配置要求
laravel >= 5.5 && php >= 7.1.3

### 配置方式
5.5手动配置laravel对于sjunit服务放到config/app.php中

解释路由 src/Http/routes.php
```php
Route::get("/","SJunitController@index");
Route::post("/","SJunitController@store")->name("junit.store");
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/haokeed/sjunit-laravel/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/haokeed/sjunit-laravel/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT