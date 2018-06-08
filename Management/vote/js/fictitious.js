/**
 * @authors Hardy
 * @Web		http://www.xiruiad.com
 */

//提交事件
$("#sub-btn").click(function(event) {
	var btn_c = '<i class="ace-icon fa fa-cogs bigger-110"></i>数据处理中...';
	var btn_t = '<i class="ace-icon fa fa-check bigger-110"></i>提交';
	$("#sub-btn").attr("disabled",true);
	$("#sub-btn").html(btn_c);
	var action = $('#action').val();
	var id = $('#id').val();
	$.ajax({
		url: 'ficitious_process.php',
		type: 'POST',
		dataType: 'json',
		data: {
			id: $('#id').val()
			,num: $('#frm_num').val()
		},
	})
	.done(function(date) {
		if (date.code=="unlogin") {
			show_confirm("系统提示","error",date.info,"","gologin()");
		}else if (date.code=="error") {
			modal_op("edit_modal","hide");
			show_confirm("系统提示","error",date.info,"","modal_op('edit_modal','show')");
		}else if (date.code=="empty") {
			modal_op("edit_modal","hide");
			show_confirm("系统提示","error",date.info,"","modal_op('edit_modal','hide')");
		}else{
			modal_op('edit_modal','hide');
			show_confirm("系统提示","ok",date.info,"","loading_data()");
		}
	})
	.fail(function() {
		modal_op('edit_modal','hide');
		show_confirm("系统提示","error","数据交互失败","","modal_op('edit_modal','show')");
	});
	$("#sub-btn").attr("disabled",false);
	$("#sub-btn").html(btn_t);
});

// 修改事件
function modify(id){
	$.ajax({
		url: 'json/ficitious_edit.php',
		type: 'POST',
		dataType: 'json',
		data: {id: id,rand:Math.random()},
	})
	.done(function(data) {
		if (data.code=="success") {
			var json_info = data.info;
			$("#id").val(id);
			$("#frm_num").val("frm_num");
			modal_op("edit_modal","show");
		}else{
			modal_op("edit_modal","hide");
			show_confirm("系统提示","error",data.info,"","");
		}
	})
	.fail(function() {
		modal_op("edit_modal","hide");
		show_confirm("系统提示","error","数据操作失败","",'modal_op("edit_modal","show")');
	})
}


//载入数据Fn
function loading_data(){

	//绑定元素
	var pdiv=$("#rows_all");

	//载入数据
	$.post("json/ficitious_list.php", {randomstr:Date.parse(new Date()) }, function (data, textStatus){
		//列表
		pdiv.find("#content_list_row").find(".col-xs-12").remove();	//先清空历史元素

		var json_list = data.list;
		if (json_list){
			var content_list_row  =  
			'<div class="col-xs-12">'+  //表头信息
				'<div class="table-responsive">'+
					'<table id="simple-table" class="table  table-bordered table-hover">'+
						'<thead>'+
							'<tr>'+
								'<th>标题</th>'+
								'<th class="center" width="80">基础数值</th>'+
								'<th class="center" width="40" style="border-right:1px #F1F1F1 dotted">操作</th>'+
								'</tr>'+
				   		'</thead>'+
				   		'<tbody>';
						$.each(json_list,function(n,value) {
							content_list_row= content_list_row + 
							'<tr>'+
								'<td>'+value.title+'</td>'+
								'<td class="center">'+value.num+'</td>'+
						   		'<td>'+
						   			'<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">'+
						   			'<button class="btn btn-xs btn-info edit_num" title="修改" date-s="'+value.id+'"> <i class="ace-icon fa fa-edit"></i> </button>'+
						   			'</div>'+
						   		'</td>'+
							'</tr>';
							});
							content_list_row= content_list_row + 
						'</tbody>'+
					'</table>'+
				'</div>'+
			'</div>';

			pdiv.find("#content_list_row").append(content_list_row);//载入数据表信息
		}

		//**************  事件绑定开始 **************
		//鼠标移动效果
		pdiv.find(".user-box").hover(function(){
			$(this).addClass("myshadow");
			$(this).addClass("mybgcolor-white");
			$(this).find(".margin2").removeClass("hidden");
		},function(){
			$(this).removeClass("myshadow");
			$(this).removeClass("mybgcolor-white");
			$(this).find(".margin2").addClass("hidden");
		});

		//修改事件
		$(".edit_num").click(function() {
			var id = $(this).attr("date-s");
			$('#id').val(id);
			$.ajax({
				url: 'json/ficitious_edit.php',
				type: 'POST',
				dataType: 'json',
				data: {id:id},
			})
			.done(function(date) {
				var json = date.info;
				$('#frm_num').val(json.num);
			})
			modal_op("edit_modal","show");
			setTimeout( function(){
				try{
					document.getElementById('frm_num').select();
				} catch(e){}
			}, 500);
		});
		//**************  事件绑定结束 **************
	}, "json");
};

function fn_search(key){
	loading_data();
	return false;
};

jQuery(function($) {
	loading_data();
});

//移除遮罩层
$(".widget-box-overlay").remove();