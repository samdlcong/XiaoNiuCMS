<?php
namespace Common\Model;
use Think\Model;
class AdminModel extends Model{
	private $_db ='';
	public function __construct(){
		$this->_db = M('admin');
	}
	public function getAdminByUsername($username){
		$res = $this->_db->where('username="'.$username.'"')->find();
		return $res;
	}
	public function getAdmins(){
		$conds['status'] = array('neq',-1);
		return $res =$this->_db->where($conds)->select();
	}

	public function updateStatusById($id,$status){
		if(!$id || !is_numeric($id)){
			throw_exception('ID不合法');
		}
		if(!is_numeric($status)){
			throw_exception('status不能为非数字');
		}
		$data['status'] = $status;
		return $this->_db->where('admin_id='.$id)->save($data);
	}
}