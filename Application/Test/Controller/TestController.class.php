<?php
namespace Test\Controller;
use Think\Controller;

class TestController extends Controller {
	  
	public function Index(){
		$target = "Test/TestHtml";
		$this->display($target);
	}
	
	// review of verify  ---xumeng
	public function DisplayVerify(){ //显示验证码
		$target = "Test/DisplayVerify";
		$this->display($target);
	}
	
	public function GenerateVerify(){ //生成验证码
		$verify = new \Think\Verify();
		$verify->fontSize = 30;
		$verify->length   = 5;
		$verify->useNoise = false;
		$verify->fontttf = '5.ttf';
		$verify->useImgBg = true;
		//$verify->useZh = true;
		$verify->entry();
	}
	
	public function CheckVerify($code = '',$id = ''){ //验证验证码
		header('Content-type:text/html;charset=utf-8');
		$code = I("verify","","htmlspecialchars");
		$verify = new \Think\Verify();
		if($verify->check($code, $id)){
			$result = "正确";
		}else{
			$result = "错误";
		}
		$this->assign("result",$result);
		$target = "Test/VerifyResult";
		$this->display($target);
	}
}
?>