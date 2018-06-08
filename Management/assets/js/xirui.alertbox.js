//退出事件
function quit(){
	$.ajax({
		url: '../user/quit.php',
		type: 'post',
		dataType: 'json',
		data: {param1: 'value1'},
		success:function(){
			$(location).attr('href', '../login/');
		},
		error:function(){
			
		}
	})
}

//模态窗事件
function modal_op(id,type){
	$("#"+id).modal(type);
}

//退出事件
$("#navbar_quit").click(function() {
	show_sysdialog("系统提示", "","确定退出系统吗？","退出","quit()","check","取消","","remove");
});

//显示对话框事件
function show_sysdialog(title, type, content,txt_btn1, fn_btn1,icon_btn1,txt_btn2,fn_btn2,icon_btn2) {
	if (type == "ok"){
		var picName = "<i class='ace-icon fa fa-smile-o bigger-250 green'></i>";
	}else if (type == "error"){
		var picName = "<i class='ace-icon fa fa-frown-o bigger-250 red'></i>";
	}else{
		var picName = "";
	};
	if(icon_btn1==""){
		icon_btn1 = "check";
	}
	if(icon_btn2==""){
		icon_btn1 = "remove";
	}
	bootbox.dialog({
		// title:"<div class='modal-title'><h4 class='modal-title'>"+title+"</h4></div>",
		message: picName+"<h2>" + content + "</h2>",
		closeButton:0,
		className:"dialog_top",
		buttons:
		{
			"btn-1" :
			 {
				"label" : "<i class='ace-icon fa fa-"+icon_btn1+"'></i>"+txt_btn1,
				"className" : "btn btn-info btn-sm popover-info",
				"callback": function() {
					eval(fn_btn1);
				}
			},
			"btn-2" :
			 {
				"label" : "<i class='ace-icon fa fa-"+icon_btn2+"'></i>"+txt_btn2,
				"className" : "btn btn-sm popover-info",
				"callback": function() {
					eval(fn_btn2);
				}
			}
		}
	});
}

/**
 * 确认框
 */
function show_confirm(title, type, content, btn_txt,fn) {
	if (!btn_txt) {
		btn_txt="确定";
	};
	if (type == "ok"){
		var picName = "<i class='ace-icon fa fa-smile-o bigger-250 green'></i>";
	}else if (type == "error"){
		var picName = "<i class='ace-icon fa fa-frown-o bigger-250 red'></i>";
	}else{
		var picName = "";
	};

	bootbox.dialog({
		// title:"<div class='modal-title'><h4 class='modal-title'>"+title+"</h4></div>",
		message: picName+"<h2>" + content + "</h2>",
		closeButton:0,
		className:"dialog_top",
		buttons:
		{
			"btn-1" :
			 {
				"label" : "<i class='ace-icon fa fa-bell'></i>"+btn_txt,
				"className" : "btn-sm btn-info",
				"callback": function() {
					eval(fn);
				}
			}
		}
	});

}


