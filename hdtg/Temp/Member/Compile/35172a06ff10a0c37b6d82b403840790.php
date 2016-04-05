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
					<div  class='user-nav recent-view ' url='<?php echo U("Member/Index/getRecentView");?>' detailUrl='<?php echo U("Index/Detail/index");?>' clearUrl='<?php echo U("Member/Index/clearRecentView");?>'>
						<a class='title' href="">最近浏览</a>
						<ul class="menu">
							
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
	<link href="http://localhost/hdtg2/hdtg/App/Member/Tpl/Public/css/cart.css" type="text/css" rel="stylesheet" >

	<script src="http://localhost/hdtg2/hdtg/App/Member/Tpl/Public/js/cart.js"></script>
	<form action="<?php echo U('Member/Buy/payment');?>" method="post">
	<div id="main">
		<div class='step'>
			<div class='cart-title'>
				<i></i>
				<div>
					<h3>
						我的购物车
					</h3>
					<p>
						<span class='cart-bar-bg'>
							<span></span>
						</span>
						<b>2/20</b>
					</p>
				</div>
			</div>
			<ul>
				<li class='current'>1.查看购物车 </li>
				<li>2.选择支付方式 </li>
				<li>3.购买成功 </li>
			</ul>	
		</div>
		<!-- 购物车列表 -->
		<table class='cart-table' border=0>
			<thead>
				<tr>
					<th width='35%'>项目</th>
					<th width='15%'>状态</th>
					<th width='15%'>类型/数量</th>
					<th width='10%'>单价</th>
					<th width='10%'>小计</th>
					<th width='10%'>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($carts)):?><?php  foreach($carts as $v){ ?>
				<input type="hidden" name="gid[]" value="<?php echo $v['gid'];?>">
				<input type="hidden" name="price[]" value="<?php echo $v['price'];?>">
				<tr>v
					<td class='goods-show'>
						<img src="<?php echo $v['goods_img'];?>">
						<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a>
					</td>
					<td><?php echo $v['status'];?></td>
					<td class='goods-num'>
						<a href="javascript:void(0);" url="<?php echo U('Member/Cart/getAjaxData');?>/gid/<?php echo $v['gid'];?>" gid="<?php echo $v['gid'];?>" class='reduce' id="reduce"></a>
						<input id="num" type="text" value=<?php echo $v['num'];?> class="num" name="goods_num[]">
						<a href="javascript:void(0);" url="<?php echo U('Member/Cart/getAjaxData');?>/gid/<?php echo $v['gid'];?>" gid="<?php echo $v['gid'];?>" class='add' id="add"></a>
					</td>
					<td class="price"><?php echo $v['price'];?></td>
					<td class="xiaoji"><?php echo $v['xiaoji'];?></td>
					<td  class="delCartDatas" ><a href="javascript:void(0);" url="<?php echo U('Member/Cart/delete');?>/gid/<?php echo $v['gid'];?>">删除</a></td>
				</tr>
				<?php }?><?php endif;?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td colspan=3 class='total'>
						应付总额： <strong>¥<span><?php echo $total;?></span></strong> 
					</td>
				</tr>
			</tbody>
		</table>
		<!-- 收货地址列表 -->
		<div class='address-list'>
			<table>
				<thead>
				<tr>
					<th>选择</th>
					<th width="20%">收货人</th>
					<th>地址/邮编</th>
					<th width="20%">电话/手机</th>
					<th width="20%">操作</th>
				</tr>
				</thead>
				<tbody>
				<?php if(is_array($address)):?><?php  foreach($address as $v){ ?>
					<tr>
						<td>
							<input type="radio" checked=true name="addressid" value="<?php echo $v['addressid'];?>">
						</td>
						<td>
							<?php echo $v['consignee'];?>
						</td>
						<td>
							<?php echo $v['province'];?>-<?php echo $v['city'];?>-<?php echo $v['county'];?>-<?php echo $v['street'];?>
						</td>
						<td>
							<?php echo $v['tel'];?>
						</td>
						<td>
							<a href="<?php echo U('Member/Account/delAddress');?>/addressid/<?php echo $v['addressid'];?>">删除</a>
						</td>
					</tr>
				<?php }?><?php endif;?>
				</tbody>
			</table>
		</div>
		<!-- 订单提交 -->
		<div class='bottom'>
			<input type="submit" class='submit' value="提交订单">
		</div>
	</div>
	</form>
</body>
</html>