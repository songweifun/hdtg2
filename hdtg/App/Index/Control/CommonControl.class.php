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
		  //分配是否登陆变量
		  $this->assign("userLogin",isset($_SESSION[C('RBAC_AUTH_KEY')]));
			
	}
/**
 * 获得等级栏目
 */
	private function setDav(){
		$db=K('Category');
		$dav=$db->getTopCategory(0);
		$this->assign('dav',$dav);
	}
}



 ?>