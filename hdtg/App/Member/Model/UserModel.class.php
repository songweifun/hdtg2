<?php
class UserModel extends Model{

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
}
?>