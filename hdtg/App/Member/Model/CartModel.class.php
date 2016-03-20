<?php 
class CartModel extends Model{
	//购物车模型
	public $table="cart";
	
/**
 * [addCart description]
 * @Author   FSW
 * @DateTime 2016-03-20T22:06:30+0800
 * @param    [array]                   $data [添加的购物车数据]
 */
	public function addCart($data){
		$result=$this->add($data);
		$total=$this->field("goods_id")->where(array('user_id'=>$data['user_id']))->count();
		return $total;
	}

/**
 * [检查是否有同一商品函数]
 * @Author   FSW
 * @DateTime 2016-03-20T22:20:32+0800
 * @param    [type]                   $data [description]
 * @return   [type]                         [description]
 */
 public function checkCart($data){
 	$result=$this->where(array('user_id'=>$data['user_id'],"goods_id"=>$data['goods_id']))->count();
 	return $result;
 }



public function incCart($data){

	$this->inc("goods_num","goods_id=".$data['goods_id'],1);
	$total=$this->field("goods_id")->where(array('user_id'=>$data['user_id']))->count();
		return $total;
	}






}





 ?>