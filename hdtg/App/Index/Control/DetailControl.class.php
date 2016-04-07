<?php
   class DetailControl extends CommonControl{
    
   			public $gid;

        
   			public function __auto(){
   				
   				$this->gid=$this->_get('gid','intval');
          $this->db=K('goods');
          $this->setRecentView();

   			}

        public function index(){
            $this->assign("userIsLogin",isset($_SESSION[C('RBAC_AUTH_KEY')]));

          p($_SESSION);
        	$data=$this->db->getGoodsDetail($this->gid);

          $data=$this->setDetailData($data);
          //p($data['goods_server']);exit;
        	$this->assign('data',$data);
        	$this->display();            
        }
    
       /**
        * 调整查询数据函数
        */

        public function setDetailData($data)
        {
          # code...
          $data['discount']=round($data['price']/$data['old_price']*10,1);
          $pathInfo=pathinfo($data['goods_img']);
          $data['goods_img']=__ROOT__.'/'. $pathInfo['dirname'].'/'.$pathInfo['filename']."_460x280.".$pathInfo['extension'];
          if($data['end_time']-time()>pow(60,2)*24*3){
            $data['end_time']='剩余<span>3</span>天以上';
          }else{
            $data['end_time']=date('Y-m-d H:i:s',$data['end_time'])."下架";
          }
          $arrserver=unserialize($data['goods_server']);
          $arr=array_slice( $arrserver, 0,2);
          $server=C('goods_server');
          // //p($server);exit;
          // $data['goods_server']['name']=$server[$arr[1]]['name'];
          // $data['goods_server']['img']=$server[$arr[1]]['img'];
          // p($data['goods_server']);
          $data['goods_server']=array();
          foreach ($arr as $key => $value) {
            $data['goods_server'][]=$server[$value];
          }
             //p($data['goods_server']);exit;

          return $data;
        }



        public function setRecentView(){
          $key=encrypt('recent-view');
          $value=isset($_COOKIE[$key])?unserialize(decrypt($_COOKIE[$key])):array();
         if(in_array($this->gid, $value)==false){
          array_unshift($value, $this->gid);
         }
         setcookie($key,encrypt(serialize($value)),time()+86400,'/');
         //$value=unserialize(decrypt($_COOKIE[$key]));
         //p($value);

        }
   }
?>