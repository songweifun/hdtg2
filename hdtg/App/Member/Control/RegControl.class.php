<?php
class RegControl extends CommonControl{



	public function __auto()
	{
		# code...
	}
	/**
	 * 显示注册界面
	 */
	public function index(){
		$this->display();
	}
	
	/**
	 * 获得验证码的方法
	 */
	public function codeShow()
	{
		# code...
		$code=new Code();
		$code->show();
	}
	
	//ajax验证
	public function chekAjax()
	{
		# code...
		$name=$this->_post('name');
		$value=$this->_post('value');
		

		
// if( $name=='email'){

// 			 $db=K('Check');
// 		   $count=$db->getCount($name,$value);

// 	if($count==1){
// 			$result= array('status'=>false,'msg'=>'该邮箱已经存在');
// 		}else{
// 			$result= array('status'=>true);
// 		}

// 		}else{
// 			if($name='username'){

// 				$db=K('Check');
// 		   $count=$db->getCount($name,$value);

// 	if($count==1){
// 			$result= array('status'=>false,'msg'=>'用户名已经存在');
// 		}else{
// 			$result= array('status'=>true);
// 		}

// 			}else{

// 				if(strtoupper($value)!=$_SESSION['code']){

// 			    $result= array('status'=>false,'msg'=>'验证码输入有误!');
// 		  }else{

// 			     $result= array('status'=>true);

//      }
//   }
      

//   	}

		switch ($name) {
			case 'email':
					$db=K('Check');
          $count=$db->getCount($name,$value);
					if($count==1){
					$result= array('status'=>false,'msg'=>'该邮箱已经存在');
					}else{
					$result= array('status'=>true);
					}
				break;

				case 'uname':
				  $db=K('Check');
          $count=$db->getCount($name,$value);
					if($count==1){
					$result= array('status'=>false,'msg'=>'用户名已经存在');
					}else{
					$result= array('status'=>true);
					}
				break;
				case 'code':
								if(strtoupper($value)!=$_SESSION['code']){
										$result= array('status'=>false,'msg'=>'验证码输入有误!');
										}else{
										
										$result= array('status'=>true);
										
										}
				break;
		}

  	echo json_encode($result);
	
	
	}




	//添加用户
	public function addUser()
	{
		# code...
    $data=$this->getData();
		$db=K('Check');
		if($uid=$db->addUser($data)){
			$_SESSION[C('RBAC_AUTH_KEY')]=$uid;
		$this->success('注册成功',U('Index/Index/index'));
		}else{
			throw new Exception("注册失败");
			
		}
	}




	public function getData()
	{
		# code...
		$data=array();
		$data['email']=$this->_post('email','strip_tags');
		$data['uname']=$this->_post('uname','strip_tags');
		$data['password']=$this->_post('password','md5');
		return $data;

	}
}


?>