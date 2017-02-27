<?php 
namespace Admin\Controller;

/**
* 后台工作人员控制器
*/
class StaffsController extends BaseController
{

    public function register()
    {
        $model= M('staffs');
        $where['loginName']=I('post.loginName');
        $where['loginPwd']=md5(I('post.loginPwd'));
        $result=$model->add($where);
        if ($result) {
            # code...
            echo "注册成功";
        }else {
            echo "注册失败";
        }
        # code...
    }
	public function login()
	{
        $model= M('staffs');
        $where['loginName']=I('post.loginName');
        $where['loginPwd']=md5(I('post.loginPwd'));
        $result=$model->where($where)->find();
        if ($result) {
            echo "登录成功";
        }else echo "登录失败";
    }	
}