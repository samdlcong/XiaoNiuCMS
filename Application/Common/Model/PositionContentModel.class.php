<?php
namespace Common\Model;
use Think\Model;

class PositionContentModel extends CommonModel{
	private _db = '';
	public function __construct(){
		$this->_db = M("postion_content");
	}
	public function indert(){
		
	}
}
