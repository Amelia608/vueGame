/**
 * @authors Hardy
 * @date    2018-04-27
 * @Web		http://www.xiruiad.com
 */

//新增按钮事件
// $("#add-btn").click(function() {
// 	var begin_Date = new Date();
// 	var till_Date = new Date();
// 	begin_Date.setTime(begin_Date.getTime()+60*60*1000);
// 	till_Date.setTime(till_Date.getTime()+2*60*60*1000);
// 	$("#id").val("");
// 	$("#begin_time").val(dateFtt("yyyy-MM-dd hh"+":00:00",begin_Date));
// 	$("#till_time").val(dateFtt("yyyy-MM-dd hh"+":00:00",till_Date));
// 	$("#formstatus").attr({"checked":true,"value":1})
// 	$('#action').val("add");
// 	modal_op("edit_modal","show");
// });

//提示事件
// $('[data-rel=popover]').popover({container:'body'});

//更改状态
$('#formstatus').on('click', function(){
	if(this.checked) {
		$('#formstatus').val("1");
	}else {
		$('#formstatus').val("0");
	}
});

//提交事件
// $("#sub-btn").click(function(event) {
// 	var btn_c = '<i class="ace-icon fa fa-cogs bigger-110"></i>数据处理中...';
// 	var btn_t = '<i class="ace-icon fa fa-check bigger-110"></i>提交';
// 	$("#sub-btn").attr("disabled",true);
// 	$("#sub-btn").html(btn_c);
// 	var action = $('#action').val();
// 	var id = $('#id').val();
// 	$.ajax({
// 		url: 'process.php',
// 		type: 'POST',
// 		dataType: 'json',
// 		data: {
// 			id: $('#id').val()
// 			,begin_time: $('#begin_time').val()
// 			,till_time: $('#till_time').val()
// 			,formstatus: $('#formstatus').val()
// 			,action: action
// 		},
// 	})
// 	.done(function(date) {
// 		if (date.code=="unlogin") {
// 			show_confirm("系统提示","error",date.info,"","gologin()");
// 		}else if (date.code=="error") {
// 			modal_op("edit_modal","hide");
// 			show_confirm("系统提示","error",date.info,"","modal_op('edit_modal','show')");
// 		}else if (date.code=="empty") {
// 			modal_op("edit_modal","hide");
// 			show_confirm("系统提示","error",date.info,"","modal_op('edit_modal','hide')");
// 		}else{
// 			modal_op('edit_modal','hide');
// 			show_confirm("系统提示","ok",date.info,"","loading_data('', 1, '')");
// 		}
// 	})
// 	.fail(function() {
// 		modal_op('edit_modal','hide');
// 		show_confirm("系统提示","error","数据交互失败","","modal_op('edit_modal','show')");
// 	});
// 	$("#sub-btn").attr("disabled",false);
// 	$("#sub-btn").html(btn_t);
// });

//修改事件
// function modify(id){
// 	$.ajax({
// 		url: 'json/edit.php',
// 		type: 'POST',
// 		dataType: 'json',
// 		data: {id: id,rand:Math.random()},
// 	})
// 	.done(function(data) {
// 		if (data.code=="success") {
// 			var json_info = data.info;
// 			$("#id").val(id);
// 			$("#begin_time").val(json_info.begin_time);
// 			$("#till_time").val(json_info.still_time);

// 			if (json_info.status==1) {
// 				$("#formstatus").attr("checked",true)
// 			}else{
// 				$("#formstatus").attr("checked",false)
// 			}
// 			$("#formstatus").val(json_info.status);

// 			$("#action").val("modify");
// 			modal_op("edit_modal","show");
// 		}else{
// 			modal_op("edit_modal","hide");
// 			show_confirm("系统提示","error",data.info,"","");
// 		}
// 	})
// 	.fail(function() {
// 		modal_op("edit_modal","hide");
// 		show_confirm("系统提示","error","数据操作失败","",'modal_op("edit_modal","show")');
// 	})
// }

//按钮ajax事件
function chagestatus(dataId){
	var dataStatus=$("#statusBtn"+dataId).attr('data-s');
	dataString="action=chagestatus&formstatus="+dataStatus+"&id="+dataId;
	$.ajax({
		type: "POST",
		url: "process.php",
		data: dataString,
		success: function(data) {
			if(dataStatus==0){  
				$("#statusSpan"+dataId).attr("class","badge");
				$("#statusSpan"+dataId).text("停用中");
				$("#statusBtn"+dataId).attr({"class":"btn btn-xs btn-success",'data-s':"1"});
			}else{    
				$("#statusSpan"+dataId).attr("class","badge badge-success");
				$("#statusSpan"+dataId).text("启用中");
				$("#statusBtn"+dataId).attr({"class":"btn btn-xs btn-warring",'data-s':"0"});
			}
		},
		error:function(){
			show_confirm("系统提示","error","操作失败","","");
		}
	});			
};

//载入数据Fn
function loading_data(sort, page, keywords){

	//绑定元素
	var pdiv=$("#rows_all");

	//载入数据
	$.post("json/list.php", {sort:sort, page:page, keywords:keywords, randomstr:Date.parse(new Date()) }, function (data, textStatus){

		//写入当前参数
		// window.localStorage.setItem("vote_keyws",keywords);
		// window.localStorage.setItem("vote_sort",sort);
		window.localStorage.setItem("vote_page",data.page);

		//基本数据
		// $("#tab_"+type).find("#result_num").text(" - ["+data.total+"]");
		// pdiv.find("#sort_cn").text(data.sort_cn);

		//分页数据
		// pdiv.find("#page_info").find("li").remove();	//先清空历史元素
		// var tmp1=new Array;
		// if (data.page_info) var tmp1=data.page_info.split(",");
		// if (data.page==1) var d1=' class="disabled" ';
		// else  var d1='';
		// if (data.page==data.last_page) var d2=' class="disabled" ';
		// else  var d2='';
		// if (tmp1.length){
		// 	pdiv.find("#page_info").append('<li'+d1+'><a href="javascript:void(0)" class="btn_last_page"><i class="ace-icon fa fa-angle-double-left"></i></a></li>');
		// 	$.each(tmp1,function(n,value) {
		// 		if (value=='…') var link1='#';
		// 		else  var link1='#';
		// 		if (value==data.page) var d3=' class="active" ';
		// 		else  var d3='';
		// 		pdiv.find("#page_info").append('<li'+d3+'><a href="'+link1+'" class="btn_normal_page">'+value+'</a></li>');
		// 	});
		// 	pdiv.find("#page_info").append('<li'+d2+'><a href="javascript:void(0)" class="btn_next_page"><i class="ace-icon fa fa-angle-double-right"></i></a></li>');
		// }

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
								'<th class="center" width="46">状态</th>'+
								'<th class="center" width="40" style="border-right:1px #F1F1F1 dotted">操作</th>'+
								'</tr>'+
				   		'</thead>'+
				   		'<tbody>';
						$.each(json_list,function(n,value) {
							if(value.status_cn == "停用中"){
								var statusCSS = "";
								var statusbtnCSS = "btn-success";
								var statusNum = "1";
							}else{
								var statusCSS = "badge-success";
								var statusbtnCSS = "btn-warring";
								var statusNum = "0";
							}
							content_list_row= content_list_row + 
							'<tr>'+
								'<td>'+value.title+'</td>'+
								// '<td>'+value.stime+'</td>'+
								'<td><span id="statusSpan'+value.id+'" class="badge '+statusCSS+'">'+value.status_cn+'</span></td>'+
						   		'<td>'+
						   			'<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">'+
						   			'<button class="btn btn-xs '+statusbtnCSS+'" title="修改状态" id="statusBtn'+value.id+'" onclick="chagestatus('+value.id+')" data-s="'+statusNum+'"> <i class="ace-icon fa fa-check"></i> </button>'+
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

		// //获得当前参数
		var cur_page  = window.localStorage.getItem("vote_page");
		if (cur_page==null) {cur_page=1};
		// var cur_keyws = window.localStorage.getItem("vote_keyws");
		// if (cur_keyws==null) {cur_keyws=""};
		// var cur_sort  = window.localStorage.getItem("vote_sort");
		// if (cur_sort==null) {cur_sort=""};

		// //排序按钮
		// pdiv.find(".btn_reload_by_title").unbind();
		// pdiv.find(".btn_reload_by_title").click(function(){
		// 	loading_data("by_title",cur_page,cur_keyws);
		// });
		// pdiv.find(".btn_reload_by_status").unbind();
		// pdiv.find(".btn_reload_by_status").click(function(){
		// 	loading_data("by_status",cur_page,cur_keyws);
		// });
		// pdiv.find(".btn_reload_data").unbind();
		// pdiv.find(".btn_reload_data").click(function(){
		// 	$("#search_keywords").val("");
		// 	window.localStorage.setItem("vote_keyws","");
		// 	loading_data("",1,"");
		// });

		//翻页按钮
		pdiv.find(".btn_last_page").unbind();
		pdiv.find(".btn_last_page").click(function(){
			var new_page=parseInt(cur_page)-1;
			if($(this).parent().attr("class")!="disabled"){
				window.localStorage.setItem("vote_page",new_page);
				loading_data(cur_sort,new_page,cur_keyws);
			}
		});
		pdiv.find(".btn_next_page").unbind();
		pdiv.find(".btn_next_page").click(function(){
			var new_page=parseInt(cur_page)+1;
			if($(this).parent().attr("class")!="disabled"){
				window.localStorage.setItem("vote_page",new_page);
				loading_data(cur_sort,new_page,cur_keyws);
			}
		});
		pdiv.find(".btn_normal_page").unbind();
		pdiv.find(".btn_normal_page").click(function(){
			var new_page=parseInt($(this).text());
			if($(this).text()!="…"){
				window.localStorage.setItem("vote_page",new_page);
				loading_data(cur_sort,new_page,cur_keyws);
			}
		});

		//checkbox选中的动作
		$('table th input:checkbox').on('click' , function(){
			var that = this;
			$(this).closest('table').find('tr > td:first-child input:checkbox')
			.each(function(){
				this.checked = that.checked;
				$(this).closest('tr').toggleClass('selected');
			});						
		});
		//**************  事件绑定结束 **************
	}, "json");
};

function fn_search(key){
	$("#search_keywords").val(key);	 //赋值到当前关键字变量中
	loading_data("by_subsribe_time",1, key);
	return false;
};

jQuery(function($) {
	var keywords = window.localStorage.getItem("vote_keyws");
	if (keywords==null) {keywords=""};
	var page = window.localStorage.getItem("vote_page");
	if (page==null) {page=1};
	var sort = window.localStorage.getItem("vote_sort");
	if (sort==null) {sort=""};
	
	$("#search_keywords").val(keywords);
	
	loading_data(sort,page,keywords);
	
	/* 回车提交搜索 */
	// $("#search_keywords").keydown(function(e){
	// 	if (e.keyCode==13) {
	// 		var key = $("#search_keywords").val();
	// 		window.localStorage.setItem("vote_keyws",key);
	// 		fn_search(key);
	// 		$("#search_keywords").blur();
	// 	}
	// });
});

//移除遮罩层
$(".widget-box-overlay").remove();