<?php


namespace app\common\model;


use think\Model;

class Category extends Model
{
    protected $table='category';
    public function querys(){
        return $this->order('cid','asc')->select();
    }
    public function finds($id){
        return $this->where($id)->find();
    }
    public function inserts($data){
        return $this->isUpdate(false)->allowField(true)->save($data);
    }
    public function deletes($id){
        return $this->where('cid',$id)->delete();
    }

    public function updates($data,$id){
        return $this->isUpdate(true)->save($data,['cid'=>$id]);
    }
}