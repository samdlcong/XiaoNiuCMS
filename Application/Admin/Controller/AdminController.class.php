<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends CommonController{
	public function index(){
		$admins = D('Admin')->getAdmins();
		//print_r($admins);exit;
		$this->assign('admins',$admins);
		$this->display();
	}

	public function add(){
		$this->display();
	}

	public function setStatus(){
		$data = array(
			'id'=>$_POST['id'],
			'status'=>$_POST['status'],
		);
		parent::setStatus($data,'Admin');
	}
}