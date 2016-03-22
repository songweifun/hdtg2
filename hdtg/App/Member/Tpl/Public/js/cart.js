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




})