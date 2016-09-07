<?php
namespace Common\Model;
use Think\Model;

class MenuModel extends Model{
	private $_db = '';
	public function __construct(){
		$this->_db = M('menu');
	}

	public function insert($data=array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		return $this->_db->add($data);
	}

	public function getMenus($data,$page,$pageSize=10){
		$data['status']=array('neq',-1);
		$offset = ($page-1)*$pageSize;
		$list =$this->_db->where($data)->order('listorder desc,menu_id desc')->limit($offset,$pageSize)->select();
		return $list;
	}
	public function getMenusCount($data=array()){
		$data['status']=array('neq',-1);
		return $this->_db->where($data)->count();
	}
	public function find($id){
		if(!$id || !is_numeric($id)){
			return array();
		}
		return $this->_db->where('menu_id='.$id)->find();
	}

	public function updateMenuByID($id,$data){
		if(!$id||!is_numeric($id)){
			throw_exception('ID不合法');
		}
		if(!$data ||!is_array($data)){
			throw_exception('更新数据不合法');
		}
		return $this->_db->where('menu_id='.$id)->save($data);
	}

	public function updateStatusById($id,$status){
		if(!is_numeric($id)||!$id){
			throw_exception("ID不合法");
		}
		if(!is_numeric($status)||!$status){
			throw_exception("状态不合法");
		}

		$data['status']=$status;
		return $this->_db->where('menu_id='.$id)->save($data);
	}

	public function updateListorderById($id,$listorder){
		if(!$id || !is_numeric($id)){
			throw_exception("ID不合法");
		}

		$data =array(
			'listorder'=>intval($listorder),
		);

		return $this->_db->where('menu_id ='.$id)->save($data);
	}

	public function getAdminMenus(){
		$data = array(
			'status'=>array('neq',-1),
			'type'=>1,
		);
		return $this->_db->where($data)->order('listorder desc,menu_id desc')->select();
	}

	public function getBarMenus(){
		if($_POST){
			if(!isset($_POST['title'])||!$_POST['title']){
				return show(0,'文章标题不存在');
			}
			if(!isset($_POST['small_title'])||!$_POST['small_title']){
				return show(0,'短标题不存在');
			}
			if(!isset($_POST['cat_id'])||!$_POST['cat_id']){
				return show(0,'文章栏目不存在');
			}
			if(!isset($_POST['keywords'])||$_POST['keywords']){
				return show(0,'关键词不存在');
			}
			if(!isset($_POST['content'])||$_POST['content']){
				return show(0,'content不存在');
			}
		}else{
			$data = array(
			'status'=>array('neq',-1),
			'type'=>0,
			);
			return $this->_db->where($data)->order('listorder desc,menu_id desc')->select();
		}
		
	}
}