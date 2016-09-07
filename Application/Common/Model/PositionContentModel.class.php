<?php
namespace Common\Model;
use Think\Model;

class PositionContentModel extends Model{
	private $_db = '';
	public function __construct(){
		$this->_db = M("position_content");
	}
	public function insert($data){
		return $this->_db->data($data)->add();
	}
	public function select($data=array(),$limit=0){
		if($data['title']){
			$data['title'] =array('like','%'.$data['title'].'%');	
		}
		$this->_db->where($data)->order('listorder desc,id desc');
		if($limit){
			$this->_db->limit($limit);
		}
		$list = $this->_db->select();
		return $list;
	}
	public function find($id){
		return $this->_db->where('id='.$id)->find();
	}

	public function updateById($id,$data){
		if(!$id || !is_numeric($id)){
			throw_exception('ID不合法');
		}
		if(!$data || !is_array($data)){
			throw_exception('数据不合法');
		}
		return $this->_db->where('id='.$id)->save($data);
	}

}
