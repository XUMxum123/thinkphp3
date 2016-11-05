
<?php
   define('FROMUSERNAME',     'FromUserName');
   define('CREATETIME',     'CreateTime');
   define('MSGTYPE',     'MsgType');
   define('PICURL',     'PicUrl');
   define('CONTENT',     'Content');
   define('SUBCONTENT',     'subcontent'); 
   define('SUBREPLY',     'SubReply'); 
   define('ACCESSTOKEN',     'AccessToken'); 
   define('MEDIAID',     'MediaId'); 
   define('HOME_PAGE', 'http://localhost/Thinkphp');
   
   
$GLOBALS['qqface_maps']=array(
 "/::)", "/::~", "/::B", "/::|", "/:8-)", "/::<", "/::$", "/::X", "/::Z", "/::'(", "/::-|", "/::@", "/::P", "/::D", "/::O", "/::(", "/::+", "/:--b", "/::Q", "/::T", "/:,@P", "/:,@-D", "/::d", "/:,@o", "/::g", "/:|-)", "/::!", "/::L", "/::>", "/::,@", "/:,@f", "/::-S", "/:?", "/:,@x", "/:,@@", "/::8", "/:,@!", "/:!!!", "/:xx", "/:bye", "/:wipe", "/:dig", "/:handclap", "/:&-(", "/:B-)", "/:<@", "/:@>", "/::-O", "/:>-|", "/:P-(", "/::'|", "/:X-)", "/::*", "/:@x", "/:8*", "/:pd", "/:<W>", "/:beer", "/:basketb", "/:oo", "/:coffee", "/:eat", "/:pig", "/:rose", "/:fade", "/:showlove", "/:heart", "/:break", "/:cake", "/:li", "/:bome", "/:kn", "/:footb", "/:ladybug", "/:shit", "/:moon", "/:sun", "/:gift", "/:hug", "/:strong", "/:weak", "/:share", "/:v", "/:@)", "/:jj", "/:@@", "/:bad", "/:lvu", "/:no", "/:ok", "/:love", "/:<L>", "/:jump", "/:shake", "/:<O>", "/:circle", "/:kotow", "/:turn", "/:skip", "/:oY");

function qqface_convert_html($text){	
	return str_replace( $GLOBALS['qqface_maps'],array_map("add_img_label", array_keys($GLOBALS['qqface_maps']) ),htmlspecialchars_decode($text, ENT_QUOTES) );
}

function add_img_label($v){
	return '<img src="https://res.wx.qq.com/mpres/htmledition/images/icon/emotion/'.$v.'.gif" width="24" height="24">';
}

function downloadweixnfile($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER,0);  
    curl_setopt($ch, CURLOPT_NOBODY,0);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
    $package = curl_exec($ch);
    $httpinfo = curl_getinfo($ch);
    curl_close($ch);
    return array_merge(array("body"=>$package),array("header"=>$httpinfo));
}



/**
 * Add by xumeng
 * 发送内容到指定的文件,并保存(xml)
 * @param type $content
 * @param type $openid
 * @param type $msgtype
 * @param type $creatime
 */
function send_content_to_file($content, $openid, $msgtype,$creatime){
	$path = $_SERVER["DOCUMENT_ROOT"].'/Think/uploads/Content/content.xml';
	$maincontent = new DOMDocument();
	$data = $maincontent->load($path);
	$contentElements = $maincontent->getElementsByTagName("subcontent");

	$newcontent = $maincontent->createElement("subcontent");

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
	$parent = $maincontent->getElementsByTagName("maincontent")->item(0);
	$maincontent->save($path);  // save
	//	if($conlenght>50){
	//		for($i=1;$i<6;$i++){
	//			$element = $contentElements->item($i);
	//			$parent->removeChild($element);
	//			$maincontent->save($path);
	//			}
	//		}
}


?>