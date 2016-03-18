<?php
class CategoryModel extends Model{
	//默认操作的表
	public $table = 'category';
	/**
	 * 获得所有分类的数据
	 */
	public function getCategoryAll(){
		return $this->select();
	}

	public function addCategory($data){
		return $this->add($data);

	}
	
	public function getParentCategory($cid){
		$result=$this->field("cname,cid")->where(array("cid"=>$cid))->find();
		if($result){
			return $result;
		}else{
			return array(
          "cid"=>0,
          "cname"=>"顶级栏目"
				);
		}
	}
	
	public function getAllData($cid){
		return $this->where(array("cid"=>$cid))->find();
	}
	
	public function getParentCategorys($cid){

					$result=$this->where(array("cid"=>$cid))->find();
					$pid=$result['pid'];
				if($pid){
					return $this->field("cid,cname")->where(array("cid"=>$pid))->find();
				}else{
		return array(
       "cid"=>0,
       "cname"=>"顶级栏目"
			);
	}

	}


	public function editCategory($data,$cid){
		$this->where(array("cid"=>$cid))->save($data);
		return $this->getAffectedRows();
	}
	

 public function checkSonCategory($cid){
	return $this->where(array("pid"=>$cid))->count();
}

public function delCategory($cid){
	return $this->where(array("cid"=>$cid))->del();
}



}







?>