<?php
namespace Test\Controller;
use Think\Controller;

class JqueryController extends Controller{
	  
	public function Jquery(){
		$mydatabase = D(MYDATABASE);
		//$nbateam = D(NBA_TEAM);
		//$data = $mydatabase->get_all_information();
		//$datateam = $nbateam->get_team_information();
		
		$count = $mydatabase->count(); // 查询满足要求的总记录数
		$rollPage = 5; //每页显示的条数
		$Page = new \Think\Page($count,$rollPage); // 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页');
		$Page->lastSuffix = false; //最后一页不显示为总页数
		$Page->setConfig('first','首页');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('last','末页');
		$Page->setConfig('theme','%FIRST%%UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();// 分页显示输出
		$limit = $Page->firstRow.','.$Page->listRows;
		$data = $mydatabase->limit($limit)->select();
		$this->assign("data",$data);
		$this->assign('page',$show);// 赋值分页输出
		
		
		//$this->assign("datateam",$datateam);
		$target = "Jquery/JqueryHtml";
		$this->display($target);
	}
	
	public function InputData(){
	    $time = I("time","","htmlspecialchars");
		$site = I("site","","htmlspecialchars");
		$mission = I("mission","","htmlspecialchars");
		//$time = "12:00:00,13:00:00";
		$time_ = explode(",",$time);
		$site_ = explode(",",$site);
		$mission_ = explode(",",$mission);
		$length = count($time_);
		$mydatabase = D(MYDATABASE);
		for($i=0;$i<$length;$i++){
			$values[MYID] = uuid();
			$values[TIME] = $time_[$i];
			$values[SITE] = $site_[$i];
			$values[MISSION] = $mission_[$i];
			$mydatabase->add($values);
		}
	}
	
	public function DeleteData(){
		$Id = I("Id","","htmlspecialchars");
		$mydatabase = D(MYDATABASE); 
		$where = array(MYID => $Id);
		$mydatabase->where($where)->delete();
	}
	
	public function InputInfor(){
		$Name = I("Name","","htmlspecialchars");
		$Logo = I("Logo","","htmlspecialchars");
		$LLogo = "http://localhost/Think/Uploads/Jquery/".$Logo.".png";
		$Id = uuid();
		$Values[NBA_ID] = $Id;
		$Values[NBA_NAME] = $Name;
		$Values[NBA_LOGO] = $LLogo;
		$nbateam = D(NBA_TEAM);
		$nbateam->add($Values);
	}
	
	//  Ip地址查询
	public function GetIpLocation(){
		header("Content-type: text/html; charset=utf-8");
		$ip_now = $_SERVER["REMOTE_ADDR"];
		$ip_now = "10.100.25.234";
		$Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
		$location = $Ip->getlocation($ip_now); // 获取某个IP地址所在的位置		
		dump($location);
		/*
			    $location['ip'] // IP地址
                $location['beginip'] // 用户IP所在范围的开始地址
                $location['endip'] // 用户IP所在范围的结束地址
                $location['country'] // 所在国家或者地区
                $location['area'] // 所在区域

		  */
	}
	
	// 分页
	public function Paging(){
		header("Content-type:text/html;charset=utf-8");
		import('ORG.Util.Page'); // 导入分页类
		$nbateam = D(NBA_TEAM);
		$count = $nbateam->count(); // 查询满足要求的总记录数
		$rollPage = 2; //每页显示的条数
		$Page = new \Think\Page($count,$rollPage); // 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页');
		$Page->lastSuffix = false; //最后一页不显示为总页数
		$Page->setConfig('first','首页');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('last','末页');
		$Page->setConfig('theme','%FIRST%%UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();// 分页显示输出
		$limit = $Page->firstRow.','.$Page->listRows;
		$field = array(NBA_ID,NBA_NAME,NBA_LOGO,NBA_PARTITION,NBA_ALLIANCE);
		$list = $nbateam->limit($limit)->field($field)->select();
		$this->assign("list",$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$target = "Jquery/Paging";
		$this->display($target);
		//dump($list);
	}
	
	// php操作xml文档
	public function PhpToXml(){
		header("Content-type:text/html;charset=utf-8");
		$path = $_SERVER["DOCUMENT_ROOT"].'/Think/Uploads/Content/content.xml';
		$data = simplexml_load_file($path);
		$content = json_decode(json_encode($data),TRUE);  // PHP读取xml文档,并转换成array类型操作
		$count = count($content[SUBCONTENT]);
		$subcont = $content[SUBCONTENT];
		send_content_to_file("大家好","1234","text","457");  // PHP把内容保存为xml文档
		for($i=0;$i<$count;$i++){
			$FromUserName = $subcont[$i][FROMUSERTIME];
			$CreateTime = $subcont[$i][CREATTIME];
			$MsgType = $subcont[$i][MSGTYPE];
			$Content = $subcont[$i][CONTENT];
		}
		dump($FromUserName);
		//dump($count);
		//dump($content);
	}
}
?>