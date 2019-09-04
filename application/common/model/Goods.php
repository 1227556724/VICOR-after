<?php


namespace app\common\model;


use think\Model;

class Goods extends Model
{
    protected $table='goods';
    protected $autoWriteTimestamp=true;
    public function querys($limit,$sarr,$page){
        return $this->order('gid','desc')
                ->where($sarr)->paginate($limit,false,[
                'page'=>$page
            ]);
    }
    public function finds($id){
        return $this->where('gid',$id)
            ->field('gid,gname,ename,price,des,gbanner,gthumb,gcolor,gsize,gtype,gdel,gsales,gdetail,gstock,cid')
            ->find();
    }
    public function inserts($data){
        return $this->isUpdate(false)->allowField(true)->save($data);
    }
    public function deletes($id){
        return $this->where('gid',$id)->delete();
    }

    public function updates($data,$id){
        return $this->isUpdate(true)->save($data,['gid'=>$id]);
    }
}