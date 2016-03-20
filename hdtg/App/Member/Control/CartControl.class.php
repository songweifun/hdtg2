<?php
class CartControl extends Control{
	/**
	 * 显示购物车页
	 */	
	private $uid=null;
	//p判断用户是否登陆了
	public function __init(){
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
		$this->display();
	}

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
}
?>