<?php

class LoginControl extends Control{
    /**
     * 显示登录页
     */
    public function index(){
        $this->display();

    }

    /**
     * 显示验证码
     */
    public function showCode(){

        $code=new Code();
        $code->show();
    }

    /**
     * 验证验证码
     */
    public function checkCode(){
        if(IS_AJAX==false) exit('非法请求');
        //p($_POST);

        $code=$this->_post('code',"strtoupper",null);

        $result=array("status"=>false);
    if($code==$_SESSION['code']){
        $result['status']=true;
    }
        exit(json_encode($result));

    }

    public function login()
    {
        p($_POST);
        $username=$this->_post('username','addslashes',null);
        $password=$this->_post('password','md5');
        $db=M('admin');
        $userInfo=$db->where(array('adminname'=>$username))->find();
        if($password==$userInfo['adminpass']){
            $_SESSION[C('RBAC_SUPER_ADMIN')]=$username;
            $this->success("登录成功",U('Admin/Index/index'));
        }else{

            $this->error("登录失败",U('Admin/Login/index'));
        }
    }

}
?>
