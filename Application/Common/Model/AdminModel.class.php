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

	public function insert($data=array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		$data['password'] = getMd5Password($data['password']);
		return $this->_db->add($data);
	}
	public function updateByAdminId($id,$data){
		if(!$id||!is_numeric($id)){
			throw_exception('ID不合法');
		}
		if(!$data || !is_array($data)){
			throw_exception('数据不合法');
		}
		return $this->_db->where('admin_id='.$id)->save($data);
	}
}