<?php
/**
 * 公用的方法
 */

function show($status,$message,$data=array()){
	$result = array(
		'status'=>$status,
		'message'=>$message,
		'data'=>$data
		);
	exit(json_encode($result));
}

function getMd5Password($password){
	return md5($password.C('MD5_PRE'));
}