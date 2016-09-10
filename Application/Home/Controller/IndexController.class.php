<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index($type=""){
        //获取首页大图数据
        $topPicNews = D("PositionContent")->select(array('status'=>1,'position_id'=>2),1);
        //获取首页3小图推荐
        $topSmallNews = D("PositionContent")->select(array('status'=>1,'position_id'=>3),3);
        $listNews =D('News')->select(array('status'=>1,'thumb'=>array('neq','')),30);
        $advNews =D('PositionContent')->select(array('status'=>1,'position_id'=>5),2);
        $rankNews=$this->getRank();
        $this->assign('result',array(
        	'topPicNews'=>$topPicNews,
        	'topSmallNews'=>$topSmallNews,
        	'listNews'=>$listNews,
        	'advNews'=>$advNews,
        	'rankNews'=>$rankNews,
        	'catid'=>0,
        ));
        if($type="buildHtml"){
            $this->buildHtml('index',HTML_PATH,'Index/index');
        }else{
            $this->display();
        }
    }

    public function build_html(){
        $this->index('builtHtml');
        return show(1,'缓存生成成功');
    }

    public function crontab_build_html(){
        if(APP_CRONTAB != 1){
            die("the_file_must_exec_crontab");
        }
        $result= D("Basic")->select();
        if(!$result['cacheindex']){
            die('系统没有设置开启自动生成首页缓存的内容');
        }
        $this->index('builtHtml');
    }

}


