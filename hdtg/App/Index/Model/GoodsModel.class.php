<?php 
class GoodsModel extends viewModel{
	public $table='goods';
	public $cids=array();
	public $lids=array();
	public $strprice="";
	public $strorder="";
	//定义关联

	public $view = array(
                'shop' => array(
                    'type' => "inner",
                    "on" => "shop.shopid=goods.shopid",
                ),
                'category' => array(
                    'type' => 'inner',
                    'on' => 'category.cid=goods.cid',
                ),
                'locality' => array(
                    'type' => 'inner',
                    'on' => 'locality.lid=goods.lid',
                ),
                'goods_detail' => array(
                    'type' => 'inner',
                    'on' => 'goods_detail.goods_id=goods.gid',
                )
            );
	/**
	 * 获得商品总数用于分页
	 */

	public function getGoodsTotal()
	{
		$where=rtrim("end_time>".time()." and ".$this->strprice," and");
		//p($where);


		# code...
		//p($this->cids);
		//p($this->lids);
		if(!empty($this->cids) && !empty($this->lids)){
		$result=$this->where($where)->in($this->cids)->in($this->lids)->count();

	  }else{

	  	if(!empty($this->cids)){
	  		$result=$this->where($where)->in($this->cids)->count();
	  	}elseif(!empty($this->lids)){
	  		$result=$this->where($where)->in($this->lids)->count();
	  	}else{
	  		$result=$this->where($where)->count();
	  	}
	  }
	    		return $result;


	}


	/**
	 * 获得按条件筛选的数据
	 */
public function getGoodsAll($limit)
	{
		$where=rtrim("end_time>".time()." and ".$this->strprice," and");
		p($where);
		p($this->strorder);

		# code...
		//p($this->cids);
		//p($this->lids);
		if(!empty($this->cids) && !empty($this->lids)){
		$result=$this->field('goods.gid,goods.main_title,goods.price,goods.old_price,goods.buy,goods.goods_img,goods.sub_title')->where($where)->in($this->cids)->in($this->lids)->limit($limit)->order($this->strorder)->select();

	  }else{

	  	if(!empty($this->cids)){
	  		$result=$this->field('goods.gid,goods.main_title,goods.price,goods.old_price,goods.buy,goods.goods_img,goods.sub_title')->where($where)->in($this->cids)->limit($limit)->order($this->strorder)->select();
	  	}elseif(!empty($this->lids)){
	  		$result=$this->field('goods.gid,goods.main_title,goods.price,goods.old_price,goods.buy,goods.goods_img,goods.sub_title')->where($where)->in($this->lids)->limit($limit)->order($this->strorder)->select();
	  	}else{
	  		$result=$this->field('goods.gid,goods.main_title,goods.price,goods.old_price,goods.buy,goods.goods_img,goods.sub_title')->where($where)->limit($limit)->order($this->strorder)->select();
	  	}
	  }
	    		return $result;


	}
	
/**
 * 获得指定gid的商品的详细信息
 */
public function getGoodsDetail($gid)
{
	# code...
	return $this->where(array('gid'=>$gid))->find();
}

}




 ?>
