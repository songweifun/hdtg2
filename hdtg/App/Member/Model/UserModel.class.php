<?php
class UserModel extends ViewModel{
    public $view;
    /**
     * 获得用户余额函数
     */
    public function getUserBalance($uid){

        $result=$this->table('userinfo')->field('balance')->where(array("user_id"=>$uid))->find();
        return $result['balance'];

    }

    /**
     * 减少用户余额函数
     */

    public function reduceBlance($sum,$uid){
        $this->table('userinfo')->dec('balance','user_id='.$uid,$sum);
    }




    /**
     * 添加收藏函数
     */
    public function addCollect($data){
        if($this->table("collect")->where($data)->count()){
            return false;
        }
        return $this->table('collect')->add($data);

    }


    /**
     * 查询收藏数据
     */
    public function getCollectData($where){

        $this->view=array(
            "collect"=>array(
                "type"=>"inner",
                "on"=>"user.uid=collect.user_id"
            ),
            "goods"=>array(

                "type"=>"inner",
                "on"=>"goods.gid=collect.goods_id"
            )


        );

        $field=array(

            "gid",
            "main_title",
            "goods_img",
            "price",
            "end_time"


        );

        $result=$this->field($field)->where($where)->select();
        return $result;
    }


    /**
     * 删除收藏的几率
     */

    public function delCollect($uid,$gid)
    {
        return $this->table('collect')->where(array("user_id"=>$uid,"goods_id"=>$gid))->del();
    }

}
?>