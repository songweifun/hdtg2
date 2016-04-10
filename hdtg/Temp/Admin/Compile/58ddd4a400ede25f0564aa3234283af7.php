<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>
<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<link href="http://localhost/hdtg2/hdphp/Extend/Org/JqueryUi/css/flick/jquery-ui-1.10.3.custom.css" rel="stylesheet"><script src="http://localhost/hdtg2/hdphp/Extend/Org/JqueryUi/js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="http://localhost/hdtg2/hdtg/App/Admin/Tpl/Public/js/goods.js"></script>

<div id="map">
	<span class='title'>编辑商品</span>
</div>
<div id="content">
	<form id="GoodsForm" action="<?php echo U('Admin/Goods/edit');?>/gid/<?php echo $data['gid'];?>" method="post">
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
					<input type="hidden" name="shopid" value="<?php echo $data['shopid'];?>"/>
					<?php echo $data['shopname'];?>
				</td>
			</tr>

			<tr>
				<td>分类名称</td>
				<td>
					<select name="cid" id="">
					<option value="<?php echo $data['cid'];?>"><?php echo $data['cname'];?></option>
					<?php if(is_array($Category)):?><?php  foreach($Category as $v){ ?>
						<option value="<?php echo $v['cid'];?>">|-<?php echo $v['html'];?><?php echo $v['cname'];?></option>
					<?php }?><?php endif;?>
					</select>
				</td>
			</tr>
			<tr>
				<td>所在地区</td>
				<td>
					<select name="lid" id="">
					<option value="<?php echo $data['lid'];?>"><?php echo $data['lname'];?></option>
					<?php if(is_array($Locality)):?><?php  foreach($Locality as $v){ ?>
						<option value="<?php echo $v['lid'];?>">|-<?php echo $v['html'];?><?php echo $v['lname'];?></option>
					<?php }?><?php endif;?>
					</select>
				</td>
			</tr>

			<tr>
				<td>商品主标题</td>
				<td>
					<input name="main_title" type="text" value="<?php echo $data['main_title'];?>"/>
				</td>
			</tr>

			<tr>
				<td>商品副标题</td>
				<td>
					<input name="sub_title" type="text" value="<?php echo $data['sub_title'];?>"/>
				</td>
			</tr>

			<tr>
				<td>现价</td>
				<td>
					<input name="price" type="text" value="<?php echo $data['price'];?>"/>
				</td>
			</tr>


			<tr>
				<td>原价</td>
				<td>
					<input name="old_price" type="text" value="<?php echo $data['old_price'];?>"/>
				</td>
			</tr>

			<tr>
				<td>上架时间</td>
				<td>
					<input id="begin_time" name="begin_time" type="text" value="<?php echo date('Y-m-d',$data['begin_time']);?>"/>
				</td>
			</tr>


			<tr>
				<td>下架时间</td>
				<td>
					<input id="end_time" name="end_time" type="text" value="<?php echo date('Y-m-d',$data['begin_time']);?>"/>
				</td>
			</tr>

			<tr>
				<td>商品展示图</td>
				<td>
          <link rel="stylesheet" type="text/css" href="http://localhost/hdtg2/hdphp/Extend/Org/Uploadify/uploadify.css" />
            <script type="text/javascript" src="http://localhost/hdtg2/hdphp/Extend/Org/Uploadify/jquery.uploadify.min.js"></script>
            <script type="text/javascript">
            var HDPHP_CONTROL         = "http://localhost/hdtg2/index.php/Admin/Goods";
            var UPLOADIFY_URL    = "http://localhost/hdtg2/hdphp/Extend/Org/Uploadify/";
            var HDPHP_UPLOAD_THUMB    ="460,280,200,100,300,185,90,55";
HDPHP_UPLOAD_TOTAL = 0</script>
            <script type="text/javascript" src="http://localhost/hdtg2/hdphp/Extend/Org/Uploadify/hd_uploadify.js"></script>
<script type="text/javascript">
    $(function() {
        hd_uploadify_options.removeTimeout  =0;
        hd_uploadify_options.fileSizeLimit  ="2MB";
        hd_uploadify_options.fileTypeExts   ="*.jpg;*.png;*.gif";
        hd_uploadify_options.queueID        ="hd_uploadify_goods_img_queue";
        hd_uploadify_options.showalt        =true;
        hd_uploadify_options.uploadLimit    =1;
        hd_uploadify_options.success_msg    ="正在上传...";//上传成功提示文字
        hd_uploadify_options.formData       ={image : "1", someOtherKey:1,hdsid:"obrupadj6d9noqdr8o4v9kdqd1",upload_dir:"",hdphp_upload_thumb:"460,280,200,100,300,185,90,55"};
        hd_uploadify_options.thumb_width          =200;
        hd_uploadify_options.thumb_height          =150;
        hd_uploadify_options.uploadsSuccessNums = 0;

        $("#hd_uploadify_goods_img").uploadify(hd_uploadify_options);
        });
</script>
<input type="file" name="up" id="hd_uploadify_goods_img"/>
<div tool="hd_uploadify_goods_img_msg uploadify_upload_msg">
</div>
<div id="hd_uploadify_goods_img_queue"></div>
<div class="hd_uploadify_goods_img_files uploadify_upload_files" input_file_id ="hd_uploadify_goods_img">
    <ul></ul>
    <div style="clear:both;"></div>
</div>
          <img width="200" src="http://localhost/hdtg2/<?php echo $data['goods_img'];?>" alt=""/>
          <input type="hidden" name='old_img' value='<?php echo $data['goods_img'];?>'/>
				</td>
			</tr>

			<tr>			
			<td>商品服务</td>
				<td>
					<?php if(is_array($server)):?><?php  foreach($server as $k=>$v){ ?>
				<?php if(in_array($k,$data['goods_server'])){ ?>
					<label for="">
					<input name="goods_server[]" checked="true" type="checkbox" value="<?php echo $k;?>" /><?php echo $v['name'];?>
					</label>
				<?php }else{ ?>
				<label for="">
					<input name="goods_server[]" type="checkbox" value="<?php echo $k;?>" /><?php echo $v['name'];?>
					</label>
				<?php } ?>
					<?php }?><?php endif;?>
				</td>
			</tr>			


			<tr>
				<td>商品细节</td>
				<td>
					<script type="text/javascript" charset="utf-8" src="http://localhost/hdtg2/hdphp/Extend/Org/Editor/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://localhost/hdtg2/hdphp/Extend/Org/Editor/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://localhost/hdtg2/hdphp/Extend/Org/Editor/Ueditor/"</script><script id="hd_detail" name="detail" type="text/plain"></script>
    <script type='text/javascript'>
        var ue = UE.getEditor('hd_detail',{
        imageUrl:'http://localhost/hdtg2/index.php/Admin/Goods&m=ueditor_upload&water=1&uploadsize=2000000&maximagewidth=false&maximageheight=false'//处理上传脚本
        ,zIndex : 0
        ,autoClearinitialContent:false
        ,initialFrameWidth:"100%" //宽度1000
        ,initialFrameHeight:"300" //宽度1000
        ,autoHeightEnabled:false //是否自动长高,默认true
        ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
        ,maximumWords:2000 //允许的最大字符数
        ,initialContent:'<?php echo $data['detail'];?>' //初始化编辑器的内容 也可以通过textarea/script给值
        ,readonly : false //编辑器初始化结束后,编辑区域是否是只读的，默认是false
        ,wordCount:true //是否开启字数统计
        
    });
    </script>

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