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

	public function personal(){
		$res=$this->getLoginUser();
		$user = D('Admin')->getAdminByAdminId($res['admin_id']);
		$this->assign('vo',$user);
		$this->display();
	}

	public function save(){
		$user = $this->getLoginUser();
		if(!$user){
			return show(0,'');
		}
		$data['realname']=$_POST['realname'];
		$data['email']=$_POST['email'];
		try{
			$id = D('Admin')->updateByAdminId($user['admin_id'],$data);
			if($id ===false){
				return show(0,'设置失败');
			}
			return show(1,'设置成功');
		}catch(Exception $e){
			return show(0,$e->getMessage());
		}
	}
}