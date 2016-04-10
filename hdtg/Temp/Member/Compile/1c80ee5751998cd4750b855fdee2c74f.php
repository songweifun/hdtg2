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
				<a style="line-height:60px;" href="http://localhost/hdtg2">孟楠团购</a>
				<a style="font-size:16px;" href="http://localhost/hdtg2">www.houdunwang.com</a>
			</div>
			<div class='search'>
				<div class='item'>
					<a href="<?php echo U('Index/Index/index');?>/keywords/小时代">小时代</a>
					<a href="<?php echo U('Index/Index/index');?>/keywords/KTV">KTV</a>
					<a href="<?php echo U('Index/Index/index');?>/keywords/电影">电影</a>
					<a href="<?php echo U('Index/Index/index');?>/keywords/全聚德">全聚德</a>
				</div>
				<div class='search-bar'>
					<form action="<?php echo U('Index/Index/index');?>" method="get">
					<input class='s-text' type="text" name="keywords" value="请输入商品名称，地址等">
					<input class='s-submit' type="submit" value='搜索'>
					</form>
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
				<a class='' href="http://localhost/hdtg2" category="-1">首页</a>

				<?php if(is_array($dav)):?><?php  foreach($dav as $k=>$v){ ?>
				<a href="<?php echo U('Index/Index/index');?>/cid/<?php echo $v['cid'];?>" category="<?php echo $k;?>"><?php echo $v['cname'];?></a>
				<?php }?><?php endif;?>
			</div>
			<!-- 顶级栏目高亮显示 -->
			<script>
					$('#nav .category a').click(function(){
						var category=$(this).attr('category');
						document.cookie="category="+category+';path=/';

					})
					var name="category";
					var category=getCookie(name);

					$('.category a').each(function(){
						if($(this).attr('category') == category){
							$(this).addClass('active');
						}else{
							$(this).removeClass('active');
						}
					})



					function getCookie(name){

						var arr = document.cookie.split(';');
						for(var i=0;i<arr.length;i++){
							var	arr2 = arr[i].split('=');
							var preg = new RegExp('\\b'+name+'\\b','i')
							if(preg.test(arr2[0])){
								return	arr2[1];
							}
						}

					}





			</script>
			<!--
			<script>

				/**
				 * 获取cookie
				 * @param name
				 * @returns
				 */
				function getCookie(name){
					var arr = document.cookie.split(';');
					for(var i=0;i<arr.length;i++){
						var	arr2 = arr[i].split('=');
						var preg = new RegExp('\\b'+name+'\\b','i')
						if(preg.test(arr2[0])){
							return	arr2[1];
						}
					}
				}
				$('.category a').click(function(){
					var category = $(this).attr('category');
					document.cookie = "category="+category+';path=/';
				})
				var category = getCookie('category');
				$('.category a').each(function(){
					if($(this).attr('category') == category){
						$(this).addClass('active');
					}else{
						$(this).removeClass('active');
					}
				})
			</script>
			-->
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
							<li><a href="<?php echo U('Member/Account/growth');?>">我的成长</a></li>
							<li><a href="<?php echo U('Member/Account/index');?>">账户余额</a></li>
							<li><a href="">账户充值</a></li>
							<li><a href="<?php echo U('Member/Account/setting');?>">账户设置</a></li>
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
	
	<!-- 载入公共头部文件-->
	<link href="http://localhost/hdtg2/hdtg/App/Member/Tpl/Public/css/buy.css" type="text/css" rel="stylesheet" >
	<div class='position'>
		<form action="<?php echo U('Member/Buy/checkOrder');?>" method="post">
		<div id="main">
			<div class='step'>
				<ul>
					<li>1.查看购物车 </li>
					<li class='current'>2.选择支付方式 </li>
					<li>3.购买成功 </li>
				</ul>	
			</div>
			<ul class='buy-detail'>
				<?php if(is_array($order)):?><?php  foreach($order as $v){ ?>
					<input type="hidden"name="orderid[]" value="<?php echo $v['orderid'];?>">
				<li>
					<p>
						<span>项目名称：</span>
						<?php echo $v['main_title'];?>
					</p>
					<p>
						<span>商品数量：</span> <?php echo $v['goods_num'];?>
					</p>
				</li>
				<?php }?><?php endif;?>
			</ul>
			<div class='total'>
				<p>总价：<strong><?php echo $sum;?></strong></p>
				<p>账户余额：<strong><?php echo $balance;?></strong></p>
			</div>	
			<!-- 订单提交 -->
			<div class='bottom'>
				<input type="submit" class='submit' value="确认支付">
			</div>
		</div>
		</form>
	</div>	
</body>
</html>