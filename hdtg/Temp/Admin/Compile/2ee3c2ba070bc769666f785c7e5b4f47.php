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

<div id="map">
	<span class='title'>商品列表</span>
</div>
<div id="content">
	<table id="table" class='table table-striped table-bordered'>
		<thead>
			<tr >
				<th >订单标题</th>
				<th width="20%">商品价格</th>
				<th width="10%">商品数量</th>
				<th width="10%">商品总价</th>
				<th width="10%">用户</th>


				<th >操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($orders)):?><?php  foreach($orders as $k=>$v){ ?>
			<tr  class="">
				<td><?php echo $v['main_title'];?></td>
				<td><?php echo $v['price'];?></td>
				<td><?php echo $v['goods_num'];?></td>
				<td><?php echo $v['total_money'];?></td>
				<td><?php echo $v['uname'];?></td>



				<td>

					<a class='btn btn-small delAffirm' href="<?php echo U('Admin/Order/del');?>/orderid/<?php echo $v['orderid'];?>">删除</a>
				</td>
			</tr>
		<?php }?><?php endif;?>	
		</tbody>
	</table>
</div>

<div id="page">
	<?php echo $page;?>
</div>
</body>
</html>