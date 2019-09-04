<?php


namespace app\common\model;


use think\Model;

class Registered extends Model
{
    protected $table='users';
    protected $autoWriteTimestamp=true;
    public function inserts($data){
        return $this->isUpdate(false)->allowField(true)->save($data);
    }
    public function querys(){
        return $this->order('uid','asc')->select();
    }
}