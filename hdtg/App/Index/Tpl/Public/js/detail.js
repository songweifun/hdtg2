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

//收藏本单发送ajax
	$("#collectId").click(function(event) {
		if(!userIsLogin) {alert("你没有登录");return false;}
		var url=$(this).attr('url');
		var urlto=$(this).attr('urlto');
		//alert(typeof url)
		$.ajax({
			type:"post",
			url: url,
			type:"json",
			success:function (result){
				result=JSON.parse(result)
				if(result.status==true){
					showInfoWindow(collectSucc);
					//alert(result.status)
					//$("#total").html(result.total);
				}else{
					alert('此商品已经收藏了!');
					window.location.href=urlto;
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