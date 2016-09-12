<?php
namespace Admin\Controller;
use Think\Controller;

class  CronController {
	public function dumpmysql(){
		$res = D("Basic")->select();
		if(!$res['dumpmysql']){
			die('系统没有设置开启自动备份数据库');
		}
		$shell = "mysqldump -u".C("DB_USSR").' -p'.C("DB_PWD").' '.C("DB_NAME")." > /tmp/cms".date(Ymd).'sql';
		exec($shell);
		return show(1,'数据库备份成功');
	}
}