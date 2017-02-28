<?php 

namespace Admin\Model;

/**
* 后台工作人员类
*/
class StaffsModel extends BaseModel
{
	public function login()
	{
        $rd = array('status'=>-1);
        $model= M('staffs');
        $where['loginName']=I('post.loginName');
        $where['loginPwd']=md5(I('post.loginPwd'));
        $where['staffFlag'] = 1;
        // $where['staffStatus'] = 1;
        $result=$model->where($where)->find();
        if ($result){
            // // var_dump($where);
            $roles= M('roles');
            // //在roles数据表中匹配角色权限。staffRoleId：选择的角色ID值
            $w['roleId']=I('post.staffRoleId');
            $w['roleFlag']=1;
            $rrs = $roles->where($w)->find();

            // $rrs = $roles->where('roleFlag =1 and roleId='.$staff['staffRoleId'])->find();
            $staff['roleName'] = $rrs['roleName'];
            $staff['grant'] = explode(',',$rrs['grant']);//分割显示字符串
            $rd['staff'] = $staff;
            $rd['status'] = 1;
            // var_dump($rrs);

        }
        // echo $rd;
         // var_dump($staff);
        return $rd;

    }	

}