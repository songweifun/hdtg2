<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<script type='text/javascript' src='http://localhost/hdtg2/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/hdtg2/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdtg2/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdtg2/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdtg2/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]-->
<script type="text/javascript" src="http://localhost/hdtg2/hdtg/App/Admin/Tpl/Public/js/common.js"> </script>
<link href="http://localhost/hdtg2/hdtg/App/Admin/Tpl/Public/css/common.css" rel="stylesheet" type="text/css" />
</head>
<body>
<link href="http://localhost/hdtg2/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdtg2/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
<script type="text/javascript" src="http://localhost/hdtg2/hdtg/App/Admin/Tpl/Public/js/shop.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=FZyqcF0ijadlVPQriZhTYGti"></script>
<div id="map">
	<span class='title'>添加商铺</span>
</div>
<div id="content">
	<form id="ShopForm" action="<?php echo U('Admin/Shop/edit');?>/shopid/<?php echo $data['shopid'];?>" method="post">
	<table class='table table-striped table-bordered'>
		<thead>
			<tr>
				<th width="20%">名称</th>
				<th>值</th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td>商铺名称</td>
				<td>
					<input type="text" name="shopname" value="<?php echo $data['shopname'];?>" />
				</td>
			</tr>

			<tr>
				<td>商铺地址</td>
				<td>
					<input name="shopaddress" type="text" id="shopaddress" value="<?php echo $data['shopaddress'];?>" />
				</td>
			</tr>
			<tr>
				<td>地铁地址</td>
				<td>
					<input name="metroaddress" type="text"  value="<?php echo $data['metroaddress'];?>" />
				</td>
			</tr>

			<tr>
				<td>商铺电话</td>
				<td>
					<input name="shoptel" type="text"  value="<?php echo $data['shoptel'];?>" />
				</td>
			</tr>

			<tr>
				<td>商铺坐标</td>
				<td>
					<input name="shopcoord" type="text" id="shopcoord" />
					<input type="button" class='btn' value="点击获得坐标" id="shopcoordbtn" />
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" class='btn' /></td>
			</tr>
		</tbody>
	</table>
	</form>
	
	
	
</div>
</body>
</html>