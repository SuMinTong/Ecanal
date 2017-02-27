<?php 

namespace Admin\Model;

/**
* 后台工作人员类
*/
class StaffsModel extends BaseModel
{
	// 后台工作人员登录
	 // public function login(){
	 // 	$rd = array('status'=>-1);
	 // 	// $s = M('staffs');
	 // 	$staff = $this->where('loginName="'.I('loginName').'" and staffFlag=1 and staffStatus=1')->find();
	 // 	if($staff['loginPwd']==md5(I('loginPwd'))){
	 // 		//获取角色权限
	 // 		$r = M('roles');
	 // 		$rrs = $r->where('roleFlag =1 and roleId='.$staff['staffRoleId'])->find();
	 // 		$staff['roleName'] = $rrs['roleName'];
	 // 		$staff['grant'] = explode(',',$rrs['grant']);
	 // 		$rd['staff'] = $staff;
	 // 		$rd['status'] = 1;
	 // 		// $this->lastTime = date('Y-m-d H:i:s');
	 // 		// $this->lastIP = get_client_ip();
	 // 		// $this->where(' staffId='.$staff['staffId'])->save();
	 // 		// //记录登录日志
		//  // 	$data = array();
		// 	// $data["staffId"] = $staff['staffId'];
		// 	// $data["loginTime"] = date('Y-m-d H:i:s');
		// 	// $data["loginIp"] = get_client_ip();
		// 	// $m = M('log_staff_logins');
		// 	// $m->add($data);

	 // 	 }
	 // 	 return $rd;
	 // }
}