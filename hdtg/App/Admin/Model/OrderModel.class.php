<?php
class OrderModel extends ViewModel{

    public $table='order';
    //关联goods表
    public $view=array(

        'goods'=>array(
            'type'=>'inner',
            'on'=>'goods.gid=order.goods_id'

        ),
        'user'=>array(

            'type'=>'inner',
            'on'=>'order.user_id=user.uid'
        )
);

    /**
     * 获得订单总数
     * @param $where
     * @return mixed
     */
    public function getOrderDataTotal($where)
    {
        return $this->where($where)->count();
    }

    /**
     * 获得订单数据
     * @param $where
     * @param $limit
     * @return mixed
     */
    public function getOrderData($where,$limit)
    {
        $fields=array(

            'main_title',
            'price',
            'goods_num',
            'total_money',
            'uname',
            'orderid'
        );
        return $this->field($fields)->where($where)->limit($limit)->select();
    }

    /**
     * 删除订单
     * @param $oid
     * @return mixed
     */
    public function delOrder($oid){

        return $this->where(array('orderid'=>$oid))->del();
    }

}
?>