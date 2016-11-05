<?php
namespace Content\Controller;
use Think\Controller;

class ContentController extends Controller {
       /*
       public function MainShow(){
           	header("Content-type: text/html; charset=utf-8");
                $path = $_SERVER["DOCUMENT_ROOT"].'/uploads/Content/content.xml';
		$data = simplexml_load_file($path);
		$array = json_decode(json_encode($data),TRUE);
                $content = $array[SUBCONTENT];
		$count = count($content); 
                $userlist = D(DB_USER_TAB);
                for($i=0;$i<$count;$i++){
                    $content[$i][CREATETIME] =  date("Y-m-d H:i:s",$content[$i][CREATETIME]);
                    $userinfo = $userlist->clubdetails_get_userinfo_by_openid($content[$i][FROMUSERNAME]);
                    $content[$i][DB_USER_WECHATNICKNAME] = $userinfo[DB_USER_WECHATNICKNAME];
                    $content[$i][DB_USER_REALNAME] = $userinfo[DB_USER_REALNAME];
                    if($userinfo[DB_USER_HEADIMGURL] == ""){
                        $content[$i][DB_USER_HEADIMGURL] = HOME_PAGE."/Public/Content/images/cat.jpg";
                    }else{
                        $content[$i][DB_USER_HEADIMGURL] = $userinfo[DB_USER_HEADIMGURL];
                    }
                    
                }
                $this->assign("contents",$content);
           	$target = "Content/MainShow";
                $this->display($target);
       }
     */
       public function Show(){
                header("Content-type: text/html; charset=utf-8");
                //$path = $_SERVER["DOCUMENT_ROOT"].'/Public/Bulletin/test/123.txt';
                //file_put_contents($path, "123456");
                //视频
                //$access_token = "OdhTh96-vFmhHNSkxdx9T_EuQ_wlaglrzASi5NkVpAL65nNukpS9iwdpdsRq-a2ZW55XEGCugjZgYuanv8p-YIzP_Nrd2CirWSHTfHcyy6k";
                //$media_id = "GLmbW3RCGDXTK6j4C-88SNKmmF6PFik6n-7HuhP8QaPFinIyKRe7i3YqBGqB7BVn";
                //图片
                //$access_token = "M9hpLfoYdeSKbE-6_HWXrvWsvt51XaoBM71RFAMUzEkLrux9DgJvubRNFEeZoUpNDwlKI5XjKxomWuqoIGdK0Zo_YXBnSxPJ-HVMANVGYQo";
                //$media_id = "Z2Ia96c52ZvixdwOwh-Mq5XF9JszdeJNjH7c8Vefj1cWrcolnDN4Q_74ZvF2WEll";
                //$url = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$access_token."&media_id=".$media_id;
                //$fileinfo = downloadweixnfile($url);
                //dump($fileinfo);
                //$content = "keeping/::'(/::</::Q";
                //$html = qqface_convert_html($content);
                //$this->assign("html",$html);
                $path = $_SERVER["DOCUMENT_ROOT"].'/Thinkphp/uploads/Content/reply.xml';
                $data = simplexml_load_file($path);
		$reply = json_decode(json_encode($data),TRUE);
                $count = count($reply[SUBREPLY]);               
                $replyarray = array();
                if($count>1){
                    for($i=1;$i<$count;$i++){
                        $msgtype = $reply[SUBREPLY][$i][MSGTYPE];
                        if(($msgtype == "shortvideo")||($msgtype == "voice")){ //语音和视频
                             $access_token = $reply[SUBREPLY][$i][ACCESSTOKEN];
                             $media_id = $reply[SUBREPLY][$i][MEDIAID];
                             $url = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$access_token."&media_id=".$media_id;
                             $replyarray[$i] = $url;
                         }elseif($msgtype == "text"){ //文字和表情
                            
                         }elseif($msgtype == "image"){ //图像
                            
                         }elseif($msgtype == 'location'){ //位置
                            
                         }
                    }
                }
                $this->assign("replyarray",$replyarray);
           	$target = "Content/Show";
                //dump($replyarray);
                $this->display($target);
       }  
        
        public function Subscribe(){
            	header("Content-type: text/html; charset=utf-8");
                $path = $_SERVER["DOCUMENT_ROOT"].'/Thinkphp/uploads/Content/subscribe.xml';
                $data = simplexml_load_file($path);
		$content = json_decode(json_encode($data),TRUE);
                $count = count($content[FROMUSERNAME]);
                $userdata = array();
                $userlist = D(DB_USER_TAB);
                for($i=0;$i<$count;$i++){
                    $userinfo = $userlist->clubdetails_get_userinfo_by_openid($content[FROMUSERNAME][$i]);
                    $userdata[$i][DB_USER_NICKNAME] = $userinfo[DB_USER_NICKNAME];
                    $userdata[$i][DB_USER_REALNAME] = $userinfo[DB_USER_REALNAME];
                }
                //dump($userdata);
                $this->assign("userdata",$userdata);
		$target = "Content/Subscribe";
                $this->display($target);
        }
    
	public function ShowContent(){
		header("Content-type: text/html; charset=utf-8");
/*                 $path = $_SERVER["DOCUMENT_ROOT"].'/Thinkphp/uploads/Content/content.xml';
		$data = simplexml_load_file($path);
		$array = json_decode(json_encode($data),TRUE);
                $content = $array[SUBCONTENT];
		$count = count($content); 
                $record = 10;//要显示的几条记录
                $userlist = D(DB_USER_TAB);
                if($count>1){
                  for($i=1;$i<$count;$i++){
                    $content[$i][CREATETIME] =  date("Y-m-d H:i:s",$content[$i][CREATETIME]);
                    $userinfo = $userlist->clubdetails_get_userinfo_by_openid($content[$i][FROMUSERNAME]);
                    $content[$i][DB_USER_NICKNAME] = $userinfo[DB_USER_NICKNAME];
                    $content[$i][DB_USER_REALNAME] = $userinfo[DB_USER_REALNAME];
                    if($userinfo[DB_USER_HEADIMGURL] == ""){
                        $content[$i][DB_USER_HEADIMGURL] = HOME_PAGE."/Public/Content/images/cat.jpg";
                    }else{
                        $content[$i][DB_USER_HEADIMGURL] = $userinfo[DB_USER_HEADIMGURL];
                    }
                    if($content[$i][MSGTYPE] == "text"){
                        $content[$i][CONTENT] = $content[$i][CONTENT];
                       //$contenthtml = qqface_convert_html($content[$i][CONTENT]); 
                       //$content[$i][CONTENT] = $contenthtml;
                    }
                  } 
                  $content = array_slice($content, 1); */
//                  if($count>$record){
//                    $flag = $count-$record;
//                    $content = array_slice($content, $flag ,$count);
//                  }
               /* } */
/*                 $this->assign("count",$count);
                $this->assign("contents",$content); */
                //   $target = "Content/MainShow";   
               // $target = "Content/WeiYa";   // one method
                $target = "Content/weiyacopy";   // two method
                $this->display($target);
		}
                
         //开始入口       
	public function MainContent(){
                $path = $_SERVER["DOCUMENT_ROOT"].'/Think/uploads/Content/content.xml';
		$data = simplexml_load_file($path);
		$array = json_decode(json_encode($data),TRUE);
                $content = $array[SUBCONTENT];
		$countcontent = count($content); 
                
                $path_scribe = $_SERVER["DOCUMENT_ROOT"].'/Think/uploads/Content/subscribe.xml';
                $data_scribe = simplexml_load_file($path_scribe);
		$content_scribe = json_decode(json_encode($data_scribe),TRUE);
                $count_scribe = count($content_scribe[FROMUSERNAME]);
                $this->assign("countscribe",$count_scribe);
                $this->assign("countcontent",($countcontent-1));
	        //dump(__PUBLIC__);
                $target = "Content/MainContent";
               $this->display($target);
		}
		
		public function GuanJieWeiYa(){
			$path = $_SERVER["DOCUMENT_ROOT"].'/Think/uploads/Content/content.xml';
			$data = simplexml_load_file($path);
			$array = json_decode(json_encode($data),TRUE);
			$content = $array[SUBCONTENT];
			$countcontent = count($content);
			$this->assign("countcontent",($countcontent-1));
			$target = "Content/weiyacopy"; 
			$this->display($target);
		}
		
        public function TotalContent(){
                $path = $_SERVER["DOCUMENT_ROOT"].'/Think/uploads/Content/content.xml';
		$data = simplexml_load_file($path);
		$array = json_decode(json_encode($data),TRUE);
                $content = $array[SUBCONTENT];
		$countcontent = count($content); 
                $this->assign("countcontent",$countcontent);
                $datacontent = array();
                $userlist = D(DB_USER_TAB);
                $userinfo = $userlist->clubdetails_get_userinfo_by_openid($content[($countcontent-1)][FROMUSERNAME]);
                $datacontent[DB_USER_NICKNAME] = $userinfo[DB_USER_NICKNAME];
                $this->assign("datacontent",$datacontent);
                //dump($datacontent);                
                $target = "Content/TotalContent";
                $this->display($target);
        }        
	public function InputContent(){
		$target = "Content/InputContent";
        $this->display($target);
		}
	public function SaveContent(){
		$target = "Content/SaveContent";
        $this->display($target);
		}	
		
	public function SaveContentByWeiXin(){
			$content = I("content","这是真的吗","htmlspecialchars");
			$openid = "12345";
			$msgtype = "text";
			$creatime = "56789";
			send_content_to_file($content, $openid, $msgtype,$creatime);
			//dump($content);
			//$this->display($target);
		}	
                
                
        //下面是个人学习才写的方法，纯属学习       
        public function StudyTest(){
                $t1 = microtime(true);
                $user = "admin";
                $pass = "123456";
                $curlPost = "user=$user&pass=$pass";
                $ch = curl_init(); //初始化一个CURL对象
                curl_setopt($ch, CURLOPT_URL, "http://wechat.tpvaoc.com/employ.php/Content/Content/Login");
                //设置你所需要抓取的URL
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
                //设置curl参数，要求结果是否输出到屏幕上，为true的时候是不返回到网页中
                //假设上面的0换成1的话，那么接下来的$data就需要echo一下。
                curl_setopt($ch, CURLOPT_POST, 1);
                //post提交
                curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
                $data = curl_exec($ch);
                //运行curl,请求网页。
                curl_close($ch);
                sleep(5);
                $t2 = microtime(true);
                $t = round($t2-$t1,3);
                dump($t);
                //$target = "Content/StudyTest";
                //$this->display($target);
               }
         public function Login(){
             $user = I("user","","htmlspecialchars");
             $pass = I("pass","","htmlspecialchars");
             $this->assign("user",$user);
             $this->assign("pass",$pass);
             $target = "Content/Login";
             $this->display($target);
         }      
	}