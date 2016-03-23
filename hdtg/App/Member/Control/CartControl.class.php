<?php
class CartControl extends CommonControl{
	/**
	 * 显示购物车页
	 */	
	private $uid=null;
	//p判断用户是否登陆了
	public function __auto(){
		if(isset($_SESSION[C('RBAC_AUTH_KEY')])){
			$this->uid=$_SESSION[C('RBAC_AUTH_KEY')];
			$data=array();
			$db=K('Cart');
			if(isset($_SESSION['cart']['goods'])){
			foreach ($_SESSION['cart']['goods'] as $v) {
				$data['user_id']=$this->uid;
				$data['goods_id']=$v['id'];
				$data['goods_num']=$v['num'];

				if(!$db->checkCart($data)){//党数据库中没有相同产品时添加
				$total=$db->addCart($data);
				}else{//党数据有相同产品时inc追加
				$total=$db->incCart($data);
		}

			}
			
			//清除seesion
			unset($_SESSION['cart']);
		}
		}
	}



	public function index(){
		$result=$this->getCartData();
		$this->assign("carts",$result[0]);
		$this->assign("total",$result[1]);
		$this->display();
	}




/**
 * 添加购物车
 * @Author   FSW
 * @DateTime 2016-03-22T12:16:52+0800
 */
	public function add()
	{
		if(IS_AJAX===false) {throw new Exception("错误的访问");}
		$result=array();

		if(is_null($this->uid)){//用户没有登陆
			// $_SESSION['cart'][]=$this->_get('gid','intval');
			// $result=array("status"=>true);
			//使用购物车类
			$data=array(
				"id"=> $this->_get('gid','intval'),//商品id
				"name"=>"",//商品名称
				"num"=>1, //商品数量
				"price"=> 0//商品价格
				);
			Cart::add($data); //添加到购物车
			$total=count($_SESSION['cart']['goods']);
			$result=array("status"=>true,"total"=>$total);
		}else{//用户登陆

			$data=array();
			$data['user_id']=$this->uid;
			$data['goods_id']=$this->_get('gid','intval');
			$data['goods_num']=1;
			$db=K('Cart');

		if(!$db->checkCart($data)){//党数据库中没有相同产品时添加
			$total=$db->addCart($data);
		 }else{//党数据有相同产品时inc追加
			$total=$db->incCart($data);
		}
		$result=array("status"=>true,"total"=>$total);

		}
		exit(json_encode($result));
		
	}
/**
 * 获得用于分配给前台的购物车数据
 * @Author   FSW<keepfun.com>
 * @DateTime 2016-03-22T14:08:11+0800
 * @return   [type]                   [description]
 */
	public function getCartData(){
		if(is_null($this->uid)){//未登录的状态
			if(isset($_SESSION['cart']['goods'])===false) return;
			$data=$_SESSION['cart']['goods'];
			$result=array();
			$total=0;
			//$total=0;
			$db=K('Cart');
			foreach ($data as $key => $value) {
				# code...
				$result[$key]=$db->getGoodsData($data[$key]['id']);
				$result[$key]['num']=$data[$key]['num'];
				//$arr=$result[];
				$result[$key]=$this->disGoodsData($result[$key]);
				$total+=$result[$key]['xiaoji'];
	
			}
			return array($result,$total);

		}else{//登陆的状态
			$db=K('Cart');
			$result=array();
			$total=0;
			$data=$db->getGids($this->uid);
			if(isset($data)){
			foreach ($data as $key => $value) {
				# code...
				$result[$key]=$db->getGoodsData($data[$key]['goods_id']);
				$result[$key]['num']=$data[$key]['goods_num'];
				//$arr=$result[];
				$result[$key]=$this->disGoodsData($result[$key]);
				$total+=$result[$key]['xiaoji'];
				
			}
		}
			return array($result,$total);
		}
	}

/**
 * 对从数据所查数据进行处理
 * @Author   FSW<keepfun.com>
 * @DateTime 2016-03-22T13:57:25+0800
 * @param    [type]                   $data [description]
 * @return   [type]                         [description]
 */
	public function disGoodsData($data){
		$data['xiaoji']=$data['price']*$data['num'];
		$pathInfo=pathinfo($data['goods_img']);
        $data['goods_img']=__ROOT__.'/'. $pathInfo['dirname'].'/'.$pathInfo['filename']."_92x54.".$pathInfo['extension'];
        $data['status']=$data['end_time']<time()?"已下架":"可以购买";
        return $data;

	}


/**
 * 异步获得获得购物车内商品数量数据
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-22T22:27:15+0800
 * @return   [type]                   [description]
 */
	public function getAjaxData()
	{
		# code...
		if(IS_AJAX===false) {throw new Exception("错误的访问");}

		$result=array();
		$num=$this->_post('num','intval');
		$gid=$this->_post('gid','intval');

		if(is_null($this->uid)){//用户没有登陆
			foreach ($_SESSION['cart']['goods'] as $key => $value) {
				# code...
				if($value['id']==$gid){
					$_SESSION['cart']['goods'][$key]['num']=$num;
				}
			}

			$result=array('status'=>true,"num"=>$num);
		}else{//用户登陆
			$db=K('cart');
			$where=array("user_id"=>$this->uid,"goods_id"=>$gid);
			if($db->updateGoodsNum($where,$num)){
				$result=array('status'=>true,"num"=>$num);
			}
			

		}
		exit(json_encode($result));
		//p($_POST);
		
	}

/**
 * header购物车移过时获得ajax数据
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-23T11:53:27+0800
 * @return   [type]                   [description]
 */
	public function getHoverAjaxData()
	{
		# code...
		if(IS_AJAX===false) {throw new Exception("错误的访问");}
		$result=array();
			$total=0;

		if(is_null($this->uid)){//未登录的状态
			if(isset($_SESSION['cart']['goods'])===false) exit(json_encode(array("status"=>false)));
			$data=$_SESSION['cart']['goods'];
			$result=array();
			$total=0;
			//$total=0;
			$db=K('Cart');
			foreach ($data as $key => $value) {
				# code...
				$result[$key]=$db->getGoodsData($data[$key]['id']);
				$result[$key]['num']=$data[$key]['num'];
				//$arr=$result[];
				$result[$key]=$this->disGoodsData($result[$key]);
				$total+=$result[$key]['xiaoji'];
	
			}
			  exit(json_encode(array($result,$total)));

		}else{//登陆的状态
			$db=K('Cart');
			$result=array();
			$total=0;
			$data=$db->getGids($this->uid);
			if(isset($data)==false) exit(json_encode(array("status"=>false)));
			foreach ($data as $key => $value) {
				# code...
				$result[$key]=$db->getGoodsData($data[$key]['goods_id']);
				$result[$key]['num']=$data[$key]['goods_num'];
				//$arr=$result[];
				$result[$key]=$this->disGoodsData($result[$key]);
				$total+=$result[$key]['xiaoji'];
				
			}
				//p($result);
			 exit(json_encode(array($result,$total)));
		}

	}

/**
 * 通过异步删除购物车商品
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-23T13:29:46+0800
 * @return   [type]                   [description]
 */
	public function delete()
	{
		# code...
		if(IS_AJAX===false) return;
		$gid=$this->_get('gid','intval');
		//echo $gid;
		$result=array();

		if(is_null($this->uid)){//未登录的状态
			$data=$_SESSION['cart']['goods'];
			foreach ($data as $key => $value) {
				# code...
				if($value['id']==$gid)
					unset($_SESSION['cart']['goods'][$key]);
					//$_SESSION=array();
					//session_unset($data[$key]);
					$result=array("status"=>true);

				//continue;
			}
			
		}else{//登陆的状态
			$db=K('cart');
			$where=array("user_id"=>$this->uid,"goods_id"=>$gid);
			if($db->delCartDate($where)){
				$result=array("status"=>true);
			}
				
		}
			exit(json_encode($result));
		}



}
?>