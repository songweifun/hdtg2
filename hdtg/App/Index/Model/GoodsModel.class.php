<?php 
class GoodsModel extends viewModel{
	public $table='goods';
	public $cids=array();
	public $lids=array();
	public $strprice="";
	public $strorder="";
	public $keywords=null;
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
		if(!$this->keywords) {
			$where = rtrim("end_time>" . time() . " and " . $this->strprice, " and");
			//p($where);
		}else{

			$where='sub_title like "%'.$this->keywords.'%"';
		}


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
		if(!$this->keywords) {
			$where = rtrim("end_time>" . time() . " and " . $this->strprice, " and");
			//p($where);
		}else{

			$where='sub_title like "%'.$this->keywords.'%"';
		}
		p($where);//exit;
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


	/**
	 * 获得热卖商品
	 */
	public function getHotGoods(){
	$field=array(
		"main_title",
		"goods_img",
		"price",
		"buy",
		"gid"
	);
		return $this->field($field)->order('buy desc')->limit(5)->select();
	}

	/**
	 * 获得热门团购
	 */
	public function getHotGroups(){


		//$this->view=array();
		$fields = array('goods.cid','cname','count(gid)');
		return $this->field($fields)->group('goods.cid')->order('count(gid) desc')->limit(8)->select();
		//$field='select group_goods.cid,cname,count(cname) as number from group_goods inner join group_category on group_goods.cid=group_category.cid group by group_goods.cid order by number;';
		//return $this->runSql($field);


	}



	public function getGoodCid($gid)
{
	$result=$this->field('goods.cid')->where(array("gid"=>$gid))->find();
	$cid= $result['cid'];
	return $this->field('gid','main_title','price','old_price','buy','goods_img')->where($result)->limit(5)->select();
}
}




 ?>
