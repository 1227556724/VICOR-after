<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\JWT;
use think\Request;

class Registered extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //

    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $data=$this->request->post();
//        判断用户是否已经注册
        $name=Db::table('users')->where('phone',$data['phone'])->find();
        if($name['phone']==$data['phone']){
            return json([
                'code'=>config('code.fail'),
                'msg'=>'该用户名已经存在'
            ]);
        }
        $data['uname']= randomName();
        $password=$data['password'];
        $data['password']=md5(crypt($password,config('salt')));
        $model=model('Registered');
        $result=$model->inserts($data);
            if($result){
                return json([
                    'code'=>config('code.success'),
                    'msg'=>'注册成功'
                ]);
            }else{
                return json([
                    'code'=>config('code.fail'),
                    'msg'=>'注册失败'
                ]);
            }


    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=$this->request->put();
        $pass=md5(crypt($data['password'],config('salt')));
        $result=Db::table('users')->where('phone',$data['phone'])->find();
        if($data['phone']==$result['phone']){
            if($pass==$result['password']){
                $token=JWT::getToken(['id'=>$result['uid'],'uname'=>$result['uname']],config('jwtkey'));
                return json([
                    'code'=>config('code.success'),
                    'msg'=>'登录成功',
                    'token'=>$token
                ]);
            }else{
                return json([
                    'code'=>config('code.fail'),
                    'msg'=>'用户名与密码不匹配',
                    'token'=>'',
                ]);
            }
        }else{
            return json([
                'code'=>config('code.fail'),
                'msg'=>'该用户名不存在，请先注册'
            ]);
        }

    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
