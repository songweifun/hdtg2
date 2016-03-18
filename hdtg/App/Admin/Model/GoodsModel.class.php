<?php 
class GoodsModel extends viewModel{

public $table='goods';

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
                'goods_detail'=>array(
                	'type' => 'inner',
                    'on' => 'goods_detail.goods_id=goods.gid',
                	)
            );



/**
 * 添加商品函数
 */
public function addGoods($data)
{
	# code...

	$gid=$this->table('goods')->add($data['goods']);
	$data['goods_detail']['goods_id']=$gid;
	return $this->table('goods_detail')->add($data['goods_detail']);
}

/**
 * 统计共有多少商品用于分页
 */
public function getGoodsTotal()
{
	# code...
	return $this->count();
}

/**
 * 获得所有商品作为列表数据
 */
public function getGoodsAll($limit)
{
	# code...

	return $this->limit($limit)->select();
	
}


/**
 * 获得固定商品的信息
 */
public function getGoodsFind($gid)
{
	# code...
	return $this->where(array("gid"=>$gid))->find();
}

/**
 * 编辑商品
 */
public function editGoods($data,$gid)
{
	# code...
	$count=0;
	$this->table('goods')->where(array('gid'=>$gid))->save($data['goods']);
	$count+=$this->getAffectedRows();
	$this->table('goods_detail')->where(array('goods_id'=>$gid))->save($data['goods_detail']);
	$count+=$this->getAffectedRows();
	return $count;

}

/**
 * 删除商品
 */
public function delGoods($gid)
{
	# code...
	$count=0;
	$count+=$this->table('goods_detail')->where(array('goods_id'=>$gid))->del();
	$count+=$this->table('goods')->where(array('gid'=>$gid))->del();
	if($count==2) return true;
}

}



 ?>