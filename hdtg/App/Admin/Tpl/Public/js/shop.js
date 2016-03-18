$(function(){
	$("#ShopForm").validation({
		shopname: {
			 rule: {
				 maxlen:30,
				 required: true
			 },
			 error: {
				 maxlen: "不能大于30个字符 ",
		     required: "不能为空 "
		     },
		     message: "商铺名称长度 1到 30 位 ",
		     success: "商铺名称正确"
		 },
		 shopaddress: {
			 rule: {
				 maxlen:40,
				 required: true
			 },
			 error: {
				 maxlen: "不能大于40个字符 ",
		     required: "不能为空 "
		     },
		     message: "商铺地址长度 1到 40 位 ",
		     success: "商铺地址填写正确"
		 },

		 metroaddress: {
			 rule: {
				 maxlen:40,
				 required: true
			 },
			 error: {
				 maxlen: "不能大于40个字符 ",
		     required: "不能为空 "
		     },
		     message: "地铁地址长度 1到 40 位 ",
		     success: "地铁地址填写正确"
		 },
		shoptel: {
			 rule: {
				 tel:true,
				 required: true
			 },
			 error: {
				 tel: "电话格式书写不正确 ",
		     required: "不能为空 "
		     },
		     message: "填写一个固定电话的号码 ",
		     success: "地铁地址填写正确"
		 }

	})
$("#shopcoordbtn").click(function () {
	// body...
	if($("#shopaddress").val()==''){
		alert("请填写商铺地址");
	}else{
		getPoint($("#shopaddress").val());
	}
})




	//获得地址坐标函数
	function getPoint(addr) {
   // 创建地址解析器实例
	var myGeo = new BMap.Geocoder();
	 // 将地址解析结果显示在地图上,并调整地图视野
	myGeo.getPoint(addr, function(point){
		$("#shopcoord").val(JSON.stringify(point));
	}, "北京市");

	}





})
