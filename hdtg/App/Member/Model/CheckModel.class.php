<?php 
class CheckModel extends Model{

public $table='user';


public function getCount($name,$value)
{
	# code...
	return $this->where(array($name=>$value))->count();

}
//添加用户
public function addUser($data)
{
	# code...
	return $this->add($data);
;}

}



 ?>