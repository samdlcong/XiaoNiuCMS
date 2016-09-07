<?php 
namespace Admin\Controller;
use Think\Controller;

class PositioncontentController extends CommonController{
	public function index(){
		$positions = D('Position')->getNormalPositions();
		//获取推荐位里面的内容
		$data['status']= array('neq',-1);
		if($_GET['title']){
			$data['title'] = trim($_GET['title']);
			$this->assign('title',$data['title']);
		}
		$data['position_id']=$_GET['position_id']?intval($_GET['position_id']):$positions[0]['id'];
		$contents = D("PositionContent")->select($data);
		$this->assign('contents',$contents);
		$this->assign("positions",$positions);
		$this->assign("positionId",$data['position_id']);
		$this->display();
	}
}