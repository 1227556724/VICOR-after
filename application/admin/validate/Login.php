<?php


namespace app\admin\validate;


use think\Validate;

class Login extends Validate
{
    protected $rule=[
        'username'=>'require|min:5|max:10',
        'password'=>'require|min:6|max:10'
    ];
    protected $message=[
        'username.require'=>'请输入用户名',
        'password.min'=>'密码不得少于6位数',
        'username.max'=>'用户名不得超过10位数',
        'username.min'=>'用户名不得少于5位数',
        'password.require'=>'请输入密码',
        'password.max'=>'密码不得超过12位数'
    ];
}