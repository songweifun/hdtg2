<?php
   class OrderControl extends CommonControl{

        public $uid=null;
        public function __auto(){
           $this->uid=$_SESSION[C('RBAC_AUTH_KEY')];

       }


        public function index(){
        if(is_null($this->uid)) $this->error("你尚未登录",U('Member/Login/index'));
            $db=K('Order');
            //p($this->uid);exit;
            $status=$this->_get('status','intval',null);
            if(is_null($status)) {
                $where = array("user_id" => $this->uid);
            }else{
                $where = array("user_id" => $this->uid, "status" => $status);
            }
            $data=$db->getOrderData($where);
            $order=$this->disData($data);
            //p($order);exit;
            $this->assign("order",$order);
            $this->display();
        }


       public function disData($data){
           if(!$data) return;
        foreach($data as $k=>$v) {
            $data[$k]['xiaoji'] = $v['price'] * $v['goods_num'];
            $pathInfo = pathinfo($v['goods_img']);
            $data[$k]['goods_img'] = __ROOT__ . '/' . $pathInfo['dirname'] . '/' . $pathInfo['filename'] . "_92x54." . $pathInfo['extension'];
        }
            return $data;


       }
   }
?>