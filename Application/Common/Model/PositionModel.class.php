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

	}

	public function getNormalPositions(){
		$conditions = array('status'=>1);
		$list = $this ->_db->where($conditions)->order('id')->select();
		return $list;
	}
}