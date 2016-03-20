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
           if(IS_POST===FALSE){ throw new Exception("非法请求");};
           //echo C('COOKIE_LIFT_TIME');exit;
			$uname=$this->_post('username',"strip_tags");
			$password=$this->_post("password","md5");
           //p($_POST);exit;
			$db=K("Check");
			$where=array("uname"=>$uname,"or","email"=>$uname);
			$userInfo=$db->checkLogin($where);

			if($password==$userInfo['password']){
				//$this->success("登陆成功"，U('Index/Index/index'));
				
               $_SESSION[C('RBAC_AUTH_KEY')]=$userInfo['uid'];

                   if(isset($_POST['auto_login'])){
                      setcookie(session_name(), session_id(), time()+C('COOKIE_LIFT_TIME'), "/");
                                                                            
                       }
                  $this->success("登陆成功",U('Index/Index/index'));
                                                                       
                                                                        
			}else{
			 	$this->error("登陆失败",U('Index/Index/index'));
			}


	}

	/**
	 * 退出的方法
	 */
	
 public function quit()
	{
		session_unset();
		session_destroy();
		setcookie(session_name(),session_id(),1,'/');
		$this->success("退出成功",__ROOT__);
	}
}














?>