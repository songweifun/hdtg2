<?php
/**
 * 用户账户管理控制器
 * @author zhengyin
 */
class AccountControl extends CommonControl{

	public function __auto(){

		if(isset($_SESSION[C('RBAC_AUTH_KEY')])==false) $this->error("请先登录",U("Member/Login/index"));
	}
	/**
	 * 显示账户余额
	 */
	public function index(){
		$this->display();	
	}
	/**
	 * 用户成长信息
	 */
	public function growth(){
		$this->display();
	}
	/**
	 * 用户账户设置
	 */
	public function setting(){
		$this->display();
	}
	/**
	 * 设置收货地址
	 */
	public function setAddress(){
		$db=K('Address');
		$uid= $_SESSION[C('RBAC_AUTH_KEY')];
		if($address=$db->getUserAdresses($uid)){

			$this->assign('address',$address);
		}
		//p($address);exit;
		$this->display();
	}

	/**
	 * 添加收货地址
	 */
	public function addAddress(){
		$addressid=$this->_get('addressid');
		$where=array();
		$data=$this->getData();
		$db=K('Address');
		if(isset($addressid)){
			$where['addressid']=$addressid;
			if($db->updateAddress($data,$where)){
				$this->success('修改地址成功');
			}else{
				$this->error('修改地址失败');
			}

		}else{
			if($db->addAddress($data)){
				$this->success('添加地址成功');
			}else{
				$this->error('添加地址失败');
			}
		}



	}

	/**
	 * 删除地址
	 */
	public function delAddress(){
		$where=array();
		$where['addressid']=$this->_get('addressid','intval',null);
		$where['user_id']=$_SESSION[C('RBAC_AUTH_KEY')];
		$db=K('Address');
		if($db->delAddress($where)){
			$this->success('删除地址成功');
		}else{
			$this->error('删除地址失败');
		}

	}

	/**
	 * 修改收货地址
	 */
	public function editAddress(){
		$addressid=$this->_get('addressid','intval',null);
		$db=K('Address');
		$data=$db->getAddressDataOne($addressid);
		exit(json_encode($data));
	}

	/**
	 * 获得post数据
	 * @return array
	 */
	public function getData(){
		$data=array();
		$data['user_id']=$_SESSION[C('RBAC_AUTH_KEY')];
		$data['consignee']=$this->_post('uname','addslashes',null);
		$data['city']=$this->_post('s_city','addslashes',null);
		$data['province']=$this->_post('s_province','addslashes',null);
		$data['county']=$this->_post('s_county','addslashes',null);
		$data['tel']=$this->_post('tel','addslashes',null);
		$data['street']=$this->_post('street','addslashes',null);
		$data['postcode']=$this->_post('postcode','addslashes',null);
		return $data;
	}
}
?>