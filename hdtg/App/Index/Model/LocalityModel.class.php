<?php 
class LocalityModel extends Model{

	public $table='locality';

	public function getLocalityLevel($lid)		
	{
		# code...
		return $this->field('lid,lname')->where(array('pid'=>$lid))->order('sort')->select();
	}

//获得父id
	public function getParentId($lid)
	{
		# code...
		$result=$this->field('pid')->where(array('lid'=>$lid))->find();
		return $result['pid'];
	}

	/**
	 * 获得子栏目id
	 */
	public function getSonLocality($lid)
	 {
	 	# code...
	 	$result=$this->field('lid')->where(array('pid'=>$lid))->select();
	 	if($result){
	 		return $result;
	 	}else{
	 		return array(array('lid'=>$lid));
	 	}
	 }
}



 ?>