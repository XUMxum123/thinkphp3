<?php

namespace Test\Model;
use Think\Model;

class MydatabaseModel extends Model{
	protected $trueTableName = 'mydatabase';
	
	public function get_all_information(){
		$data = $this->select();
		return $data;
	}
	
	
	
	public function get_series_all_matches_information($ID){
		      $where[DB_MATCH_SERIESID] = $ID;
			  $order = array(
			                  DB_MATCH_STARTTIME => "ASC"
			                 );
			  $field = array(
			                  DB_MATCH_ID,DB_MATCH_NAME,DB_MATCH_VENUE,DB_MATCH_STATE,
							  DB_MATCH_STARTTIME,DB_MATCH_ENDTIME
			                 );	
		      $data = $this->where($where)->order($order)->field($field)->select();
              return $data;			 
		}
	
	public function saishi_get_match_information_by_matchId($ID){
		      $where[DB_MATCH_ID] = $ID;
			  $field = array(
			                   DB_MATCH_STARTTIME,
							   DB_MATCH_LIVING,
							   DB_MATCH_SERIESID
			                 );
	          $data = $this->where($where)->field($field)->find();
              return $data;
		}
	
	public function saishi_get_series_finished_matches_information($ID){
			  date_default_timezone_set('Etc/GMT-8');//把时间格式规定为北京时间
              $nowtime = date("Y-m-d H:i:s");//当前时间 2014-09-19 15:30:37(格式)	
			  $where[DB_MATCH_ENDTIME] = array("lt",$nowtime);
			  $where[DB_MATCH_SERIESID] = array("eq",$ID);
			  $order = array(DB_MATCH_ENDTIME => "DESC");
			  $data = $this->where($where)->order($order)->select();
              return $data;
		}
	
	public function saishi_get_series_ongoing_matches_information($ID) {
              date_default_timezone_set('Etc/GMT-8');
              $nowtime = date("Y-m-d H:i:s");
              $where[DB_MATCH_STARTTIME] = array("elt",$nowtime);
              $where[DB_MATCH_ENDTIME] = array("egt",$nowtime);
		      $where[DB_MATCH_SERIESID] = array("eq",$ID);
              $order = array(DB_MATCH_STARTTIME => "ASC");
              $data = $this->where($where)->order($order)->select();
              return $data;
        }
		
	public function saishi_get_series_preparing_matches_information($ID) {
              date_default_timezone_set('Etc/GMT-8');
              $nowtime = date("Y-m-d H:i:s");
              $where[DB_MATCH_STARTTIME] = array("gt",$nowtime);
			  $where[DB_MATCH_SERIESID] = array("eq",$ID);
              $order = array(DB_MATCH_STARTTIME => "ASC");
              $data = $this->where($where)->order($order)->select();
              return $data;
        }	
}