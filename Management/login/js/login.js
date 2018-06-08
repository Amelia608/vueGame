/**
 * 
 * @authors Hardy (hardy@xiruiad.com)
 * @date    2017-11-10
 * @version $Id$
 */

//清空下 localStorage
window.localStorage.clear();
$("#login_btn").click(function() {
	login();
});
$(function(){
	document.onkeydown = function(e){ 
	    var ev = document.all ? window.event : e;
	    if(ev.keyCode==13) {
	     	login();
	    }
	}
});  
function login(){
	$("#login_btn").attr({"disabled":true,"text":"登录中..."});
	$(".fa-key").addClass('hidden');
	var val_name     = $("#username").val();
	var val_password = $("#password").val();
	$.ajax({
		url: 'process.php',
		type: 'POST',
		dataType: 'json',
		data: {
			username: val_name,
			password: val_password
		},
		success:function(data){
			if(data.code=="error"){
				$("#error_info").text(data.info);
				$("#login_error_info").attr("class","show");
				$("#login_btn").attr({"disabled":false,"text":"登录"});
				$(".fa-key").removeClass('hidden');
			}else{
				$(window).attr("location","../user/");
			}
		},
		error:function(){
			$("#login_btn").attr({"disabled":false,"text":"登录"});
			$(".fa-key").removeClass('hidden');
		}
	});
};
localStorage.clear();
window.localStorage.clear();