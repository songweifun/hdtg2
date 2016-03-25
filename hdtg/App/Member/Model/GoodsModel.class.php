<?php 
class GoodsModel extends Model{




	public function getOneGoodData($gid){
		$field=array(
			"gid",
			"price",
			"main_title"
		);
	return $this->field($field)->where(array('gid'=>$gid))->find();




	}
}



 ?>