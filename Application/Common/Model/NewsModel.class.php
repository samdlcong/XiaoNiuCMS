<?php
class NewsModel extends Model{
	private $_db = '';
	public function __construct(){
		$this->_db = M('news');
	}
	public function insert($data=array()){
		
	}
}