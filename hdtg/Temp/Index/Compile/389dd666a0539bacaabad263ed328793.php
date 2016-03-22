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
							<li><a href="">我的订单</a></li>	
							<li><a href="">我的评价</a></li>
							<li><a href="">我的收藏</a></li>
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
					<div  class='user-nav recent-view '>
						<a class='title' href="">最近浏览</a>
						<ul class="menu">
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<p class='clear'><a href="">清空最近浏览记录</a></p>
						</ul>
					</div>

					<div  class='user-nav my-cart ' url="<?php echo U('Member/Cart/getHoverAjaxData');?>" cartUrl="<?php echo U('Member/Cart/index');?>">
						<a class='title' href="<?php echo U('Member/Cart/index');?>"><i>&nbsp;</i>购物车</a>
						<ul class="menu">
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><a href="">删除</a></span>
								</div>					
							</li>
							
						</ul>
					</div>

			</div>
		</div>
	</div> 
	<!-- 导航结束 -->
	
	<!-- 载入公共头部文件-->
	<!-- 载入商品筛选-->
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!-- 商品过滤开始 -->
	<div id="filter">
		<div class='hots'>
			<span>热门团购：</span>
			<div class='box'>	
				<a href="">电影</a><a href="经济型酒店">经济型酒店</a><a href="自助餐">自助餐</a><a href="KTV">KTV</a><a href="火锅">火锅</a><a href="烧烤烤肉">烧烤烤肉</a><a href="本地/周边游">本地/周边游</a>
			</div>	
		</div>
		
		<div class='filter-box'>
			<div class='category filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>分类：</span>
					<div class='box'>
						<?php if(is_array($topCategory)):?><?php  foreach($topCategory as $k=>$v){ ?>
							<?php echo $v;?>
						<?php }?><?php endif;?>
					</div>
				</div>
				<?php if($sonCategory){?>
				<div class='filter-label-level-2'>
					<?php if(is_array($sonCategory)):?><?php  foreach($sonCategory as $k=>$v){ ?>
						<?php echo $v;?>
					<?php }?><?php endif;?>
				</div>
				<?php }?>
			</div>
			<div class='locality filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>区域：</span>
					<div class='box'>
						<?php if(is_array($topLocality)):?><?php  foreach($topLocality as $k=>$v){ ?>
							<?php echo $v;?>
						<?php }?><?php endif;?>
					</div>
				</div>
				<?php if($sonLocality){?>
				<div class='filter-label-level-2'>
					<?php if(is_array($sonLocality)):?><?php  foreach($sonLocality as $k=>$v){ ?>
						<?php echo $v;?>
					<?php }?><?php endif;?>
				</div>
				<?php }?>
			</div>
			<?php if($price){?>
			<div class='price filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>价格：</span>
					<div class='box'>
						<?php if(is_array($price)):?><?php  foreach($price as $v){ ?>
							<?php echo $v;?>							
						<?php }?><?php endif;?>
					</div>
				</div>
			</div>	
			<?php }?>
			<div class='screen'>
				<div>
					<a class='active' href="<?php echo $orderUrl['d'];?>">默认排序</a>
					<a href="<?php echo $orderUrl['b'];?>">销量<b></b></a>
					<a href="<?php echo $orderUrl['p_d'];?>">价格<b></b></a>
					<a  href="<?php echo $orderUrl['p_a'];?>">价格<b style="background-position:-45px -16px;"></b></a>
					<a style="border:0;" href="<?php echo $orderUrl['t'];?>">发布时间<b></b></a>
				</div>
			</div>
		</div>	
	</div>
	<!-- 商品过滤结束 -->
	<link href="http://localhost/hdtg2/hdtg/App/Index/Tpl/Public/css/index.css" type="text/css" rel="stylesheet" >
	<!-- 页面主体开始 -->
	<div id="main">
		<div class='content'>
		<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
			<div class='item'>
				<div class='cover'>
					<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="<?php echo $v['goods_img'];?>"/></a>
				</div>
				<a class='link' href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>">
					<h3><?php echo $v['main_title'];?></h3>
					<p class='describe'><?php echo $v['sub_title'];?></p>
				</a>
				<p class='detail'>
					<strong><?php echo $v['price'];?></strong>
					<span><del><?php echo $v['old_price'];?></del><span>-</span></span>
					<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"></a>
				</p>
				<p class='total'>
					<strong><?php echo $v['buy'];?></strong>
					人已参与
				</p>
			</div>
			<?php }?><?php endif;?>
			<div class='c'></div>
			<div class='page'>
				<?php echo $page;?>
			</div>
		</div>
		<div class='sidebar'>
			<div class='hot-products'>
				<h3>热卖商品</h3>
				<ul>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class='c'></div>
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>
	<div id="footer">
		<p>本demo不用于任何商业目的，仅供学习与交流</p>
	</div>
	</body>
</html>
</body>
</html>