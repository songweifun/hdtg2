$(document).ready(function() {
	$("#cartId").click(function(event) {
		var url=$(this).attr('url');
		//alert(typeof url)
		$.ajax({
			type:"post",
			url: url,
			type:"json",
			success:function (result){
				result=JSON.parse(result)
				if(result.status==true){
					showInfoWindow(cartSucc);
					//alert(result.status)
					$("#total").html(result.total);
				}



			}
		});
		

	});
});

/**
 * 显示信息提示框
 * @param html
 */
function showInfoWindow(html){
	$('#infoWindow').show().css({
		top:$(window).scrollTop()+Math.floor(($(window).height()-$('#infoWindow').innerHeight())/2)
	})
	$('#cover').show().css({
		width:$(window).width(),
		height:$(document).height(),
		position:'absolute',
		left:0,
		top:0,
		background:'#333',
		opacity:0.3,
		zIndex:10000
	})
	$('#infoWindow').html(html);
}
/**
 * 隐藏信息提示框
 */
function hideInfoWindow(){
	$('#infoWindow').hide();
	$('#cover').hide();
}