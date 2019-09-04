<?php


namespace app\admin\validate;


use think\Validate;

class Category  extends Validate
{
    protected $rule=[
        'cname'=>'require|min:1|max:10',
        'sort'=>'require|number'
    ];
    protected $message=[
        'cname.require'=>'请输入分类名称',
        'sort.require'=>'请输入排序',
        'cname.min'=>'分类名称不得小于1位字符',
        'cname.man'=>'分类名称不得大于10位字符',
    ];
}