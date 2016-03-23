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


/**
 * 追加数量
 * @Author   FSW<keepfun.com>
 * @DateTime 2016-03-22T12:34:32+0800
 * @param    [type]                   $data [description]
 * @return   [type]                         [description]
 */
public function incCart($data){

	$this->inc("goods_num","goods_id=".$data['goods_id'],1);
	$total=$this->field("goods_id")->where(array('user_id'=>$data['user_id']))->count();
		return $total;
	}


/**
 * 查询商品信息
 * @Author   FSW<keepfun.com>
 * @DateTime 2016-03-22T12:39:54+0800
 * @param    [int]                   $gid [商品gid]
 * @return   [array]                        [单个商品信息]
 */
public function getGoodsData($gid){
	$field=array(
			"gid",
			"price",
			"goods_img",
			"end_time",
			"main_title"
		);
	return $this->table('goods')->field($field)->where(array('gid'=>$gid))->find();

}


/**
 * 根据uid获得商品的gid数组
 * @Author   FSW<keepfun.com>
 * @DateTime 2016-03-22T15:45:29+0800
 * @param    [type]                   $uid [description]
 * @return   [type]                        [description]
 */
public function getGids($uid)
{
	# code...
	return $this->where(array('user_id'=>$uid))->select();
}

/**
 * 更新购物车的数量
 * @Author   FSW<keepfun.com>
 * @DateTime 2016-03-22T15:48:57+0800
 * @param    [type]                   $where [description]
 * @param    [type]                   $num   [description]
 * @return   [type]                          [description]
 */
public function updateGoodsNum($where,$num)
{
	# code...
	$this->where($where)->save(array("goods_num"=>$num));
	return $this->getAffectedRows();
}
/**
 * 登陆状态下删除购物车数据
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-23T12:06:23+0800
 * @param    [type]                   $where [description]
 * @return   [type]                          [description]
 */
public function delCartDate($where)
{
	# code...
	return $this->where($where)->delete();
}


}





 ?>