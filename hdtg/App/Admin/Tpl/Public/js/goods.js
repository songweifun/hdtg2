$(function(){
	$("#GoodsForm").validation({
		main_title: {
			 rule: {
				 maxlen:60,
				 required: true
			 },
			 error: {
				 maxlen: "不能大于60个字符 ",
		     required: "不能为空 "
		     },
		     message: "商品主标题长度 1到 60 位 ",
		     success: "商品主标题名称正确"
		 },
		 sub_title: {
			 rule: {
				 maxlen:50,
				 required: true
			 },
			 error: {
				 maxlen: "不能大于50个字符 ",
		     required: "不能为空 "
		     },
		     message: "商品副标题长度 1到 50 位 ",
		     success: "商品副标题地址填写正确"
		 },

		 price: {
			 rule: {
				 num:"1,10000",
				 required: true
			 },
			 error: {
				 num: "商品价格为1-10000",
		         required: "不能为空 "
		     },
		     message: "填写商品价格1~10000之间的数字 ",
		     success: "商品价格填写正确"
		 },
		old_price: {
			 rule: {
				 num:"1,10000",
				 required: true
			 },
			 error: {
				 num: "商品价格为1-10000",
		         required: "不能为空 "
		     },
		     message: "填写商品价格1~10000之间的数字 ",
		     success: "商品价格填写正确"
		 }

	})




  // 日期中文字符
    var dateFormat = {
        dateFormat: "yy-mm-dd",
        monthNames: [ "一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月" ],
        dayNamesMin: [ "日", "一", "二", "三", "四", "五", "六" ]
    };
    // 为ID为begin_time的input设置日历
    $("#begin_time").datepicker(dateFormat);
    $("#end_time").datepicker(dateFormat);




})
