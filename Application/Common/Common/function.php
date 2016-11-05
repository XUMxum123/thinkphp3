<?php
/*
 * common function
 * @author xumeng
 * @time 2016.04.25
 * */

/*    nbateam table
 */
define("DB_NBATEAM_TAB", "nbateam");
define("DB_NBATEAM_ID", "Id");
define("DB_NBATEAM_NAME", "Name");
define("DB_NBATEAM_LOGO", "Logo");
define("DB_NBATEAM_WIN", "Win");
define("DB_NBATEAM_LOSE", "Lose");
define("DB_NBATEAM_RANK", "Rank");
define("DB_NBATEAM_ALLIANCE", "Alliance");
define("DB_NBATEAM_PLAYOFFS", "Playoffs");
define("DB_NBATEAM_PARTITION", "Partition");



/** Generates an UUID
 * @param string  an optional prefix
 * @return string  the formatted uuid
 */
function uuid($prefix = ''){
	$chars = md5(uniqid(mt_rand(), true));
	$uuid  = substr($chars,0,8);
	$uuid .= substr($chars,8,4);
	$uuid .= substr($chars,12,4);
	$uuid .= substr($chars,16,4);
	$uuid .= substr($chars,20,12);
	return $prefix.$uuid;
}

/**
 * Add by xumeng
 * 发送内容到指定的文件,并保存(xml)
 * @param type text $content
 * @param type string $openid
 * @param type string $msgtype
 * @param type time $creatime
 */
function send_content_to_file($content, $openid, $msgtype,$creatime){
	$path = $_SERVER["DOCUMENT_ROOT"].'/Think/uploads/Content/content.xml';
	$maincontent = new DOMDocument();
	$data = $maincontent->load($path);
	$contentElements = $maincontent->getElementsByTagName("Subcontent");

	$newcontent = $maincontent->createElement("Subcontent");

	//openid的保存
	$FromUserName = $maincontent->createElement("FromUserName");
	$FromUserName->nodeValue = $openid;
	$newcontent->appendChild($FromUserName);

	//创建时间的保存
	$CreateTime = $maincontent->createElement("CreateTime");
	$CreateTime->nodeValue = $creatime;
	$newcontent->appendChild($CreateTime);

	//消息类型保存
	$MsgType = $maincontent->createElement("MsgType");
	$MsgType->nodeValue = $msgtype;
	$newcontent->appendChild($MsgType);

	//消息内容保存
	if($msgtype == 'text'){  //文本
		$Content = $maincontent->createElement("Content");
		$Content->nodeValue = $content;
		$newcontent->appendChild($Content);
	}elseif ($msgtype == 'image') {  //图片
		$PicUrl = $maincontent->createElement("PicUrl");
		$PicUrl->nodeValue = $content;
		$newcontent->appendChild($PicUrl);
	}

	$maincontent->documentElement->appendChild($newcontent);
	$maincontent->save($path);

	$conlenght = $contentElements->length;
	$parent = $maincontent->getElementsByTagName("Maincontent")->item(0);
	$maincontent->save($path);  // save
	//	if($conlenght>50){ //delete
	//		for($i=1;$i<6;$i++){
	//			$element = $contentElements->item($i);
	//			$parent->removeChild($element);
	//			$maincontent->save($path);
	//			}
	//		}
}