<?php
namespace Common\Model;
use Think\Model;

class PositionModel extends Model{
	private $_db = '';

	public function __construct(){
		$this->_db = M('position');
	}

	public function select(){

	}

	public function find($id){
		return $this->_db->where('id='.$id)->find();
	}

	public function getNormalPositions(){
		$conditions = array('status'=>array('neq',-1));
		$list = $this->_db->where($conditions)->order('id')->select();
		return $list;
	}

	public function getPositionCount($data=array()){
		return $this->_db->where($data)->count();
	}

	public function insert($data=array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		$data['create_time']=time();
		return $this->_db->add($data);
	}
	
	public function updatePositionById($id,$data){
		if(!$id || !is_numeric($id)){
			throw_exception('ID不合法');
		}
		if(!$data || !is_array($data)){
			throw_exception('数据不合法');
		}
		$data['update_time']=time();
		return $this->_db->where('id='.$id)->save($data);
	}

	public function updateStatusById($id,$status){
		if(!$id || !is_numeric($id)){
			throw_exception("ID不合法");
		}
		if(!is_numeric($status)){
			throw_exception("status不能为非数字");
		}
		$data['status']= $status;
		return $this->_db->where('id='.$id)->save($data);
	}
}