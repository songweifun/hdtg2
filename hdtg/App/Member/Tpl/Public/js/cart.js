$(function() {
	// 减少数量
	$(".reduce").click(function(event) {
		/* Act on the event */
		var num=Number($(this).parent().find(".num").val())-1;
		if(num<=0) return;
		 updataGoodsNum.call($(this),num);

	});



	//减少数量
	$(".add").click(function(event) {
		/* Act on the event */
		var num=Number($(this).parent().find(".num").val())+1;
		updataGoodsNum.call($(this),num);
	});

//删除购物车商品
$(".delCartDatas").click(function(event) {
		/* Act on the event */
		var url=$(this).find('a').attr('url');
		//alert(url)
		//updataGoodsNum.call($(this),num);
		delCartGoods.call($(this),url);
	});


/**
 * ajax实现商品数量增加减少
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-23T13:34:26+0800
 * @param    {[type]}                 num [description]
 * @return   {[type]}                     [description]
 */
function updataGoodsNum(num) {

		var url=$(this).attr('url');
		var gid=$(this).attr("gid");
		var self=$(this);

		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {"num": num,"gid":gid},
			success:function(result) {
				// body...
				//alert(result)
				if(result.status==true){
					self.parent().find(".num").val(result.num);
					//alert(self.parent().siblings('.price').html());
					self.parent().siblings('.xiaoji').html(self.parent().siblings('.price').html()*result.num);
					var total=0;

					$.each($(".xiaoji"), function(index, val) {
						 /* iterate through array or object */
						 total+=Number(val.innerHTML);
					});
					//alert(total)
					$('.total').find('span').html(total);
				}
			}

		});
}




/**
 * 异步删除购物车商品并改变总价
 * @Author   FSW<keepfun@163.com>
 * @DateTime 2016-03-23T14:11:17+0800
 * @param    {[type]}                 url [description]
 * @return   {[type]}                     [description]
 */
function delCartGoods(url) {
		var self=this;
	$.ajax({
		url:url,
		dataType:'json',
		success:function(result){
			if(result.status===true){

				$(self).parent().remove();
				//改变删除后的
				var total=0;

					$.each($(".xiaoji"), function(index, val) {
						 /* iterate through array or object */
						 total+=Number(val.innerHTML);
					});
					//alert(total)
					$('.total').find('span').html(total);
			}



		}





	})

}



})