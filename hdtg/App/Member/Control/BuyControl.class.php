<?php
class BuyControl extends CommonControl{
	
	/**
	 * 订单提交页
	 */
	public function index(){
		$gid=$this->_get('gid','intval');
		$db=K('Goods');
		$data=$db->getOneGoodData($gid);
		//p($data);
		$db=K('Address');
		$uid= $_SESSION[C('RBAC_AUTH_KEY')];
		if($address=$db->getUserAdresses($uid)){
			//p($address);
		$this->assign('address',$address);
	 }
		$this->assign('data',$data);
		$this->display();
	}
	/**
	 * 付款页 
	 */
	public function payment(){
		//p($_POST);
		if(!$this->addOrder()) throw new Exception("添加订单失败");
		
		$this->display();
	}

/**
 * 添加订单方法
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-25T19:16:25+0800
 */
	private function addOrder(){

		$data=array();
		$data['user_id']=$_SESSION[C('RBAC_AUTH_KEY')];
		$data['goods_id']=$this->_post('gid','intval');
		$data['goods_num']=$this->_post('goods_num','intval');
		$data['total_money']=$data['goods_num']*$this->_post('price','intval');
		$data['addressid']=$this->_post('addressid','intval');
		$db=K('Order');
		return $db->addOrder($data);

	}





	/**
	 * 购买成功
	 */
	public function buysuccess(){
		$this->display();
	}
}













?>