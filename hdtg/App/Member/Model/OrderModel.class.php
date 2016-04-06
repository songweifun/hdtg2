<?php 
class OrderModel extends ViewModel{

 public $table="Order";

/**
 * 订单数据入库
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-25T19:15:53+0800
 * @param    [type]                   $data [description]
 */
public function addOrder($data){

return $this->add($data);


}

 /**
  * 关联goods表获得订单数据
  * @param $uid
  * @return mixed
  */
 public function getOrderData($where){
  $this->view=array(
    "goods"=>array(
        "type"=>"inner",
        "on"=>"goods.gid=order.goods_id"
    )

  );

  $filed=array(
    "main_title",
    "price",
    "gid",
    "goods_num",
    "orderid",
   "goods_img",
   "status"

  );

  return $this->field($filed)->where($where)->select();
 }

 /**
  * 获得验证数据
  * @param $orderids
  * @return mixed
  */
 public function getOrder($orderids){


  $this->view=array(
      "goods"=>array(
          "type"=>"inner",
          "on"=>"goods.gid=order.goods_id"
      )

  );


  return $this->field('price','goods_num')->in(array("orderid"=>$orderids))->select();
 }

 /**
  * 更新订单状态
  * @param $orderids
  * @return mixed
  */
 public function updateStatus($orderids){
  return $this->in(array("orderid"=>$orderids))->save(array("status"=>2));
 }

 /**
  * 检测是否有同类商品未付款订单
  * @param $where
  * @return mixed
  */
 public function checkNopayOrder($where){
  return $this->where($where)->count();
 }

 /**
  * 删除订单
  * @param $where
  * @return mixed
  */
 public function delOneOrder($where){
  return $this->where($where)->del();
 }

}



 ?>