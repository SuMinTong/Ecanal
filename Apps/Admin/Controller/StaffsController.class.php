<?php 
namespace Admin\Controller;

/**
* 后台工作人员控制器
*/
class StaffsController extends BaseController
{

    //后台工作人员注册
    public function register()
    {
        $model= M('staffs');
        $where['loginName']=I('post.loginName');
        $where['loginPwd']=md5(I('post.loginPwd'));
        $result=$model->add($where);
        if ($result) {
            echo "注册成功";
        }else {
            echo "注册失败";
        }
        # code...
    }

    //后台工作人员登录
	// public function login()
	// {
 //        $rd = array('status'=>-1);
 //        $model= M('staffs');
 //        $where['loginName']=I('post.loginName');
 //        $where['loginPwd']=md5(I('post.loginPwd'));
 //        $where['staffFlag'] = 1;
 //        // $where['staffStatus'] = 1;
 //        $result=$model->where($where)->find();
 //        if ($result){
 //            // // var_dump($where);
 //            $roles= M('roles');
 //            // //在roles数据表中匹配角色权限。staffRoleId：选择的角色ID值
 //            $w['roleId']=I('post.staffRoleId');
 //            $w['roleFlag']=1;
 //            $rrs = $roles->where($w)->find();

 //            // $rrs = $roles->where('roleFlag =1 and roleId='.$staff['staffRoleId'])->find();
 //            $staff['roleName'] = $rrs['roleName'];
 //            $staff['grant'] = explode(',',$rrs['grant']);//分割显示字符串
 //            $rd['staff'] = $staff;
 //            $rd['status'] = 1;
 //            // var_dump($rrs);

 //        }
 //        // echo $rd;
 //         var_dump($staff);
 //        // return $rd;

 //    }	


     public function login(){
        $m = D('Admin/Staffs');
        // if($this->checkVerify()){
            $rs = $m->login();
            if($rs['status']== 1){
                session('E_STAFF',$rs['staff']);
                unset($rs['staff']);
            }
             // var_dump($rs);
            $this->ajaxReturn($rs);
        }
}
