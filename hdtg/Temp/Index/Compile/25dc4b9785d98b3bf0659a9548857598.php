<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="http://localhost/hdtg2/Public/css/reset.css" type="text/css" rel="stylesheet" >
<link href="http://localhost/hdtg2/Public/css/common.css" type="text/css" rel="stylesheet" >
<script type='text/javascript' src='http://localhost/hdtg2/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<script type="text/javascript" src="http://localhost/hdtg2/Public/js/common.js"></script>
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php echo $webInfo['title'];?></title>

</head>
<body>
	<!-- 顶部开始 -->
	<div id="top">
		<div class='position'>
			<div class='left'>
				后盾网，人人做后盾!
			</div>
			<div class='right'>
				<a href="javascript:addFavorite2();">收藏</a>
			</div>
		</div>
	</div>
	<!-- 顶部结束 -->
	<!-- 头部开始 -->
	<div id="header">
		<div class='position'>
			<div class='logo'>
				<a style="line-height:60px;" href="http://localhost/hdtg2">后盾团购</a>
				<a style="font-size:16px;" href="http://localhost/hdtg2">www.houdunwang.com</a>
			</div>
			<div class='search'>
				<div class='item'>
					<a href="">小时代</a>
					<a href="">KTV</a>
					<a href="">电影</a>
					<a href="">全聚德</a>
				</div>
				<div class='search-bar'>
					<input class='s-text' type="text" name="keywords" value="请输入商品名称，地址等">
					<input class='s-submit' type="submit" value='搜索'>
				</div>
			</div>
			<div class='commitment'>
				
			</div>
		</div>
	</div>
	<!-- 头部结束 -->
	<!-- 导航开始-->
	<div id="nav">
		<div class='position'>
			<!-- 分类相关 -->
			<div class='category'>
				<a class='active' href="http://localhost/hdtg2">首页</a>

				<?php if(is_array($dav)):?><?php  foreach($dav as $v){ ?>
				<a href="<?php echo U('Index/Index/index');?>/cid/<?php echo $v['cid'];?>"><?php echo $v['cname'];?></a>
				<?php }?><?php endif;?>
			</div>
			<!-- 用户相关 -->
			<div id="user-relevance" class='user-relevance'>
                            
<?php if($userLogin){?>
  <!--登录注册-->
					<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Member/Reg/index');?>">注册</a>
					</div>
					<div class='user-nav login-reg'>	
						<a class='title' href="<?php echo U('Member/Login/quit');?>">退出</a>
					</div>
					<!--我的团购 -->	
					<div class='user-nav my-hdtg '>
						<a class='title' href="">我的团购</a>
						<ul class="menu">
							<li><a href="<?php echo U('Member/Order/index');?>">我的订单</a></li>
							<li><a href="">我的评价</a></li>
							<li><a href="<?php echo U('Member/Index/collect');?>">我的收藏</a></li>
							<li><a href="">我的成长</a></li>
							<li><a href="">账户余额</a></li>
							<li><a href="">账户充值</a></li>
							<li><a href="">账户设置</a></li>
						</ul>
					</div>

 <?php  }else{ ?>
   <!--登录注册-->
					<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Member/Reg/index');?>">注册</a>
					</div>
					<div class='user-nav login-reg'>	
						<a class='title' href="<?php echo U('Member/Login/index');?>">登录</a>
					</div>
<?php }?> 
				
				
				
				<!-- 最近浏览 -->	
					<div  class='user-nav recent-view ' url='<?php echo U("Member/Index/getRecentView");?>' detailUrl='<?php echo U("Index/Detail/index");?>' clearUrl='<?php echo U("Member/Index/clearRecentView");?>'>
						<a class='title' href="">最近浏览</a>
						<ul class="menu">
							<p class="clear">最近没有浏览任何商品</p>
						</ul>
					</div>

					<div  class='user-nav my-cart ' url="<?php echo U('Member/Cart/getHoverAjaxData');?>" cartUrl="<?php echo U('Member/Cart/index');?>" delUrl="<?php echo U('Member/Cart/delete');?>">
						<a class='title' href="<?php echo U('Member/Cart/index');?>"><i>&nbsp;</i>购物车</a>
						<ul class="menu">
							
							
						</ul>
					</div>

			</div>
		</div>
	</div> 
	<!-- 导航结束 -->
	
<!-- 载入公共头部文件结束 -->
	<link href="http://localhost/hdtg2/hdtg/App/Index/Tpl/Public/css/detail.css" type="text/css" rel="stylesheet" >
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=FZyqcF0ijadlVPQriZhTYGti"></script>
	<div id="map" class='position'>
		<a href="<?php echo U('Index/Index/index');?>/lid/<?php echo $data['lid'];?>"><?php echo $data['lname'];?></a><span>»</span><a href="<?php echo U('Index/Index/index');?>/cid/<?php echo $data['cid'];?>"><?php echo $data['cname'];?></a><span>»</span><span><?php echo $data['shopname'];?></span>
	</div>
	<div id="content" class='position' style="height:3000px;">
		<div class='content-left'>
			<div class="goods-intro">
				<div class='goods-title'>
					<h1><?php echo $data['main_title'];?></h1>
					<h3><?php echo $data['sub_title'];?></h3>
				</div>
				<div class='deal-intro'>
					<div class='buy-intro'>
						<div class='price'>
							<div class='discount-price'>
								<span>¥</span><?php echo $data['price'];?>
							</div>
							<div class='cost-price'>
								<span class='discount'><?php echo $data['discount'];?>折</span>
								门店价<b>¥<?php echo $data['old_price'];?></b>
							</div>
						</div>
						<div class='deal-buy-cart'>
						<?php if($userLogin){?>
							<a href="<?php echo U('Member/Buy/index');?>/gid/<?php echo $data['gid'];?>" class='buy'></a>
						<?php  }else{ ?>
							<a href="<?php echo U('Member/Login/index');?>/gid/<?php echo $data['gid'];?>" class='buy'></a>
						<?php }?>	
							<a href="javascript:void(0)" url="<?php echo U('Member/Cart/add');?>/gid/<?php echo $data['gid'];?>" id="cartId" class='cart'></a>
						</div>
						<div class='purchased'>
							<p class='people'>
								<span><?php echo $data['buy'];?></span>人已团购
							</p>
							<p class='time'>
								<?php echo $data['end_time'];?>
							</p>
						</div>
						<ul class='refund-intro'>
						<?php if(is_array($data['goods_server'])):?><?php  foreach($data['goods_server'] as $v){ ?>
							<li>
								<?php echo $v['img'];?>
								<span class='text'><?php echo $v['name'];?></span>
							</li>
							<?php }?><?php endif;?>
						</ul>
					</div>
					<div class='image-intro'>
						<img src="<?php echo $data['goods_img'];?>"/>
					</div>
				</div>
				<div class='collect'>
					<a class='collect-link' url="<?php echo U('Member/Index/addCollect');?>/gid/<?php echo $data['gid'];?>" urlto="<?php echo U('Member/Index/collect');?>" id="collectId" href='javascript:void(0);'><i></i>收藏本单</a>
					
					<div class='share'>
						
					</div>
					
				</div>
			</div>
			<div class='detail'>
				<ul class='plot-points'>
					<li class='active'><a href="#shop-site">商家位置</a></li>
					<li><a href="#details">本单详情</a></li>
					<li><a href="#comment">消费评价</a></li>
				</ul>
				<div id="shop-site" class='shop-site'>
					<p class='site-title'>商家位置</p>
					<div class='box'>
						<div id="bMap" class='map'>
							
						</div>
				
						<div class='info'>
							<h3><?php echo $data['shopname'];?></h3>
							<dl>
								<dt>地址:</dt>
								<dd><?php echo $data['shopaddress'];?></dd>
							</dl>
							<dl>
								<dt>地铁:</dt>
								<dd><?php echo $data['metroaddress'];?></dd>
							</dl>
							<dl>
								<dt>电话:</dt>
								<dd><?php echo $data['shoptel'];?></dd>
							</dl>
						</div>
					</div>
				</div>
				<div id="details"  class='details'>
					<?php echo $data['detail'];?>
				</div>
				<div id="comment" class='comment'>
					<div class='comment-list-title'>
						<span>全部评价</span>
						<a class='order-time' href="">按时间<i></i></a>
					</div>
					<div class='comment-list'>
						<div class='list-con'>
							<div class='con-top'>
								<span class='username'>sdas</span>
								<span class='time'>评价于:<em>2013-08-04</em></span>
							</div>
							<p>
								说是香草拿铁不是很苦，结果根本不是想象中的味道！像速溶冲调！还要另加五元？有此一说吗？银座店环境一般！
							</p>
						</div>
						
					</div>
					<div class='comment-page'>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
					</div>
				</div>
			</div>
		
		</div>
		<div class='content-right'>
			<div class='recommend'>
				<h3 class='recommend-title'>
					看过本团购的用户还看了
				</h3>
				<div class='recommend-goods'>
					<a class='goods-image' href="">
						<img alt="图像加载失败.." src="http://p0.meituan.net/200.121/deal/__5738304__3391447.jpg">
					</a>
					<h4>
						<a href="">【五道口】上岛咖啡：双人下午茶套餐，美味齐分享</a>
					</h4>
					<p>
						<strong>¥39.8</strong>
						<span class='cost-price'>门店价<del>144</del></span>
						<span class='num'>
							<span>173</span>
							 人已团购
						</span>
					</p>
				</div>
			</div>
		</div>
		
		
		
	</div>		


<!-- 百度地图 -->

		<script type="text/javascript">
						var point=<?php echo $data['shopcoord'];?>;
						//alert(point);
						//alert(point.lng);
						// 百度地图API功能
						var map = new BMap.Map("bMap");    // 创建Map实例
						map.centerAndZoom(new BMap.Point(point.lng, point.lat), 15);  // 初始化地图,设置中心点坐标和地图级别
						map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
						map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
						map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放


					
						// map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL})); //右上角，仅包含平移和缩放按钮


							var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
							var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
							var top_right_navigation = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL}); //右上角，仅包含平移和缩放按钮
							/*缩放控件type有四种类型:
							BMAP_NAVIGATION_CONTROL_SMALL：仅包含平移和缩放按钮；BMAP_NAVIGATION_CONTROL_PAN:仅包含平移按钮；BMAP_NAVIGATION_CONTROL_ZOOM：仅包含缩放按钮*/
							
							//添加控件和比例尺
							function add_control(){
							map.addControl(top_left_control);        
							map.addControl(top_left_navigation);     
							//map.addControl(top_right_navigation);    
	        }

          add_control();

					var marker = new BMap.Marker(point);  // 创建标注
					map.addOverlay(marker);               // 将标注添加到地图中
					marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

			</script>


<!-- 购物车模板 -->
</div>
	<div class="c"></div>
	<div id="cover"></div>
	<div id="infoWindow">
		
	</div>

<script src="http://localhost/hdtg2/hdtg/App/Index/Tpl/Public/js/detail.js"></script>
	<script>
		var cartSucc = "<div class='colse'><a href='javascript:hideInfoWindow();'></a></div>\
			<ul class='status'>\
			<li class='ico'></li>\
			<li class='msg'>\
				<h3>添加成功!</h3>\
				<p>购物车内共有<span id='total'></span>种商品</p>\
			</li>\
		</ul>\
		<div class='goBtn'>\
			<a href='javascript:hideInfoWindow();'>继续浏览</a>\
			<a href='<?php echo U('Member/Cart/index');?>'>查看购物车</a>\
		</div>";
		var collectSucc = "<div class='colse'><a href='javascript:hideInfoWindow();'></a></div>\
			<ul class='status'>\
			<li class='ico'></li>\
			<li class='msg'>\
				<h3>收藏成功!</h3>\
			</li>\
		</ul>\
		<div class='goBtn'>\
			<a href='javascript:hideInfoWindow();'>继续浏览</a>\
			<a href='<?php echo U('Member/Index/collect');?>'>查看我的收藏</a>\
		</div>";
		var userIsLogin = false;
		<?php if($userIsLogin){?>
			userIsLogin = true;
		<?php }?>
	</script>







<!-- 载入公共头部文件开始 --> 
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>
	<div id="footer">
		<p>本demo不用于任何商业目的，仅供学习与交流</p>
	</div>
	</body>
</html>
<!-- 载入公共头部文件结束 -->