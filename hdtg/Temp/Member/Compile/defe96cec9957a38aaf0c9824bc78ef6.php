<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<link href="http://localhost/hdtg2/hdtg/App/Member/Tpl/Public/css/userhome.css" type="text/css" rel="stylesheet" >
<script type="text/javascript" src="http://localhost/hdtg2/hdtg/App/Member/Tpl/Public/js/userhome.js"></script>	
<div id="main">
	<div class='left'>
		<ul class='userhome-nav'>
			<li class='active'>
				<a href="<?php echo U('Member/Order/index');?>">团购订单</a>
			</li>
			<li>
				<a href="<?php echo U('Member/Index/collect');?>">我的收藏</a>
			</li>
			<li>
				<a href="">我的评价</a>
			</li>
			<li>
				<a href="">我的成长</a>
			</li>
			<li>
				<a href="">美团余额</a>
			</li>
			<li>
				<a href="">账户设置</a>
			</li>
		</ul>
		<div id="content">
		<link href="http://localhost/hdtg2/hdtg/App/Member/Tpl/Public/css/index.css" type="text/css" rel="stylesheet" >
		<div class='collect-nav'>
			<a href="<?php echo U('Member/Index/collect');?>" class='active'>全部</a>
			<a href="<?php echo U('Member/Index/collect');?>/status/1">进行中的团购</a>
			<a href="<?php echo U('Member/Index/collect');?>/status/2">已结束</a>
		</div>
		<div class='collect-list'>
			<?php if($collect){?>
			<table>
				<thead>
					<tr>
						<th>团购项目</th>
						<th width="10%">金额</th>
						<th width="15%">状态</th>
						<th width="15%">操作</th>
					</tr>
				</thead>
				<tbody>

				<?php if(is_array($collect)):?><?php  foreach($collect as $v){ ?>
					<tr>
						<td class='goods-show'>
							<img src="<?php echo $v['goods_img'];?>">
							<a href=""><?php echo $v['main_title'];?></a>
						</td>
						<td>
							¥<?php echo $v['price'];?>
						</td>
						<td>
							<?php echo $v['status'];?>
						</td>
						<?php if($v['status'] == '已下架'){?>
						<td>
							<a href="<?php echo U('Member/Index/delCollect');?>/gid/<?php echo $v['gid'];?>">删除</a>
						</td>
							<?php  }else{ ?>
							<td>
								<a class='btn' href="<?php echo U('Member/Buy/index');?>/gid/<?php echo $v['gid'];?>">购买</a><a href="<?php echo U('Member/Index/delCollect');?>/gid/<?php echo $v['gid'];?>">删除</a>
							</td>
						<?php }?>
					</tr>
				<?php }?><?php endif;?>

				</tbody>
			</table>
				<?php  }else{ ?>
				没有收藏的商品!
			<?php }?>
		</div>
		
		




















<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>			</div>
		</div>
		<div class='user-status'>
			<h6><span>Hi~</span>_qqcd71349674843</h6>
			<p><span>等级：<span><i></i></p>
			<p><span>积分：<span><strong>0</strong></p>
		</div>
	</div>
</body>
</html>