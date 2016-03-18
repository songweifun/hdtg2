<?php
class CategoryControl extends CommonControl{
	private $cid;
	public function __auto(){
		//实例模型
		$this->db = K('category');
		//获得get数据cid
		$this->cid=$this->_get('cid',0);
		//p($this->cid);
	}
	/**
	 * 显示分类列表
	 */
	 public function Index(){
	 	$category=$this->db->getCategoryAll();
	 	$data=Data::channel($category,'cid','pid',0,0,2,'--');
	 	//p($data);
	 	$this->assign("data",$data);
	 	$this->display();
	 }
	/**
	 * 添加分类的方法
	 */
	public function add(){
//是get请求添加模版
		
		if(IS_GET === true){
      //获得所属父栏目
      $parent=$this->db->getParentCategory($this->cid);
      $this->assign("parent",$parent);

			$data = $this->db->getCategoryAll();
			$level=Data::channel($data,'cid','pid',0,0,2,'--');
			$this->assign('level',$level);
			$this->display();
			exit;
		}
		//p($_POST);
    $data=$this->getData();
    //p($data);

		if($this->db->addCategory($data)){
			$this->success("添加栏目成功",U("Admin/Category/Index"));
		}else{
			throw new Exception("添加分类失败！");
			
		}
		
	}
	
	public function edit(){
		if(IS_GET === true){
		//获得栏目数据
		$data=$this->db->getAllData($this->cid);
		$this->assign('data',$data);
		//获得分类层级
			$data = $this->db->getCategoryAll();
			$level=Data::channel($data,'cid','pid',0,0,2,'--');
			$this->assign('level',$level);
			//获得所属分类
			$parent=$this->db->getParentCategorys($this->cid);
      $this->assign("parent",$parent);
      //p($parent);exit;
      $this->display();
      exit;
	}
  //p($_POST);exit;
	//更新数据
	$data=$this->getData();
	if($this->db->editCategory($data,$this->cid)){
		$this->success('编辑栏目成功',U('Admin/category/Index'));
	}else{
		throw new Exception("编辑栏目失败！");
	}
		
	}
public function del(){
	if($this->db->checkSonCategory($this->cid)){
		$this->error("栏目存在子栏目无法删除，请先删除子类",U('Admin/Category/index'));
	}

	if($this->db->delCategory($this->cid)){
		$this->success('删除栏目成功',U('index'));
	}else{
		throw new Exception("删除栏目失败！");
	}
}


	public function getData(){
				$data=array();
				$data['pid']=$this->_post("pid",'intval');
				$data['cname']=$this->_post("cname",'strip_tags');
				$data['title']=$this->_post("title",'htmlspecialchars');
				$data['keywords']=$this->_post("keywords",'htmlspecialchars');
				$data['description']=$this->_post("description",'htmlspecialchars');
				$data['sort']=$this->_post("sort",'intval');
				$data['display']=$this->_post("display",'intval');
				return $data;

	}

	
	
	
	
	
	
	
	
	
	
	
}

















?>