<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function __construct(){
		header("Content-type:text/html; charset=utf-8");
		parent::__construct();

	}

	public function getRank(){
		$conds['status']=1;
		$news=D('News')->getRank($conds,10);
		return $news;
	}
}