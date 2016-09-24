<?php
namespace Admin\Controller;
use Think\Controller;

class PositionController extends CommonController{
	public function index(){
		$lists = D('Position')->getNormalPositions();
		$this->assign('lists',$lists);
		$this->display();
	}


	public function add(){
		if($_POST){
			if(!isset($_POST['name']) || !$_POST['name']){
				return show(0,'推荐位名不能为空');
			}
			if(!isset($_POST['description']) || !$_POST['description']){
				return show(0,'推荐位描述不能为空');
			}
			if($_POST['id']){
				return $this->save($_POST);
			}
			$positionId = D('Position')->insert($_POST);
			if($positionId){
				return show(1,'新增成功',$positionId);
			}
			return show(0,'新增失败',$positionId);
		}else{
			$this->display();
		}
	}

	public function save($data){
		$positionId = $data['id']; 
		unset($data['id']);
		try{
			$id = D('Position')->updatePositionById($positionId,$data);
			if($id === false){
				return show(0,'更新失败');
			}
			return show(1,'更新成功');
		}catch(Exception $e){
			return show(0,$e->getmessage());
		}
	}

	public function edit(){
		$id = $_GET['id'];
		if(!$id || !is_numeric($id)){
			return 0;
		}
		$position = D('Position')->find($id);
		$this->assign('position',$position);
		$this->display();
	}

	public function setStatus(){
		$data = array(
			'id'=>intval($_POST['id']),
			'status'=>intval($_POST['status']),
		);
		parent::setStatus($data,'Position');
	}
}