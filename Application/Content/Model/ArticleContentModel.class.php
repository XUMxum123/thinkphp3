<?php

namespace Content\Model;
use Think\Model;

class ArticleContentModel extends Model {
   
    protected $trueTableName = 'ArticleContent';
    
    public function _get_content_infor($mark){
		date_default_timezone_set('Etc/GMT-8');
		$nowtime = date("Y-m-d H:i:s",time()-60*60*24*4);//获得比当前时间少4天的时间
		if($mark == 0){
		    $where[DB_ARTICLECONTENT_PUBLISHTIME] = array("gt",$nowtime);	  //最新的消息 				   
		}elseif($mark == 1){
			$where[DB_ARTICLECONTENT_PUBLISHTIME] = array("lt",$nowtime);     //历史的消息
			}
		$order = array(
                         DB_ARTICLECONTENT_PUBLISHTIME=>"desc"
                     );
        $data = $this->where($where)->order($order)->select();
		return $data;
    }

   public function _get_content_infor_by_id($ID){
      $con = array(DB_ARTICLECONTENT_ID => $ID); 
      return $this->where($con)->find();

   }
   
   
    /*public function getRoleByRoleid($rid){
            return $this->find($rid);
        }
        
        public function selectDeptByName($name){
            $cond = array(DB_DEPARTMENT_NAME => $name);
            return $this->where($cond)->select();
        }*/

}
