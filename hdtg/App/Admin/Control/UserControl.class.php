<?php
 class UserControl extends CommonControl{

    public function index(){

        $this->getUserData();
        $this->display();


    }

     /**
      * 获得会员数据并分配
      */
     public function getUserData(){
        $db=K('user');
         $where=$this->getWhere();
        $userTotal=$db->getUserTotal($where);
         $page=new page($userTotal);
         $userData=$db->getUserData($where,$page->limit());
         //p($userData);exit;
         $this->assign('page',$page->show());
         $this->assign('user',$userData);


     }


     /**
      * 设置查询条件
      * @return array
      */
     public function getWhere(){


         $where=array();
         return $where;
     }

     /**
      * 删除会员
      */

     public function del(){

         $uid=$this->_get('uid','intval',null);
         $db=k('User');
         if($db->delUser($uid)){
             $this->success('删除成功',U('Admin/User/index'));
         }else{

             $this->error('删除失败',U('Admin/User/index'));
         }
     }

 }

?>