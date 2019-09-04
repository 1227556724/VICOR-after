<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//重新定义路由,后台管理员登录
Route::resource('api/login','admin/Login');
//后台分类管理
Route::resource('api/category','admin/Category');
Route::resource('api/goods','admin/Goods');
Route::resource('api/upload','admin/Upload');
Route::resource('api/team','admin/Team');
//推荐商品
Route::resource('api/recommendgoods','admin/Recommendgoods');
//用户注册
Route::resource('api/reg','admin/Registered');
//购物车
Route::resource('api/shopcar','index/Shopcar');
//历史记录
Route::resource('api/historygoods','index/historyGoods');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
