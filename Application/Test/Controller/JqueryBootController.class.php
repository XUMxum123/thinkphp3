<?php
namespace Test\Controller;
use Think\Controller;

class JqueryBootController extends Controller {
	 
	public function Index(){
		$target = "JqueryBoot/index";
		$this->display($target);
	}
	
	public function LoadData(){
		
	}
	
}

?>