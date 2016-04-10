<?php 

class AddressModel extends viewModel{

	public $table='user_address';
	/*public $view=array(
		"user"=>array(
			'type'=>'inner',
			"on"=>"user.uid=user_address.user_id"
		)

	);*/
/**
 * 查询登陆用户收货地址
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-25T17:43:34+0800
 * @param    [type]                   $uid [description]
 * @return   [type]                        [description]
 */
	public function getUserAdresses($uid){

		return $this->where(array('user_id'=>$uid))->all();

	}


	/**添加收货地址
	 * @param $data
	 * @return mixed
	 */
	public function addAddress($data)
	{
		return $this->add($data);
	}

	public function delAddress($where)
	{
		return $this->where($where)->del();
	}

	/**
	 * 获得指定地址数据
	 * @param $aid
	 * @return mixed
	 */
	public function getAddressDataOne($aid)
	{
		return $this->where(array("addressid"=>$aid))->find();
	}

	/**
	 * 更新用户地址
	 * @param $data
	 * @param $where
	 * @return mixed
	 */
	public function updateAddress($data,$where)
	{
		return $this->where($where)->save($data);
	}
}



 ?>