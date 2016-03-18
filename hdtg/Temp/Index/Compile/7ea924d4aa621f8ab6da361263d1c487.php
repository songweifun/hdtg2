<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!-- 商品过滤开始 -->
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
				<div class='filter-label-level-2'>
					<?php if(is_array($sonCategory)):?><?php  foreach($sonCategory as $k=>$v){ ?>
						<?php echo $v;?>
					<?php }?><?php endif;?>
				</div>
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
				<div class='filter-label-level-2'>
					<?php if(is_array($sonLocality)):?><?php  foreach($sonLocality as $k=>$v){ ?>
						<?php echo $v;?>
					<?php }?><?php endif;?>
				</div>
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