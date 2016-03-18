<?php 
class CommonControl extends Control{
	protected $db;

	public function __init()
	{
		# code...
		if(method_exists($this, '__auto'))
			$this->__auto();
	}

}


 ?>