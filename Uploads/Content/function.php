<?php
    header("Content-type: text/html; charset=utf-8");
    
    function send_test_xml($postObj){
        $Path = $_SERVER["DOCUMENT_ROOT"].'/uploads/Content/log.xml';
        file_put_contents($Path, $postObj);
    }
    
    /**   main method
      * Add by xumeng
      * 发送内容到指定的文件,并保存(xml)
      * @param type $msgtype
      * @param type $array
      */ 
     function send_reply_to_xml($msgtype,$array){
        $Path = $_SERVER["DOCUMENT_ROOT"].'/uploads/Content/reply.xml';
        $MainReply = new DOMDocument();
        $data = $MainReply->load($Path);
        $SubReply = $MainReply->createElement("SubReply");
        
        if($msgtype == "shortvideo"){
            $MsgType = $MainReply->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubReply->appendChild($MsgType);
            
            $access_token = $array["token"];
            $AccessToken = $MainReply->createElement("AccessToken");
            $AccessToken->nodeValue = $access_token;
            $SubReply->appendChild($AccessToken);
           
            $media_id = $array["videoId"];
            $MediaId = $MainReply->createElement("MediaId");
            $MediaId->nodeValue = $media_id;
            $SubReply->appendChild($MediaId); 
        }elseif($msgtype == "voice"){
            $MsgType = $MainReply->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubReply->appendChild($MsgType);
            
            $access_token = $array["token"];
            $AccessToken = $MainReply->createElement("AccessToken");
            $AccessToken->nodeValue = $access_token;
            $SubReply->appendChild($AccessToken);
           
            $media_id = $array["voiceId"];
            $MediaId = $MainReply->createElement("MediaId");
            $MediaId->nodeValue = $media_id;
            $SubReply->appendChild($MediaId); 
        }elseif($msgtype == "location"){
            $MsgType = $MainReply->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubReply->appendChild($MsgType);
            
            $Openid = $array["FromUserName"];
            $FromUserName = $MainReply->createElement("FromUserName");
            $FromUserName->nodeValue = $Openid;
            $SubReply->appendChild($FromUserName);
            
            $Location_X_value = $array["Location_X"];
            $Location_X = $MainReply->createElement("Location_X");
            $Location_X->nodeValue = $Location_X_value;
            $SubReply->appendChild($Location_X);
            
            $Location_Y_value = $array["Location_Y"];
            $Location_Y = $MainReply->createElement("Location_Y");
            $Location_Y->nodeValue = $Location_Y_value;
            $SubReply->appendChild($Location_Y);
            
            $Scale_value = $array["Scale"];
            $Scale = $MainReply->createElement("Scale");
            $Scale->nodeValue = $Scale_value;
            $SubReply->appendChild($Scale);
            
            $Label_value = $array["Label"];
            $Label = $MainReply->createElement("Label");
            $Label->nodeValue = $Label_value;
            $SubReply->appendChild($Label);
        }elseif($msgtype == "image"){
            $MsgType = $MainReply->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubReply->appendChild($MsgType);
            
            $Openid = $array["FromUserName"];
            $FromUserName = $MainReply->createElement("FromUserName");
            $FromUserName->nodeValue = $Openid;
            $SubReply->appendChild($FromUserName);
            
            $PicUrl_value = $array["PicUrl"];
            $PicUrl = $MainReply->createElement("PicUrl");
            $PicUrl->nodeValue = $PicUrl_value;
            $SubReply->appendChild($PicUrl);
            
            $CreateTime_value = $array["CreateTime"];
            $CreateTime = $MainReply->createElement("CreateTime");
            $CreateTime->nodeValue = $CreateTime_value;
            $SubReply->appendChild($CreateTime);
        }elseif($msgtype == "text"){
            $MsgType = $MainReply->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubReply->appendChild($MsgType);
            
            $Openid = $array["FromUserName"];
            $FromUserName = $MainReply->createElement("FromUserName");
            $FromUserName->nodeValue = $Openid;
            $SubReply->appendChild($FromUserName);
            
            $Content_value = $array["Content"];
            $Content = $MainReply->createElement("Content");
            $Content->nodeValue = $Content_value;
            $SubReply->appendChild($Content);
            
            $CreateTime_value = $array["CreateTime"];
            $CreateTime = $MainReply->createElement("CreateTime");
            $CreateTime->nodeValue = $CreateTime_value;
            $SubReply->appendChild($CreateTime);
        }
   
        $MainReply->documentElement->appendChild($SubReply);
	$MainReply->save($Path);

        $Sub = $MainReply->getElementsByTagName("SubReply");
        $Sublenght = $Sub->length;
	$Parent = $MainReply->getElementsByTagName("MainReply")->item(0);
	if($Sublenght>10){  //超过10条，删除前面的3条,第一条是标记，不能删除
	    for($i=1;$i<4;$i++){
		$Element = $Sub->item($i);
		$Parent->removeChild($Element);
		$MainReply->save($Path);
	    }
	}
    }
    
    
    /**   
      * Add by xumeng
      * 发送内容到指定的文件,并保存(xml)
      * @param type $openid
      */ 
     function send_subscribe_to_file($openid){
        $path = $_SERVER["DOCUMENT_ROOT"].'/uploads/Content/subscribe.xml';
        $subscribe = new DOMDocument();
        $data = $subscribe->load($path);
        $FromUserName = $subscribe->createElement("FromUserName");
        $FromUserName->nodeValue = $openid;
        $subscribe->documentElement->appendChild($FromUserName);
        $subscribe->save($path);
        $con = $subscribe->getElementsByTagName("FromUserName");
        $conlenght = $con->length;
	$parent = $subscribe->getElementsByTagName("subscribe")->item(0);
	if($conlenght>7){
		for($i=0;$i<3;$i++){
			$element = $con->item($i);
			$parent->removeChild($element);
			$subscribe->save($path);
			}
		}
    }
    
    

    
    
    /**   send_message_to_xml
      * Add by xumeng
      * 保存内容到指定的文件,并保存(xml)
      * @param type $msgtype
      * @param type $array
      */ 
 function send_message_to_xml($msgtype,$array){
        $Path = $_SERVER["DOCUMENT_ROOT"].'/uploads/Content/message.xml';
        $MainMessage = new DOMDocument();
        $data = $MainMessage->load($Path);
        $SubMessage = $MainMessage->createElement("SubMessage");
        
        if($msgtype == "shortvideo"){
            $MsgType = $MainMessage->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubMessage->appendChild($MsgType);
            
            $access_token = $array["token"];
            $AccessToken = $MainMessage->createElement("AccessToken");
            $AccessToken->nodeValue = $access_token;
            $SubMessage->appendChild($AccessToken);
           
            $media_id = $array["videoId"];
            $MediaId = $MainMessage->createElement("MediaId");
            $MediaId->nodeValue = $media_id;
            $SubMessage->appendChild($MediaId); 
        }elseif($msgtype == "voice"){
            $MsgType = $MainMessage->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubMessage->appendChild($MsgType);
            
            $access_token = $array["token"];
            $AccessToken = $MainMessage->createElement("AccessToken");
            $AccessToken->nodeValue = $access_token;
            $SubMessage->appendChild($AccessToken);
           
            $media_id = $array["voiceId"];
            $MediaId = $MainMessage->createElement("MediaId");
            $MediaId->nodeValue = $media_id;
            $SubMessage->appendChild($MediaId); 
        }elseif($msgtype == "location"){
            $MsgType = $MainMessage->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubMessage->appendChild($MsgType);
            
            $Openid = $array["FromUserName"];
            $FromUserName = $MainMessage->createElement("FromUserName");
            $FromUserName->nodeValue = $Openid;
            $SubMessage->appendChild($FromUserName);
            
            $Location_X_value = $array["Location_X"];
            $Location_X = $MainMessage->createElement("Location_X");
            $Location_X->nodeValue = $Location_X_value;
            $SubMessage->appendChild($Location_X);
            
            $Location_Y_value = $array["Location_Y"];
            $Location_Y = $MainMessage->createElement("Location_Y");
            $Location_Y->nodeValue = $Location_Y_value;
            $SubMessage->appendChild($Location_Y);
            
            $Scale_value = $array["Scale"];
            $Scale = $MainMessage->createElement("Scale");
            $Scale->nodeValue = $Scale_value;
            $SubMessage->appendChild($Scale);
            
            $Label_value = $array["Label"];
            $Label = $MainMessage->createElement("Label");
            $Label->nodeValue = $Label_value;
            $SubMessage->appendChild($Label);
        }elseif($msgtype == "image"){
            $MsgType = $MainMessage->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubMessage->appendChild($MsgType);
            
            $Openid = $array["FromUserName"];
            $FromUserName = $MainMessage->createElement("FromUserName");
            $FromUserName->nodeValue = $Openid;
            $SubMessage->appendChild($FromUserName);
            
            $PicUrl_value = $array["PicUrl"];
            $PicUrl = $MainMessage->createElement("PicUrl");
            $PicUrl->nodeValue = $PicUrl_value;
            $SubMessage->appendChild($PicUrl);
            
            $CreateTime_value = $array["CreateTime"];
            $CreateTime = $MainMessage->createElement("CreateTime");
            $CreateTime->nodeValue = $CreateTime_value;
            $SubMessage->appendChild($CreateTime);
        }elseif($msgtype == "text"){
            $MsgType = $MainMessage->createElement("MsgType");
            $MsgType->nodeValue = $msgtype;
            $SubMessage->appendChild($MsgType);
            
            $Openid = $array["FromUserName"];
            $FromUserName = $MainMessage->createElement("FromUserName");
            $FromUserName->nodeValue = $Openid;
            $SubMessage->appendChild($FromUserName);
            
            $Content_value = $array["Content"];
            $Content = $MainMessage->createElement("Content");
            $Content->nodeValue = $Content_value;
            $SubMessage->appendChild($Content);
            
            $CreateTime_value = $array["CreateTime"];
            $CreateTime = $MainMessage->createElement("CreateTime");
            $CreateTime->nodeValue = $CreateTime_value;
            $SubMessage->appendChild($CreateTime);
        }
   
        $MainMessage->documentElement->appendChild($SubMessage);
	$MainMessage->save($Path);

        $Sub = $MainMessage->getElementsByTagName("SubMessage");
        $Sublenght = $Sub->length;
	$Parent = $MainMessage->getElementsByTagName("MainMessage")->item(0);
	if($Sublenght>500){  //超过10条，删除前面的3条,第一条是标记，不能删除
	    for($i=1;$i<10;$i++){
		$Element = $Sub->item($i);
		$Parent->removeChild($Element);
		$MainMessage->save($Path);
	    }
	}
    }

    ?>
