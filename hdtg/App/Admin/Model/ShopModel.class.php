<?php 
class ShopModel extends Model{
	public $table='shop';

	public function addShop($data)
	{
		# code...
		return $this->add($data);
	}

  //获得总记录数用于分页
	public function getShopTotal(){
		return $this->count();
	}

//获得每一页的数据
	public function getShop($limit)
	{
		# code...
		return $this->limit($limit)->select();
	}
	//获得需要编辑的数据
	public function getEditShop($shopid)
	{
		# code...
		return $this->where(array("shopid"=>$shopid))->find();
	}

	//编辑店铺
	public function editShop($shopid,$data)
	{
		# code...
		 $this->where(array("shopid"=>$shopid))->save($data);
		 return $this->getAffectedRows();
	}

	//删除商铺
	public function delShop($shopid)
	{
		# code...
		return $this->del($shopid);
	}
}

 ?>