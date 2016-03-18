<?php 
class CommonControl extends Control{

	public $db;//数据库连接

	public function __init()
	{
		# code...
		
		if(method_exists($this, '__auto')){
			$this->__auto();
		}

		  $this->setDav();
			
	}

	private function setDav(){
		$db=K('Category');
		$dav=$db->getTopCategory(0);
		$this->assign('dav',$dav);
	}
}



 ?>