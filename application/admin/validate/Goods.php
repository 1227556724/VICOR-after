<?php


namespace app\admin\validate;


use think\Validate;

class Goods extends Validate
{
    protected $rule=[
        'gname'=>'require|min:4|max:100',
        'ename'=>'require|min:4|max:100',
        'price'=>'require|number',
        'gsize'=>'require',
        'gtype'=>'require',
        'gcolor'=>'require',
        'gstock'=>'require|number',
        'gdel'=>'require',
        'gbanner'=>'require',
        'gthumb'=>'require',
        'gdetail'=>'require',
        'des'=>'require|max:100'
    ];

    protected $message=[];
}