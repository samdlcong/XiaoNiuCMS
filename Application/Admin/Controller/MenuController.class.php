<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends CommonController{
	public function index(){
		$data = array();
		if(isset($_REQUEST['type'])&&in_array($_REQUEST['type'], array(0,1))){
			$data['type']= intval($_REQUEST['type']);
			$this->assign('type',$data['type']);
		}else{
			$this->assign('type',-1);
		}

		$page = $_REQUEST['p']?$_REQUEST['p']:1;
		$pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:3;
		$menus = D("Menu")->getMenus($data,$page,$pageSize);

		$menuCount=D("Menu")->getMenusCount($data);
		//dump($menus); exit();
		$res = new \Think\Page($menuCount,$pageSize);
		$pageRes =$res->show();
		$this->assign('pageRes',$pageRes);
		$this->assign('menus',$menus);
		$this->display();
	}

	public function add(){
		if($_POST){
			if(!isset($_POST['name']) || !$_POST['name']){
				return show(0,'菜单名不能为空');
			}
			if(!isset($_POST['m'])|| !$_POST['m']){
				return show(0,'模块名不能为空');
			}
			if(!isset($_POST['c'])||!$_POST['c']){
				return show(0,'控制器不能为空');
			}
			if(!isset($_POST['f'])||!$_POST['f']){
				return show(0,'方法名不能为空');
			}
			$menuId = D("Menu")->insert($_POST);
			//echo  $menuId;exit();
			if($menuId){
				
				return show(1,'新增成功',$menuId);
			}
			return show(0,'新增失败',$menuId);
		}else{
			$this->display();
		}		
	}

	
}