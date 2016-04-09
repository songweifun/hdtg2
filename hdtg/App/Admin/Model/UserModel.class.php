<?php
class UserModel extends ViewModel{

    public $table='user';
    public $view=array(
        'userinfo'=>array(

            'type'=>'inner',
            'on'=>'user.uid=userinfo.user_id'
        )



    );


    /**
     * 获得用户总数
     * @param $where
     * @return mixed
     */
    public function getUserTotal($where){

        return $this->where($where)->count();
    }

    /**
     * 获得用户数据
     * @param $where
     * @param $limit
     * @return mixed
     */
    public function getUserData($where,$limit){

        return $this->where($where)->limit($limit)->select();
    }


    public function delUser($uid)
    {
        $this->table('collect')->where(array("user_id"=>$uid))->del();
        $this->table('cart')->where(array("user_id"=>$uid))->del();
        $this->table('order')->where(array("user_id"=>$uid))->del();
        $this->table('user_address')->where(array("user_id"=>$uid))->del();
        $this->table('userinfo')->where(array("user_id"=>$uid))->del();
        return $this->table('user')->where(array("uid"=>$uid))->del();

    }
}

?>