<?php

class IndexControl extends Control{

    
    /**
     * 用户收藏
     */
    public function collect(){
    	$this->display();
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