<?php

class IndexControl extends CommonControl{

    
    /**
     * 用户收藏
     */
    public function collect(){

		if(!$this->uid) $this->error("登陆后才能查看收藏商品",U('Member/Login/index'));
		$db=K('User');
		$status=$this->_get("status",'intval',null);
		switch($status){
			case null:
				$where=array("uid"=>$this->uid);
				break;
			case 1:
				$where=array("uid"=>$this->uid , "end_time>".time());
				//echo 1111111111111111111111111111;
				break;
			case 2:
				$where=array("uid"=>$this->uid ,"end_time<".time());
				//echo 222222222222222222222222222;
				break;
		}



		$data=$db->getCollectData($where);
		$data=$this->disData($data);
		//p($data);exit;
		$this->assign("collect",$data);
    	$this->display();
    }

	/**
	 * 删除收藏的数据
	 */
	public function delCollect(){

		$gid=$this->_get('gid','intval',null);

		$db=K('User');
		if($db->delCollect($this->uid,$gid)){
			$this->success('删除成功',U('Member/Index/collect'));
		}else{

			$this->error('删除失败',U('Member/Index/collect'));
		}
	}

	/**
	 * 处理查询数据
	 */
	public function disData($data){

		if(!$data) return;
		foreach($data as $k=>$v) {

			$data[$k]['status'] = ($v['end_time']>time())?"进行中":"已下架";
			$pathInfo = pathinfo($v['goods_img']);
			$data[$k]['goods_img'] = __ROOT__ . '/' . $pathInfo['dirname'] . '/' . $pathInfo['filename'] . "_92x54." . $pathInfo['extension'];
		}
		return $data;


	}

	/**
	 * 通过ajax收藏商品
	 */
	public function addCollect(){
	if(IS_AJAX===false) return;
		$result=array();
		$gid=$this->_get('gid','intval',null);
		$db=K('User');
		$data=array();
		$data['user_id']=$this->uid;
		$data['goods_id']=$gid;
		if($db->addCollect($data)){

			$result=array("status"=>true);
		}else{

			$result=array("status"=>false);

		}

		exit(json_encode($result));

	}
    
    /**
     * 最近浏览
     * 
     */
    
    public function getRecentView(){
    	$key=encrypt('recent-view');
    	$result=array();
    	if(isset($_COOKIE[$key])){
    	$value=unserialize(decrypt($_COOKIE[$key]));
    	$db=K('cart');
    	$where=$value;
    	$data=$db->getResentViewData($where);
    	
    	$data=$this->disGoodsData($data);
    	//p($data);exit;
    	$result['data']=$data;
    	$result['status']=true;
    }else{

    	$result['data']="最近没有浏览任何商品";
    	$result['status']=false;
    }
 		
    exit(json_encode($result));

    }


/**
 * 对从数据所查数据进行处理
 * @Author   FSW<keepfun.com>
 * @DateTime 2016-03-22T13:57:25+0800
 * @param    [type]                   $data [description]
 * @return   [type]                         [description]
 */
	public function disGoodsData($data){
		foreach ($data as $key => $value) {
			# code...
		$pathInfo=pathinfo($value['goods_img']);
        $data[$key]['goods_img']=__ROOT__.'/'. $pathInfo['dirname'].'/'.$pathInfo['filename']."_92x54.".$pathInfo['extension'];
        $data[$key]['status']=$value['end_time']<time()?"已下架":"可以购买";
		}
		
        return $data;

	}
/**
 * 删除最近浏览记录
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-24T14:00:38+0800
 * @return   [type]                   [description]
 */
	public function clearRecentView(){

		$key=encrypt('recent-view');
		//($_COOKIE['$key']);
		setcookie($key,encrypt(serialize(array())),1,'/');
		$result['status']=true;
		exit(json_encode($result));

	}
}
?>