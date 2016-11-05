<?php
namespace Test\Controller;
use Think\Controller;

class UpDownController extends Controller {
	 
	public function MainPage(){
		$target = "UpDown/MainPage";
		$this->display($target);
	}
	
	public function Upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		//$upload->exts = array('');// 设置附件上传类型
		//$upload->thumb = true;// 把图片生成缩略图(只对图片有效)
		$upload->rootPath = "Uploads/UpDown/Upload/"; //文件保存根目录
		$upload->saveName = '';// 上传的文件保持原命名
		$upload->replace = "true";// 有重复文件名字，直接替换
		$upload->autoSub = false; // 把上传的文件夹后的日期去除
		$info = $upload->upload();
		$errInfo = "";
        if(!$info){
        	$errInfo = "error!";
        }else{
        	$errInfo = "";
        }
/*		if(!$info){  // 上传错误提示错误信息
			$this->error($upload->getError());
		}else{   // 上传成功
			$this->success('上传成功！');
		}
 		foreach($info as $file){
			echo $file['savepath'].$file['name'];
		} */
        $documentdir = $_SERVER['DOCUMENT_ROOT'];
        $root = ltrim(__ROOT__,"/");   //可能需要改变
        $filepath = $documentdir.$root."/Uploads/UpDown/Upload/".$info["file"]["name"]; //详细文件位置和信息
        //$filename = basename($filepath);
		//dump($filepath);
        //import('ORG.Net.Http');
        //Http::download($filepath);
/*         $http = new \Org\Net\Http();
        $http->download($filepath); */
		$target = "UpDown/MainPage";
		$this->display($target);
	}
	
	public function Download(){
		//$filename = I("filename","","htmlspecialchars"); 
		//--- 正常情况下是获取到要下载文件的名字路径，如
		   // $filename = "E:/weixinweixin/wamp/www/Think/Uploads/UpDown/Upload/IMG_0595.JPG";
		$filename = "E:/weixinweixin/wamp/www/Think/Uploads/UpDown/Upload/IMG_0595.JPG";
		//$filename = "http://localhost/Think/Uploads/UpDown/Upload/IMG_0595.JPG";
        $http = new \Org\Net\Http();
        //$down = $http->curlDownload('https://www.baidu.com/img/bd_logo1.png','a.png');
        $http->download($filename);  // fsockopenDownload函数的用途注意
        //$target = "UpDown/Download";
        //$this->display($target);
	}
	
	public function Download_copy(){
		//$filepath = I("filepath","","htmlspecialchars");
		$filepath = "E:/weixinweixin/wamp/www/Think/Uploads/UpDown/Upload/IMG_0595.JPG";
		if(!empty($filepath) && !is_null($filepath)){
			$filename = basename($filepath);
			$file = fopen($filepath, "r");
			header("Content-type:application/octet-stream");
			header("Accept-ranges:bytes");
			header("Accept-length:".filesize($filepath));
			header("Content-Disposition:attachment;filename=".$filename);
			echo fread($file,filesize($filepath));
			fclose($file);
			exit;
		}
	}

}

?>