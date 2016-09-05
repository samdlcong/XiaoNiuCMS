/**
 * 添加按钮操作
 */

 $("#button-add").click(function(){
 	var url = SCOPE.add_url;
 	window.location.href=url;
 });

 /**
  * 提交form表单操作
  */
 
 $("#cms-button-submit").click(function(){
 	var data =$("#cms-form").serializeArray();

 	postData = {};
 	$(data).each(function(i){
 		postData[this.name]=this.value;
 	});
 	//console.log(postData);
 	url=SCOPE.save_url;
 	jump_url = SCOPE.jump_url;
 	$.post(url,postData,function(result){
 		if(result.status == 1){
 			//console.log('ok');
 			return dialog.success(result.message,jump_url);
 		}else if(result.status == 0){
 			//失败
 			return dialog.error(result.message);
 		}
 	},'JSON');
 });

 $(".xiaoniucms-table #xiaoniucms-edit").on('click',function(){
 	var id = $(this).attr('attr-id');
 	var url = SCOPE.edit_url+'&id='+id;
 	window.location.href=url;
 });

 $(".xiaoniucms-table #xiaoniucms-delete").on('click',function(){
 	var id = $(this).attr('attr-id');
 	var a = $(this).attr("attr-a");
 	var message = $(this).attr("attr-message");
 	var url = SCOPE.set_status_url;

 	data = {};
 	data['id']=id;
 	data['status']= -1;

 	layer.open({
 		type : 0,
 		skin: 'layui-layer-molv',
 		title:'是否提交? ',
 		btn:['是','否'],
 		icon:3,
 		closeBtn:2,
 		content:"是否确定"+message,
 		scrollbar:true,
 		yes: function(){
 			todelete(url,data);
 		},
 	});
 });

 function todelete(url,data){
 	$.post(
 		url,
 		data,
 		function(s){
 			if(s.status ==1){
 				return dialog.success(s.message,'');
 			}else{
 				return dialog.error(s.message);
 			}
 		},"JSON");
 }


 $("#button-listorder").click(function(){
 	var data = $("#xncms-listorder").serializeArray();

 	postData = {};
 	$(data).each(function(i){
 		postData[this.name] = this.value;
 	});
 	url = SCOPE.listorder_url;
 	$.post(url,postData,function(result){
 		if(result.status ==1){
 			return dialog.success(result.message,result['data']['jumpUrl']);
 		}else if (result.status ==0){
 			return dialog.success(result.error);
 		}
 		//console.log(result);
 	},"JSON");
 });

 // $(".xiaoniucms-table #xiaoniucms-on-off").on('click',function(){
 // 	var id = $(this).attr("attr-id");
 // 	var status =$(this).attr("attr-status");
 // 	var url = SCOPE.set_status_url;
 // 	data = {};
 // 	data['id']=id;
 // 	data['status']= status;
	// console.log(data);
 // 	layer.open({
 // 		type : 0,
 // 		skin: 'layui-layer-molv',
 // 		title:'是否提交? ',
 // 		btn:['是','否'],
 // 		icon:3,
 // 		closeBtn:2,
 // 		content:"是否确定更改状态",
 // 		scrollbar:true,
 // 		yes: function(){
 // 			todelete(url,data);
 // 		},
 // 	});
 // });
$(".xiaoniucms-table #xiaoniucms-on-off").on('click',function(){
 	var id = $(this).attr('attr-id');
 	console.log(id);
 	var a = $(this).attr("attr-a");
 	var message = $(this).attr("attr-message");
 	var url = SCOPE.set_status_url;

 	data = {};
 	data['id']=id;
 	data['status']= -1;

 	layer.open({
 		type : 0,
 		skin: 'layui-layer-molv',
 		title:'是否提交? ',
 		btn:['是','否'],
 		icon:3,
 		closeBtn:2,
 		content:"是否确定"+message,
 		scrollbar:true,
 		yes: function(){
 			todelete(url,data);
 		},
 	});
 });