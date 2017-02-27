<?php 
 namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class UserController extends Controller
{
	
 public function register()
	{
		$model=M('users');//实例化数据表
		//M("User") 用于高效实例化一个数据模型（M 是 new Model 的简写，称为快捷方法），参数为要操作的表名。
		//构建写入的数据数组
		// $data['数据表中的字段名'] = I('客户端传过来的值');
		$data['loginName'] = I('post.loginName');
		$data['loginPwd'] = md5(I('post.loginPwd'));
		$data['userQQ'] = md5(I('post.repwd'));
		$result = $model->add($data);
		if ($result) {
			# code...
			// var_dump($name,$pwd,$repwd);
			echo "注册成功";
		}else echo "注册失败";
		// var_dump($name,$pwd,$repwd);

	}
 public function login(){
 	$model=M('users');
 	$where['loginName']=I('post.loginName');
 	$where['loginPwd']=md5(I('post.loginPwd'));
 	$result=$model->where($where)->find();
 	// var_dump($name,$pwd);
 	 // var_dump($model);
 	if ($result) {
 	// 	# code...
 		echo "登录成功";
 	}else echo "登录失败";
 	// var_dump($model);

 }


}
