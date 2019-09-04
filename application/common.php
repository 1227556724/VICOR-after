<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\JWT;
// 应用公共文件
//放公共的方法，不放数据库的操作、业务逻辑
//验证token
//在header、get、post方式进行传递
function checkJWT(){
    $authorization = request()->header('Authorization');
    $getToken = request()->get('token');
    $postToken = request()->post('token');
    if($authorization){
        $token = $authorization;
    }else if($getToken){
        $token = $getToken;
    }else if($postToken){
        $token = $postToken;
    }else{
        json([
            'code'=>401,
            'msg'=>'token不能为空'
        ])->send();
        exit();
    }
    $result = JWT::verify($token,config('jwtkey'));
    if(!$result){
        json([
            'code'=>401,
            'msg'=>'token验证失败'
        ])->send();
        exit();
    }
    request()->id = $result['id'];
}
function randomName(){
    $time=time();
    $arr=['v','i','c','o','r'];
    shuffle($arr);
    $str=join(array_slice($arr,0,5));
    return $str.'_'.$time;
}