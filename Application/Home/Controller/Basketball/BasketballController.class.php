<?php
namespace Home\Controller\Basketball;
use Think\Controller;
class BasketballController extends Controller {
    public function basketball(){
		$time = D("db");
		//$nowtime = $time->_get_now_time();
		$arr = array("123"=>"123","国家"=>"国家","php"=>"php","12ph"=>"12ph");
		$arr1 = array(
		  "title"=>array("title1"=>"大家","pic2"=>"很好PHP","title3"=>"一家","txt4"=>"好人"),
		  "pic"=>array("pic1"=>"fgh","txt"=>"23pm","title"=>"大家","pic"=>"很好PHP"),
		  "txt2"=>array("title"=>"大家","txt"=>"很好PHP","txt6"=>"一家","pic4"=>"好人"),
		  "txt4"=>array("txt2"=>"fgh","title3"=>"23pm","pic3"=>"大家","txt5"=>"很好PHP")
		);
		$this->assign("name","亚洲杯B组队伍");
		$this->assign("arr",$arr);
		$this->assign("arr1",$arr1);
		$this->assign("title","title");
		$this->assign("txt","txt");
		$this->assign("pic","pic");
		$this->assign("times",$nowtime);
        $this->display(showdetail);
		//$this->show("<div style=\"height:20px;background-color:#F00\">亚洲杯比赛</div>");
    }
}