/**
* 
* @authors Hardy (hardy@xiruiad.com)
* @date    2018-04-28
*/

$(document).on("click", "#submit_btn", function (e) {  
	var btn_c = '<i class="ace-icon fa fa-cogs bigger-110"></i>数据处理中...';
	var btn_t = '<i class="ace-icon fa fa-check bigger-110"></i>提交';
	$("#submit_btn").attr("disabled",true);
	$("#submit_btn").html(btn_c);
	$.ajax({
		url: 'process.php',
		type: 'POST',
		dataType: 'json',
		data: {
			opwd: $('#oldpwd').val(),
			npwd1: $('#newpwd1').val(),
			npwd2: $('#newpwd2').val()
		},
		success:function(date){
			if (date.code=="unlogin") {
				show_confirm("系统提示","error",date.info,"","gologin()");
			}else if (date.code=="error") {
				show_confirm("系统提示","error",date.info,"","");
			}else{
				show_confirm("系统提示","ok",date.info,"","gologin()");
			}
		},
		error:function() {
			show_confirm("系统提示","error","数据交互失败","","");
		}
	});
	$("#submit_btn").attr("disabled",false);
	$("#submit_btn").html(btn_t);
});

//移除遮罩层
$(".widget-box-overlay").remove();