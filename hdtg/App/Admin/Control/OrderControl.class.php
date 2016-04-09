<?php
class OrderControl extends CommonControl{


    public function index()
    {
        $this->getOrderData();
        $this->display();
    }

    /**
     *获得订单数据并分配
     */
    public function getOrderData()
    {
       $db=K('Order');
       $where=$this->getWhere();
       $orderTotal=$db->getOrderDataTotal($where);
       $page=new page($orderTotal);

       $orders=$db->getOrderData($where,$page->limit());
        $this->assign('page',$page->show());
        $this->assign('orders',$orders);
    }


    /**
     * 组合查询数据库where条件
     * @return array
     */
    public function getWhere(){
        $where=array();
        $status=$this->_get('status','intval',null);
        if($status){
            $where['status']=$status;
        }
        return $where;

    }

    /**
     * 删除订单
     */
    public function del()
    {
        $orderid=$this->_get('orderid','intval',null);
        $db=K('order');
        if($db->delOrder($orderid)){
            $this->success('删除订单成功',U('Admin/Order/index'));
        }else{

            $this->error('删除订单失败',U('Admin/Order/index'));
        }
    }
}


?>