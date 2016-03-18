<?php 
class LocalityControl extends CommonControl{
private $lid;
public function __auto()
{
	# code...
	$this->db=K('Locality');
	$this->lid=$this->_get('lid','intval',0);
}

public function index()
{

	//获得所有地区
		 $Locality=$this->db->getLocalityAll();

		 $data=Data::channel($Locality,'lid','pid',0,0,2,'--');
		 //p($data);exit;
		 $this->assign('data',$data);
	# code...
	$this->display();
}

public function add(){
	if(IS_GET){
		//获得父地区
     $parent=$this->db->getParentLocality($this->lid);
	//p( $parent);exit;
     $this->assign("parent",$parent);
		//获得所有地区
		 $data=$this->db->getLocalityAll();

		 $level=Data::channel($data,'lid','pid',0,0,2,'--');
		 //p($level);exit;
		 $this->assign('level',$level);

	//显示模版
	   $this->display();
	   exit;
	 }
  
  // 添加post数据
	 $data=$this->getData();
	 //插入数据库
	 if($this->db->addLocality($data)){
	 	$this->success('添加地区成功','index');
	 }else{
	 	throw new Exception("添加地区失败");
	 	
	 }



     }


   /**
    * 编辑地区
    */
    public function edit()
    {
    	if(IS_GET){
       //获得所有地区

		 $level=$this->db->getLocalityAll();

		 $level=Data::channel($level,'lid','pid',0,0,2,'--');
		 //p($level);exit;
		 $this->assign('level',$level);


     $data=$this->db->getLocalityOne($this->lid);
		 //p($level);exit;
		 $this->assign('data',$data);

		 //获得父栏目
		  $parent=$this->db->getParentLocality($data['pid']);
		  //p($parent);exit;
		  $this->assign('parent',$parent);
    	# code...
    	$this->display();
    	exit;
}   
		 $data=$this->getData();
		 //p($this->lid);
    if($this->db->editLocality($this->lid,$data)){
     	$this->success('编辑地区成功','index');
     }else{
     	throw new Exception("编辑地区失败");
     	
     }

    //  p($data);
    //  echo $this->db->editLocality($this->lid,$data);exit;
  }

/**
 * 删除地区
 */
public function del()
{
	# 验证是否有子地区...
	if($this->db->checkSonLocality($this->lid)){
		$this->error('请先删除子地区','index');
	}
	if($this->db->delLocality($this->lid)){
		$this->success("删除地区成功",'index');
	}else{
		throw new Exception("删除地区失败");
		
	}
}
    /**
     * 过滤post数据
     */
     public function getData()
     {
     	# ...
     	$data=array();
     	$data['lname']=$this->_post('lname','strip_tags');
     	$data['sort']=$this->_post('sort','intval');
     	$data['display']=$this->_post('diaplay','intval');
     	$data['pid']=$this->_post('pid','interval');
     	return $data;
     }


}










 ?>