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

		if($_POST){
			//print_r($_POST);exit();
			if(!$_POST['username']||$_POST['username']==''){
				return show(0,'用户名不能为空');
			}
			if(!$_POST['password']||$_POST['password']==''){
				return show(0,'密码不能为空');
			}
			
			$res = D('Admin')->insert($_POST);
			if($res){
				return show(1,'添加成功');
			}
			return show(0,'添加失败');
		}else{

			$this->display();
		}
	}

	public function setStatus(){
		$data = array(
			'id'=>$_POST['id'],
			'status'=>$_POST['status'],
		);
		parent::setStatus($data,'Admin');
	}
}