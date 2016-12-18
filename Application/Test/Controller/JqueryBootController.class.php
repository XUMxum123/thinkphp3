<?php
namespace Test\Controller;
use Think\Controller;

class JqueryBootController extends Controller {
	 
	public function Index(){
		$target = "JqueryBoot/index";
		$this->display($target);
	}
	
	public function LoadData(){
		//$nbateam = D(DB_NBATEAM_TAB);
		//$dataNbateam = $nbateam->get_team_information();
		//$json = json_encode($dataNbateam);
		//var_dump($dataNbateam);
		$json = '{"current":1,"rowCount":4,"total":6,
				"rows":[{"Id":"1","Name":"a","Logo":"aa","Win":"11","Lose":"11","Rank":"11","Alliance":"11","Playoffs":"11","Partition":"11"},
		               {"Id":"2","Name":"b","Logo":"bb","Win":"22","Lose":"22","Rank":"22","Alliance":"22","Playoffs":"22","Partition":"22"},
		               {"Id":"3","Name":"c","Logo":"cc","Win":"33","Lose":"33","Rank":"33","Alliance":"33","Playoffs":"33","Partition":"33"},
		               {"Id":"4","Name":"d","Logo":"dd","Win":"44","Lose":"44","Rank":"44","Alliance":"44","Playoffs":"44","Partition":"44"},
		               {"Id":"5","Name":"e","Logo":"ee","Win":"55","Lose":"55","Rank":"55","Alliance":"55","Playoffs":"55","Partition":"55"},
		               {"Id":"6","Name":"f","Logo":"ff","Win":"66","Lose":"66","Rank":"66","Alliance":"66","Playoffs":"66","Partition":"66"}]}';
		//$arr = json_decode($json, true);
		echo $json;
	}
	
}

?>