/**
 * 添加收藏
 */
function addFavorite2() {
    var url = window.location;
    var title = document.title;
    var ua = navigator.userAgent.toLowerCase();
    if (ua.indexOf("360se") > -1) {
        alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
    }
    else if (ua.indexOf("msie 8") > -1) {
        window.external.AddToFavoritesBar(url, title); //IE8
    }
    else if (document.all) {
    	try{
    		window.external.addFavorite(url, title);
    	}catch(e){
    		alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
    	}
    }
    else if (window.sidebar) {
        window.sidebar.addPanel(title, url, "");
    }
    else {
    	alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
    }
}
/**
 * 导航字菜单
 */

$(function(){
	//导航样式切换
	$('#nav .user-nav').hover(function(){
		$(this).addClass('active');
	},function(){
		$(this).removeClass('active');
	})
	//我的团购菜单切换
	$('#nav .my-hdtg').hover(function(){
		$(this).find('.menu').show();
	},function(){
		$(this).find('.menu').hide();
	})
	//最近浏览菜单切换
	$('#nav .recent-view').hover(function(){
		$(this).find('.menu').show();
	},function(){
		$(this).find('.menu').hide();
	})
	//购物车菜单切换
	$('#nav .my-cart').hover(function(){
		$(this).find('.menu').show();
		var url=$(this).attr('url');
		var cartUrl=$(this).attr('cartUrl');
		var self=this;
		$.ajax({
			url: url,
			dataType: 'json',
			//data: {param1: 'value1'},
			success:function(result){
				var data=result[0];
				$(self).find('.menu li').remove();
				for(var i in data){
					//alert(data[i]['main_title']);
					var nodeStr = '<li>\
								<a class="image" href="">\
								<img src="'+data[i]['goods_img']+'" />\
								</a>\
								<div>\
								<h4>\
								<a href="">'+data[i]['main_title']+'</a>\
								</h4>\
								<span><strong>'+data[i]['price']+'</strong><a href="">删除</a></span>\
								</div>\
								</li>';
						$(self).find('.menu').append(nodeStr);
				}

				$(self).find('.menu').append('<p class="clear"><a href="'+cartUrl+'">查看我的购物车</a></p>');
			}
		});
		
	},function(){
		$(this).find('.menu').hide();
	})
})




