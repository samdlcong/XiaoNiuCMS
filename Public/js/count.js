/**
 * 计数器js文件
 */

var newsIds ={};
$('.news_count').each(function(i){
	newsIds[i] = $(this).attr("news-id");
});
//console.log(newsIds);
url = "/index.php?c=index&a=getCount";

$.post(url,newsIds,function(result){
	if(result.status == 1){
		console.log(result.data);
		counts = result.data;
		$.each(counts,function(news_id,count){
			$(".node-"+news_id).html(count);
		});
	}
},"JSON");

