<?php 
class CommonControl extends Control{
	protected $db;

	public function __init()
	{
		# code...
		if(method_exists($this, '__auto'))
			$this->__auto();

		//分配是否登陆变量
		  $this->assign("userLogin",isset($_SESSION[C('RBAC_AUTH_KEY')]));
		  //$this->assign("hahaha","aaaaaaaaaaaaaaaaaaaaa");
		  $this->setDav();

	}

/**
 * 顶级标题
 * @Author   FSW<keepfun.com>
 * @DateTime 2016-03-22T22:08:51+0800
 */
	private function setDav(){
		$db=K('Category');
		$dav=$db->getTopCategory(0);
		$this->assign('dav',$dav);
	}

}


 ?>