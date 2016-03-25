<?php 
class OrderModel extends Model{

/**
 * 订单数据入库
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-25T19:15:53+0800
 * @param    [type]                   $data [description]
 */
public function addOrder($data){

return $this->add($data);


}



}



 ?>