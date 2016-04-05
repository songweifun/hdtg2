$(function(){
// 减少数量
    $(".reduce").click(function(event) {
        /* Act on the event */
        var num=Number($(this).parent().find(".num").val())-1;
        if(num<=0) return;
        $(this).parent().find(".num").val(num);

        var total=$(this).parent().siblings('.price').html()*num;
        $(this).parent().siblings('.totals').html(total)
    });



    //增加数量
    $(".add").click(function(event) {
        /* Act on the event */
        var num=Number($(this).parent().find(".num").val())+1;
        $(this).parent().find(".num").val(num);
        var total=$(this).parent().siblings('.price').html()*num;
        $(this).parent().siblings('.totals').html(total)

    });







})