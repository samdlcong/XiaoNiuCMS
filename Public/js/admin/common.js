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
 	url=SCOPE.save_url;
 	jump_url = SCOPE.jump_url;
 	$.post(url,postData,function(result){
 		if(result.status == 1){
 			console.log('ok');
 			return dialog.success(result.message,jump_url);
 		}else if(result.status == 0){
 			//失败
 			return dialog.error(result.message);
 		}
 	},'JSON');
 });