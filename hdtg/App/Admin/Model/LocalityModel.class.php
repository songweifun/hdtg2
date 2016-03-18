<?php
class LocalityModel extends Model{
//模型操作表
	public $table='locality';



public function getLocalityAll()
{
	# 获得所有地区函数...
	
	return $this->select();
}

public function addLocality($data)
{
	# 插入数据库函数...
	return $this->add($data);
}

public function getParentLocality($lid)
{
	# code...
	$result=$this->field('lname,lid')->where(array("lid"=>$lid))->find();
	return $result?$result:array("lname"=>"顶级地区","lid"=>0);
}


/**
 * 获得编辑的内容
 */
public function getLocalityOne($lid)
{
	# code...
	return $this->where(array("lid"=>$lid))->find();
}


/**
 * 编辑栏目数据库
 */
public function editLocality($lid,$data)
{
	# code...
	$this->where(array("lid"=>$lid))->save($data);
	return $this->getAffectedRows();
}


public function checkSonLocality($lid)
{
	# code...
	return $this->where(array("pid"=>$lid))->count();
}


public function delLocality($lid)
{
	# code...
	return $this->where(array("lid"=>$lid))->del();
}

}

 ?>