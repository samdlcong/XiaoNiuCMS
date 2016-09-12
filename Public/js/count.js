/**
 * 计数器js文件
 */

var newsIds ={};
$('.new_count').each(function(i){
	newsIds[i] = $(this).attr("news-id");
});
console.log(newsIds);