<?php 
class ShopControl extends CommonControl{
	private $shopid;
	public function __auto()
	{

		# code...
		$this->db=K('Shop');
		$this->shopid=$this->_get('shopid','intval');
	}

	public function index()
	{

		$total=$this->db->getShopTotal();
		$page = new page($total,1);// 传入总记录数，用于计算出分页数
		// 显示分页页码
    $this->assign('page',$page->show());
		$data=$this->db->getShop($page->limit());
		$this->assign('data',$data);
		# code...
		$this->display();
	}

	public function add()
	{
		if(IS_GET){
		# code...
		$this->display();
		exit;
		}

 $data=$this->getData();
 //入库操作
 if($this->db->addShop($data)){
 	$this->success('添加店铺成功','index');
 }else{
 	throw new Exception("添加店铺失败！");
 	
 }


	}

/**
 * 编辑商铺
 */
public function edit()
{
	if(IS_GET){

		$data=$this->db->getEditShop($this->shopid);
		$this->assign('data',$data);
		# code...
	  $this->display();
	  exit;
	}

	$data=$this->getData();
	//p($data);exit;

	if($this->db->editShop($this->shopid,$data)){
		$this->success('编辑商铺成功','index');
	}else{
		throw new Exception("编辑商铺失败");
		
	}
	
}
/**
 * 删除商铺
 */

public function del()
{
	# code...
	if($this->db->delShop($this->shopid)){
		$this->success('删除商铺成功','index');
	}else{
		throw new Exception("删除商铺失败");
		
	}

}

/**
 * 过滤post数据
 */
public function getData()
{
	# code...
	$data=array();
	$data['shopname']=$this->_post('shopname','strip_tags');
	$data['shopaddress']=$this->_post('shopaddress','strip_tags');
	$data['metroaddress']=$this->_post('metroaddress','strip_tags');
	$data['shoptel']=$this->_post('shoptel','strip_tags');
	$data['shopcoord']=$this->_post('shopcoord','strip_tags');
	return $data;
}


}

 ?>