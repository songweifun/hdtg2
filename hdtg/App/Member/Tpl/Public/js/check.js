	var checkFormMsg={

			"email":{
 					"focus":"请填写邮箱亲!",
 					"empty":"邮箱不能为空",
 					"error":"请填写正确的邮箱格式",
 					"success":"邮箱填写正确"

			},
			"uname":{
 					"focus":"请填写用户名亲!",
 					"empty":"用户名不能为空",
 					"error":"用户名填写格式不正确",
 					"success":"用户名填写正确"

			},
			"password":{
 					"focus":"请填写密码亲!",
 					"empty":"密码不能为空",
 					"error":"密码格式不正确",
 					"success":"密码填写正确"

			},
			"password_d":{
 					"focus":"请再次填写密码亲!",
 					"empty":"确认密码不能为空",
 					"error":"两次填写的密码不一致",
 					"success":"密码填写正确"

			},
			"code":{
 					"focus":"请填写验证码亲!",
 					"empty":"验证码不能为空",
 					"error":"验证码填格式错误",
 					"success":"验证码填写正确"

			}






	}


/*$(document).ready(function() {


//将组jquery对象转换为原生对象并给每个对象一个false的状态
 var aEls=[];

 check();
$("#regForm").submit(function(event) {

	for (var i = 0; i < aEls.length; i++) {
		if(aEls[i].status==false){
		 return false;
		}
 }

  });




function check() {
	var aMust=$("#regForm .must");
	aMust.each(function() {
	this.status=false;
	aEls.push(this);
});


//给每个文本框添加获得焦点,失去焦点事件
for (var i = 0; i < aEls.length; i++) {
	aEls[i].onfocus=function () {
		// body...
		var name=this.name;
		var focusMsg=checkFormMsg[name]['focus'];
		showFocus.call(this,focusMsg);

					this.onblur=function () {
					// body...
					var name=this.name;
					var value=this.value;
					var errorMsg=checkFormMsg[name]['error'];
					var successMsg=checkFormMsg[name]['success'];
					var emptyMsg=checkFormMsg[name]['empty'];
					showBlur.call(this,errorMsg,successMsg,emptyMsg);
					//alert($(this).attr('ajax'))
						// if( $(this).attr('ajax') == 1 ){
						// 	  var url= __JSCONTROL__+'/chekAjax'
						// 	  //alert('__CONTROL__');
						// 	  //alert(url)
						// 		$.ajax({
						// 			url: url,
						// 			type: 'POST',
						// 			dataType: 'json',
						// 			data: {name: this.name,value:value},
						// 				success:function(result){
						// 	         alert(result.status)
						// }
						// 		})
								
								


						// }
					
					
					}


	}


}

}

//获得焦点时用于显示的函数
function showFocus(Msg) {
	// body...
	var $parent =$(this).parents('dl');
	var $prompt=$parent.find('.prompt');
	$parent.attr({class: 'focus'});
	$prompt.html(Msg);

}



//失去焦点时用于显示的函数
function showBlur(eMsg,sMsg,emptyMsg) {
	// body...
	var $parent =$(this).parents('dl');
	var $prompt=$parent.find('.prompt');
	//$parent.attr({class: 'focus'});
	//$prompt.html(Msg);
	//var preg=/^[a-z0-9\.]+@[a-z0-9]+\.[a-z]+$/i;
	var preg=$(this).attr("preg");
	//javascript中正则表达式是一个对象不是字符串
	var reg=eval(preg);
	// document.write(typeof reg)
	// document.write("<br>")
	var val=$(this).val();
	var self=this;
	//var reg=/^[a-z0-9\.]+@[a-z0-9]+\.[a-z]+$/i;
	//alert(typeof reg)
	//alert(val)
	// document.write(typeof reg)
	//当输入为空的时候
	if(val==""){
		$parent.attr({class: 'error'});
		$prompt.html(emptyMsg);
  
	}else{//输入不为空时
   
		if(this.name == "password_d"){//当为密码确认时
			if(this.value !=$("#password").val()){//两次密码不一致时
				$parent.attr({class: 'error'});
		    $prompt.html(eMsg);
			}else{//两次密码一致时
				$parent.attr({class: 'success'});
		    $prompt.html(sMsg);
		    this.status=true;
			}

		}else{//当不是密码确认时

	if(reg.test(val)){
		//if(preg.test(111)){

		$parent.attr({class: 'success'});
		$prompt.html(sMsg);
		this.status=true;

		if( $(this).attr('ajax') == 1 ){
							  var url= __JSCONTROL__+'/chekAjax'
							  //alert('__CONTROL__');
							  //alert(url)
								$.ajax({
									url: url,
									type: 'POST',
									dataType: 'json',
									data: {name: this.name,value:this.value},
										success:function(result){
							         if(result.status==true){
							         	$parent.attr({class: 'success'});
												//$prompt.html(result.);
												self.status=true;
							         }else{
							         		$parent.attr({class: 'error'});
													$prompt.html(result.msg);
													elf.status=false;

							         }
						}
								})
								
								


						}





	}else{
		$parent.attr({class: 'error'});
		$prompt.html(eMsg);
	}
	}




}



}

});*/


//重构


$(function(){



//将组jquery对象转换为原生对象并给每个对象一个false的状态
 var aEls=[];

 check();
$("#regForm").submit(function(event) {

	for (var i = 0; i < aEls.length; i++) {
		if(aEls[i].status==false){
		 return false;
		}
 }

  });




function check() {
	var aMust=$("#regForm .must");
	aMust.each(function() {
	this.status=false;
	aEls.push(this);
});


//给每个文本框添加获得焦点,失去焦点事件
for (var i = 0; i < aEls.length; i++) {
	aEls[i].onfocus=function () {
		// body...
		var name=this.name;
		var focusMsg=checkFormMsg[name]['focus'];
		showFocus.call(this,focusMsg);

					this.onblur=function () {
					// body...
					var name=this.name;
					var value=this.value;
					
					var errorMsg=checkFormMsg[name]['error'];
					var successMsg=checkFormMsg[name]['success'];
					var emptyMsg=checkFormMsg[name]['empty'];
					var preg=$(this).attr("preg");
	        //javascript中正则表达式是一个对象不是字符串
	        var preg =$(this).attr("preg");
	        var reg  =eval(preg);

        if(name=='password_d'){
					if( value==$("#password").val()){//两次密码一致时
					  showSuccess.call(this,successMsg);
					  //this.status=true;
					}else{//两次密码不一致时
					   showError.call(this,errorMsg);
					   //this.status=false;
					}

        }else{

	  if(reg.test(value)){
	        	showSuccess.call(this,successMsg);
	        	var self=this;

	        	if( $(this).attr('ajax') == 1 ){
	        		
							  var url= __JSCONTROL__+'/chekAjax'
								$.ajax({
									url: url,
									type: 'POST',
									dataType: 'json',
									data: {name: name,value:value},
										success:function(result){
											//alert(1111111111111)
							       if(result.status==true){
							         	showSuccess.call(self,result.msg);
												//self.status=true;
							         }else{
							         	 showError.call(self,result.msg);
													//self.status=false;

							         }
						}
								})
								
								


						}

	        }else{
             showError.call(this,errorMsg);

	        }
		
	      }
					
					
					}


	}


}

}




//获得焦点时用于显示的函数
function showFocus(Msg) {
	// body...
	var $parent =$(this).parents('dl');
	var $prompt=$parent.find('.prompt');
	$parent.attr({class: 'focus'});
	$prompt.html(Msg);

}


//显示错误信息

function showError(Msg) {
	// body...
	var $parent =$(this).parents('dl');
	var $prompt=$parent.find('.prompt');
	$parent.attr({class: 'error'});
	$prompt.html(Msg);
}


//显示成功信息

function showSuccess(Msg) {
	// body...
	var $parent =$(this).parents('dl');
	var $prompt=$parent.find('.prompt');
	$parent.attr({class: 'success'});
	$prompt.html(Msg);
	this.status=true;
}











})
