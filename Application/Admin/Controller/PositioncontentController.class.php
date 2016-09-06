<?php 
namespace Admin\Controller;
use Think\Controller;

class PositioncontentController extends CommonController{
	public function index(){
		$positions = D('Position')->getNormalPositions();
		$this->assign("positions",$positions);
		$this->display();
	}
}