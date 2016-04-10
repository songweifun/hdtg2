<?php
class BuyControl extends CommonControl{

	public $uid;

	public function __auto(){

		$this->uid=$_SESSION[C('RBAC_AUTH_KEY')];
	}
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
		//p($_POST);exit;
		if(IS_POST===true){
			if(!isset($_POST['addressid'])) $this->error('没有收货地址','Member/Account/setAddress');
			if(!isset($_POST['gid'])) $this->error("购物车没有商品",U('Index/Index/index'));
		if(is_array($_POST['gid'])){//购物车提交数据
			$data=$_POST;
			/*foreach($_POST['gid'] as $k=>$v){
			$data=array();
			$data['goods_id']=$v;
			$data['user_id']=$_SESSION[C('RBAC_AUTH_KEY')];
			$data['price']=$_POST['price'][$k];
			$data['goods_num']=$_POST['goods_num'][$k];
			$data['total_money']=$data['goods_num']*$data['price'];

			$data['addressid']=$_POST['addressid'];
			$db=K('Order');
			if(!$db->addOrder($data)) throw new Exception("添加订单失败");


			}*/

			foreach($data['gid'] as $k=>$v){
				$_POST=array();
				$_POST['gid']=$v;
				$_POST['price']=$data['price'][$k];
				$_POST['goods_num']=$data['goods_num'][$k];
				$_POST['addressid']=$data['addressid'];

				if(!$this->addOrder()) throw new Exception("添加订单失败");


			}






		}else{//抢购提交数据ß

			if(!$this->addOrder()) throw new Exception("添加订单失败");

		}
	}

		$gid=$this->_get('gid','intval',null);
		if(!is_null($gid)) {
			$where = array("user_id" => $this->uid, "status" => 1, "goods_id" =>$gid);//组合查询订单条件
		}else{
			$where = array("user_id" => $this->uid, "status" => 1);//组合查询订单条件

		}
		$result=$this->getOrderData($where);//获得订单数据

		$sumArr=array();
		foreach($result as $v){

			$sumArr[]=$v['price']*$v['goods_num'];
		}

		$sum=array_sum($sumArr);//获得总价
		$db=K('User');//获得用户余额
		$balance=$db->getUserBalance($this->uid)?$db->getUserBalance($this->uid):0;
		//p($balance);exit;

		$this->assign('balance',$balance);
		$this->assign('sum',$sum);
		$this->assign('order',$result);
		$this->display();
	}

	/**
	 * 验证提交订单
	 */
	public function checkOrder(){
		if(IS_POST===false){
			exit;
		}

		$orderids=$_POST['orderid'];
		$db=K('Order');
		$result=$db->getOrder($orderids);

		$sumArr=array();
		foreach($result as $v){

			$sumArr[]=$v['price']*$v['goods_num'];
		}

		$sum=array_sum($sumArr);//获得总价

		$db=K('User');//获得用户余额
		$balance=$db->getUserBalance($this->uid)?$db->getUserBalance($this->uid):0;

		if($balance<$sum){
			$this->error('余额不足请充值',U('Member/Account/index'));
		}else{

			$this->buysuccess($orderids,$sum);
		}


	}
	/**
	 * 获得订单数据
	 */
	private function getOrderData($where){
		$db=K('Order');
		return $db->getOrderData($where);


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
		$where=array('user_id'=>$this->uid,"goods_id"=>$data['goods_id'],"status"=>1);
		if(!$db->checkNopayOrder($where)) {//检测是否有同类商品未付款订单
			return $db->addOrder($data);
		}else{

			return true;
		}

	}





	/**
	 * 购买成功
	 */
	public function buysuccess($orderids,$sum){
		$db=K('Order');
		if($db->updateStatus($orderids)) {//减少余额
			$db=K('User');
			$db->reduceBlance($sum,$this->uid);
			$db=K('Cart');
			$db->delCartDate(array("user_id"=>$this->uid));
			$this->display('buysuccess');
		}else{

			$this->error("付款失败",U('Index/Index/index'));
		}
	}



	/**
	 * 删除订单
	 */
	public function delOrder(){
		if(!$this->uid) exit('非法操作');
		$orderid=$this->_get('oid','intval',null);
		$where=array("user_id"=>$this->uid,"orderid"=>$orderid);
		$db=K('Order');
		if($db->delOneOrder($where)){
			$this->success('删除订单成功',U('Member/Order/index'));
		}else{
			$this->error('删除订单失败',U('Member/Order/index'));
		}
	}
}













?>