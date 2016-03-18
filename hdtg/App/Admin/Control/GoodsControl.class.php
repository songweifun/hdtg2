<?php 
class GoodsControl extends CommonControl{
	private $gid;
/**
 * 初始化控制器
 */
public function __auto()
{
	# code...
	$this->db=K('Goods');
	$this->gid=$this->_get('gid','intval');

}
/**
 * 商品列表页
 */
public function index()
{  
	 $total=$this->db->getGoodsTotal();
	 //p($total);
   $page = new page($total,10);// 传入总记录数，用于计算出分页数
   $data = $this->db->getGoodsAll($page->limit());// 查询当前页的数据
   //p($data);
   $this->assign('data',$data);
   //$this->assign('fansongwei',"范松伟");

	 $this->assign('page',$page->show());
	# code...
	 $this->display();
}
/**
 * 添加商品函数
 */
public function add()
{
	if(IS_GET){
	$this->db=K('Shop');
	//获得店铺的信息
	$shop=$this->db->getEditShop($this->_get('shopid',"intval"));
	$this->assign('shop',$shop);
	# code...
	//获得分类信息
	$this->setCategory();

	//获得地区信息
	$this->setLocality();
	//获得放到配置相中的商品服务数据
	$server=C('goods_server');
	$this->assign('server',$server);


	$this->display();
	exit;
	}
      $data=$this->getData();
	     //插入数据库
	    if($this->db->addGoods($data)){
	    	$this->success('添加商品成功','index');
	    }else{
	    	throw new Exception("添加商品失败");
	    	
	    }
}
/**
 * 商品编辑
 */
public function edit()
{
	# code...
	if(IS_GET){
		$data=$this->db->getGoodsFind($this->gid);
		//p($data);exit;
		$data['goods_server']=unserialize($data['goods_server']);

		$this->assign("data",$data);

		//获得分类信息
		$this->setCategory();
		
		//获得地区信息
		$this->setLocality();

 		//获得放到配置相中的商品服务数据
		$server=C('goods_server');
		$this->assign('server',$server);
		
		$this->display();
		exit;
	}
 
   $data=$this->getData();
   //p($data);exit;
   if($this->db->editGoods($data,$this->gid)){
   	$this->success('编辑商品成功','index');

   }else{
   	throw new Exception("编辑商品失败");
   	
   }

}
/**
 * 删除商品
 */

public function del()
{
	# code...
	//删除图片
	$data=$this->db->getGoodsFind($this->gid);
	$path=$data['goods_img'];
	//p($path);exit;

	if($this->db->delGoods($this->gid)){
		$this->delOldFile($path);
		$this->success('删除成功','index');
		
	}else{
		throw new Exception("删除商品失败");
		
	}
}
/**
 * 组合post数据
 */
public function getData()
{
	# code...
	$data=array();
	$data['goods']['shopid']=$this->_post('shopid','intval');
	$data['goods']['cid']=$this->_post('cid','intval');
	$data['goods']['lid']=$this->_post('lid','intval');
	$data['goods']['main_title']=$this->_post('main_title','strip_tags');
	$data['goods']['sub_title']=$this->_post('sub_title','strip_tags');
	$data['goods']['price']=$this->_post('price','intval');
	$data['goods']['old_price']=$this->_post('old_price','intval');
	$data['goods']['begin_time']=$this->_post('begin_time','strtotime');
	$data['goods']['end_time']=$this->_post('end_time','strtotime');
	if(isset($_POST['goods_img'])){
		//如果存在old说明是编辑
		if(isset($_POST['old_img'])){
			$this->delOldFile($_POST['old_img']);
		}
	$data['goods']['goods_img']=$_POST['goods_img'][1]['path'];
 }
	$data['goods_detail']['detail']=$this->_post('detail','strip_tags');
	$data['goods_detail']['goods_server']=serialize($_POST['goods_server']);
	return $data;

}
/**
 * 获得分类信息
 */
public function setCategory()
{
	# code...
	$this->db=K('Category');
	$Category=$this->db->getCategoryAll();
	$Category=Data::channel($Category,'cid','pid',0,0,2,'--');
	//p($Category);
	$this->assign('Category',$Category);
}
/**
 * 获得地区信息
 */
public function setLocality()
{
	# code...
	$this->db=K('Locality');
	$Locality=$this->db->getLocalityAll();
	$Locality=Data::channel($Locality,'lid','pid',0,0,2,'--');
	//p($Locality);
	$this->assign('Locality',$Locality);
}

/**
 *删除旧的图片
 */

public function delOldFile($img)
{
	# code...
	$pathInfo=pathinfo($img);

	//p($pathInfo);
	//460,280,200,100,300,185,90,55
	$oldFile=array(
		ROOT_PATH.$img,
		ROOT_PATH.$pathInfo['dirname'].'/'.$pathInfo['filename'].'_460x280.'.$pathInfo['extension'],
		ROOT_PATH.$pathInfo['dirname'].'/'.$pathInfo['filename'].'_200x100.'.$pathInfo['extension'],
		ROOT_PATH.$pathInfo['dirname'].'/'.$pathInfo['filename'].'_300x185.'.$pathInfo['extension'],
		ROOT_PATH.$pathInfo['dirname'].'/'.$pathInfo['filename'].'_90x55.'.$pathInfo['extension']
		);
	//p($oldFile);exit;
	foreach ($oldFile as $v) {
		# code...
		if(file_exists($v)){
			unlink($v);
		}
	}
}



}

 ?>