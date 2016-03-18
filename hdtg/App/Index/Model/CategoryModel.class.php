<?php 
class CategoryModel extends Model{

	public $table='category';

	/**
	 * 获得顶级栏目方法
	 */
	public function getTopCategory($cid)
	{
		# code...
		return $this->field('cid,cname')->where(array("pid"=>$cid))->order('sort')->select();
	}

	/**
	 * 获得cid的pid
	 */
	 public function getParentId($cid)
	 {
	 	# code...
	 	$result=$this->field('pid')->where(array('cid'=>$cid))->find();
	 	return $result['pid'];
	 }


	 public function getSonCategory($cid)
	 {
	 	# code...
	 	$result=$this->field('cid')->where(array('pid'=>$cid))->select();
	 	if($result){
	 		return $result;
	 	}else{
	 		return array(array('cid'=>$cid));
	 	}
	 }
}



 ?>