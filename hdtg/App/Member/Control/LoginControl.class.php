<?php
class LoginControl extends Control{
	/**
	 * 显示登录界面
	 */	
	public function index(){
		$this->display();
	}
	
	/**
	 * 登陆方法
	 */
	public function login(){
		if(IS_POST){

			$uname=$this->_post('username',"strip_tags");
			$password=$this->_post("password","md5");
			$db=K("Check");
			$where=array("uname"=>$uname,"or","email"=>$uname);
			$userInfo=$db->checkLogin($where);

			if($password==$userInfo['password']){
				//$this->success("登陆成功"，U('Index/Index/index'));
				$this->success("登陆成功",U('Index/Index/index'));
			}else{
			 	$this->error("登陆失败",U('Index/Index/index'));
			}

		}else{
			throw new Exception("非法请求");
			
		}
	}
	
	
}














?>