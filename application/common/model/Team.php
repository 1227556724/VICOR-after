<?php


namespace app\common\model;


use think\Model;

class Team extends Model
{
    protected $table='team';
    protected $autoWriteTimestamp=true;
    public function finds($id){
        return $this->where('tid',$id)->field('tid,tname,exp,cid,des,avatar')->find();
    }
    public function inserts($data){
        return $this->isUpdate(false)->allowField(true)->save($data);
    }
    public function deletes($id){
        return $this->where('tid',$id)->delete();
    }

    public function updates($data,$id){
        return $this->isUpdate(true)->save($data,['tid'=>$id]);
    }
    public function queryones($arr){
        return $this->where($arr)->find();
    }
}