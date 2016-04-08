<?php
/**
 *	首页控制器 
 */
class IndexControl extends CommonControl{

		private $cid;
		private $lid;
		private $price;
		private $url;
    private $order;

		public function __auto()
		{
			# code...
						$this->cid=$this->_get('cid','intval',null);
						$this->lid=$this->_get('lid','intval',null);
						$this->price=$this->_get('price','',null);
            $this->order=$this->_get('order',null);
						//配置url
						if(strlen(U('Index/Index/index'))>strlen(__URL__)){
							$this->url=U('Index/Index/index');
						}else{

							//$this->url= preg_replace('/\?keywords=/i','/keywords/',__URL__);
							$this->url=$this->unsetParam('keywords',__URL__);
							$this->url=url_param_remove('keywords',$this->url);


						}

						//$this->db=K('Goods');
						// $data=$this->db->getGoodsAll();
						// p($data);

		}
//网上搜索的自定义去除参数函数
	/**
	 * remove param from url
	 * ?param =    NULL
	 * ?param =&   &
	 * &param =    NULL
	 * &param =&   &
	 * =param =    NULL
	 * =param =&   &
	 * @return string
	 */
	function unsetParam($param, $url) {
		return preg_replace(
				array("/{$param}=[^&]*/i", '/[&]+/', '/\?[&]+/', '/[?&]+$/',),
				array(''               , '&'     , '?'       , ''        ,),
				$url
		);
	}

    function index(){
		//p($_GET['keywords']);
		echo session_save_path();
			echo 111111111111;
			$this->setCategory();
			$this->setLocality();
			$this->setPrice();
      $this->setOrder();
      $this->db=K('Goods');
		if(!isset($_GET['keywords'])) {
			$this->setCategoryWhere($this->cid);
			$this->setLocalityWhere($this->lid);
			$this->setPriceWhere($this->price);

		}else{

			$this->db->keywords=$_GET['keywords'];
		}
		$this->setOrderWhere($this->order);
      $total=$this->db->getGoodsTotal();
      $page=new page($total,10);// 传入总记录数，用于计算出分页数

      $data=$this->db->getGoodsAll($page->limit());
      $this->assign('page',$page->show());
      $data=$this->setAssignData($data);
      $this->assign('data',$data);
      //p($data);
		$this->getHotGoods();//热门商品
		$this->getHotGroups();//热门团购

			$this->display();
    }

/**
 * 设置分配数据
 */
public function setAssignData($data)
{
  # code...
  if(isset($data)){
  foreach($data as $key=>$v){
    $pathInfo=pathinfo($v['goods_img']);
   
    $data[$key]['goods_img']=__ROOT__.'/'. $pathInfo['dirname'].'/'.$pathInfo['filename']."_310x190.".$pathInfo['extension'];
     //p($v['goods_img']);exit;
    $data[$key]['sub_title']=mb_substr($v['sub_title'], 0,30,'utf8');
  }
  //p($data);exit;
  return $data;
}
}

/**
 * 设置分类函数
 */

private function setCategory()
{
	# code...
	//设置分类
    	p($this->cid);
    	$this->db=K('Category');

    	//当直接登录主页或者没传参数cid时
    if($this->cid==null){
    	$topCategory=$this->db->getTopCategory(0);
    	//p($topCategory);
      //作何分配数据
      $url=url_param_remove('cid',$this->url);
      //p($url);
      $topArr=array();
      $topArr[]="<a class='active' href='".$url."'>"."全部"."</a>";
      foreach ($topCategory as $k => $v) {
      	# code...
      	$topArr[]="<a href='".$url."/cid/".$v['cid']."'>".$v['cname']."</a>";
      }
     //p($topArr);
       $this->assign('topCategory',$topArr);
    }else{
        /**
         * 通过pid来判断
         * 1，顶级栏目
         * 2,非顶级栏目
         */
        $pid=$this->db->getParentId($this->cid);
        //获得顶级栏目数据
        $topCategory=$this->db->getTopCategory(0);
				//作何分配数据
				$url=url_param_remove('cid',$this->url);
				//p($url);
				$topArr=array();
				$topArr[]="<a href='".$url."'>"."全部"."</a>";
        //当为顶级栏目时
        if($pid==0){
						
						foreach ($topCategory as $k => $v) {
						# code...
							if($v['cid']==$this->cid){
						  $topArr[]="<a class='active' href='".$url."/cid/".$v['cid']."'>".$v['cname']."</a>";
						   }else{
                   $topArr[]="<a href='".$url."/cid/".$v['cid']."'>".$v['cname']."</a>";
						   }
						  }


									

				}else{
             //当不为顶级栏目
							foreach ($topCategory as $k => $v) {
						# code...
							if($pid==$v['cid']){
						  $topArr[]="<a class='active' href='".$url."/cid/".$v['cid']."'>".$v['cname']."</a>";
						   }else{
                   $topArr[]="<a href='".$url."/cid/".$v['cid']."'>".$v['cname']."</a>";
						   }
             }

						}
						//p($topArr);
						$this->assign('topCategory',$topArr);

    				//显示子类
						if($pid==0){

							    $sonCategory=$this->db->getTopCategory($this->cid);
									//作何分配数据
									$url=url_param_remove('cid',$this->url);
									$sonArr=array();
									$sonArr[]="<a class='active' href='".$url."/cid/".$this->cid."'>"."全部"."</a>";
									foreach ($sonCategory as $k => $v) {
									# code...
									$sonArr[]="<a href='".$url."/cid/".$v['cid']."'>".$v['cname']."</a>";
									}
									//p($topArr);
									

						}else{

									$sonCategory=$this->db->getTopCategory($pid);
									//作何分配数据
									$url=url_param_remove('cid',$this->url);
									$sonArr=array();
									$sonArr[]="<a  href='".$url."/cid/".$pid."'>"."全部"."</a>";
									foreach ($sonCategory as $k => $v) {
										if($v['cid']==$this->cid){
									# code...
									$sonArr[]="<a class='active' href='".$url."/cid/".$v['cid']."'>".$v['cname']."</a>";
									 }else{
									 	$sonArr[]="<a href='".$url."/cid/".$v['cid']."'>".$v['cname']."</a>";
									 }
									}

						}

						$this->assign('sonCategory',$sonArr);

        }

}

/**
 * 设置地区函数
 */

private function setLocality($value='')
{
	# code...
	//地区操作
        $this->db=K('Locality');
        if(is_null($this->lid)){
        	$locality=$this->db->getLocalityLevel(0);
        	$url=url_param_remove('lid',$this->url);
        	//p($locality);
        	$tmpArr=array();
        	$tmpArr[]="<a class='active' href='".$url."'>"."全部"."</a>";
        	foreach ($locality as $k => $v) {
        		# code...
        		$tmpArr[]="<a href='".$url."/lid/".$v['lid']."'>".$v['lname']."</a>";
        	}
        	$this->assign('topLocality',$tmpArr);
        }else{
          $pid=$this->db->getParentId($this->lid);

          $locality=$this->db->getLocalityLevel(0);
        	$url=url_param_remove('lid',$this->url);
        	$tmpArr=array();
        	$tmpArr[]="<a href='".$url."'>"."全部"."</a>";
        	foreach ($locality as $k => $v) {
        		if($v['lid']==$this->lid || $pid==$v['lid']){
        		# code...
        		   $tmpArr[]="<a class='active' href='".$url."/lid/".$v['lid']."'>".$v['lname']."</a>";
        	   }else{
        		   $tmpArr[]="<a  href='".$url."/lid/".$v['lid']."'>".$v['lname']."</a>";

        	   }
        	}
        	  $this->assign('topLocality',$tmpArr);

        	  

        	  if($pid==0){
        	  	$locality=$this->db->getLocalityLevel($this->lid);
        	  	$url=url_param_remove('lid',$this->url);
        	  	$tmpArr=array();
        	  	$tmpArr[]="<a  class='active' href='".$url."/lid/".$this->lid."'>"."全部"."</a>";
        	  	if(isset($locality)){
        	  	foreach ($locality as $k => $v) {
        		    # code...
        		   $tmpArr[]="<a href='".$url."/lid/".$v['lid']."'>".$v['lname']."</a>";
        		   }
        		  }
        	   }else{
                
              $locality=$this->db->getLocalityLevel($pid);
        	  	$url=url_param_remove('lid',$this->url);
        	  	$tmpArr=array();
        	  	$tmpArr[]="<a href='".$url."/lid/".$pid."'>"."全部"."</a>";
        	  	foreach ($locality as $k => $v) {
        		    # code...
        		      if($v['lid']==$this->lid){
        		   $tmpArr[]="<a  class='active' href='".$url."/lid/".$v['lid']."'>".$v['lname']."</a>";
        		     }else{
        		     	$tmpArr[]="<a href='".$url."/lid/".$v['lid']."'>".$v['lname']."</a>";
        		     }
        		   }

        	   }

        	   $this->assign('sonLocality',	$tmpArr);



        }
}


/**
 * 设置价格区间函数
 */
    private function setPrice()
    {
    	# code...
    	$key=0;
    	if(is_null($this->cid)){
          $key='all';
    	}else{
    		$this->db=K('Category');
    		$pid=$this->db->getParentId($this->cid);
    		$key=$pid?$pid:$this->cid;
    	}

    	$pricearr=C('price');
    	$price=$pricearr[$key];
    	//p($price);
    	$url=url_param_remove('price',$this->url);
    	$temArr=array();

    	if(is_null($this->price)){
    		$tempArr[]="<a class='active' href='".$url."'>"."全部"."</a>";
    		foreach ($price as $k => $v) {
    			$tempArr[]="<a  href='".$url."/price/".$v[1]."'>".$v[0]."</a>";
    			# code...
    		}

    	}else{
           
         $tempArr[]="<a href='".$url."'>"."全部"."</a>";
    		 foreach ($price as $k => $v) {
    		 	if($this->price==$v[1]){
    			$tempArr[]="<a class='active' href='".$url."/price/".$v[1]."'>".$v[0]."</a>";
    		}else{

    			$tempArr[]="<a  href='".$url."/price/".$v[1]."'>".$v[0]."</a>";
    		}
    			# code...
    		}
    		

    	}

    	$this->assign('price',$tempArr);

    }


   /**
    * 设置分类查询条件
    */
    public function setCategoryWhere($cid)
    {
    	# code...
    	//$this->db=K('Goods');
    	if(!is_null($cid)){
    	$db=K('Category');
    	$result=$db->getSonCategory($cid);
    	$tempArr=array();
    	foreach ($result as $k => $v) {
    		$tempArr['goods.cid'][]=$v['cid'];
    		# code...
    	}
    	 //p($tempArr);
    	 
    	 $this->db->cids=$tempArr;
    }
  }
  /**
   * 设置地区查询条件
   */

  public function setLocalityWhere($lid)
    {
    	# code...
    	//$this->db=K('Goods');
    	if(!is_null($lid)){
    	$db=K('Locality');
    	$result=$db->getSonLocality($lid);
    	$tempArr=array();
    	foreach ($result as $k => $v) {
    		$tempArr['goods.lid'][]=$v['lid'];
    		# code...
    	}
    	 //p($tempArr);
    	 
    	 $this->db->lids=$tempArr;
    }
  }

  public function setPriceWhere($price){
  	if(!is_null($price)){
  		$arr=explode('-',$price);
  		$strprice=null;
  		if(isset($arr[1])){
        $strprice="price>".$arr[0]." and price<".$arr[1];
  		}else{
  			$strprice="price>".$arr[0];
  		}
  		$this->db->strprice=$strprice;
  		echo $strprice;



  	}

  }

/**
 * 设置排序
 */
  public function setOrder()
  {
    # code...
    $url=url_param_remove('order',$this->url);
    $orderUrl=array();
    $orderUrl['d']=$url.'/order/'.'begin_time-d';
    $orderUrl['b']=$url.'/order/'.'buy-d';
    $orderUrl['p_d']=$url.'/order/'.'price-d';
    $orderUrl['p_a']=$url.'/order/'.'price-a';
    $orderUrl['t']=$url.'/order/'.'begin_time-d';
    //p($orderUrl);exit;
    $this->assign('orderUrl',$orderUrl);
  }

/**
 * 设置排序查询条件
 */

public function setOrderWhere($order)
{
  # code...
  if(!is_null($order)){
    $arr=explode('-',$order);
    if($arr[1]=='d'){
      $order=$arr[0]." desc";
    }else{
      $order=$arr[0]." asc";
    }
  }else{
    $order="begin_time desc";
  }
  $this->db->strorder=$order;

}


	/**
	 * 获得热卖商品
	 */

	public function getHotGoods(){
		$hotgoods=$this->db->getHotGoods();
		$data=array();
		foreach ($hotgoods as $key => $value) {
			# code...
			$data[$key+1]=$value;
			$pathInfo=pathinfo($value['goods_img']);
			$data[$key+1]['goods_img']=__ROOT__.'/'. $pathInfo['dirname'].'/'.$pathInfo['filename']."_200x100.".$pathInfo['extension'];
		}

		$this->assign("hotgoods",$data);
	}


	/**
	 * 获得热门团购
	 */

	public function getHotGroups()
	{
		$this->db=K('Goods');
		$hotgroups=$this->db->getHotGroups();
		$this->assign("hotgroups",$hotgroups);

	}


}
?>