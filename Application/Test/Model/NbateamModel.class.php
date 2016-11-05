<?php
namespace Test\Model;
use Think\Model;

class NbateamModel extends Model{
	protected $trueTableName = 'nbateam';

	public function get_team_information(){
		$data = $this->select();
		return $data;
	}
}