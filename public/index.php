<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//通过他来解决跨域的
header("Access-Control-Allow-Origin: *");
//告诉你头信息可以设置的字段
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Authorization,Content-Type,RetryAfter,retry-after,Accept, token");
//允许的请求方式
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE,OPTIONS');
//默认带一个options
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}
// [ 应用入口文件 ]

// 定义应用目录
define('UPLOAD_PATH',__DIR__);
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
