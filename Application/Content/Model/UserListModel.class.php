<?php

namespace Content\Model;
use Think\Model;
class UserListModel extends Model {
   
    protected $trueTableName = 'UserList';
    
    public function clubdetails_get_userinfo_by_openid($openid){
        $where = array(DB_USER_WECHATOPENID => $openid);
        //$field = array(DB_FOODGOODS_FOODID,DB_FOODGOODS_INTOSCENE,DB_FOODGOODS_OPENTIME,DB_FOODGOODS_CLOSETIME);
        $data = $this->where($where)->find();
        return $data;
    }
    /*
    public function clubdetails_get_members_count() {
        $where = array(DB_USER_VALID => "Yes");
        $membersCount = $this->where($where)->count();
        $membersCount += 1000;
	    return $membersCount;
    }
    
	public function saishi_get_user_information($ID){
		$where = array(DB_USER_ID => $ID);
		$data = $this->where($where)->find();
        return $data;
		}*/
}