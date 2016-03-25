<?php 

class AddressModel extends Model{

	public $table='user_address';
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


}



 ?>