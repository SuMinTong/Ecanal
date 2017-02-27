<?php 
namespace Admin\Controller;
use Think\Controller;

/**
* 
*/
class BaseController extends Controller
{ 

	public function __construct(){
		parent::__construct();
		//初始化系统信息
		$s = session('E_STAFF');
		$this->assign('E_STAFF',$s);
	}
  /*判断是否登录
  **redirect ：Controller重定向
  **如果没有登录。跳转到Index控制器下的toLogin方法
  */
  public function islogin()
  {
  	$s = session('E_STAFF');//从session中取出E_STAFF对象
     if(empty($s))$this->redirect("Index/toLogin");//如果取出的值为空，则重定向至Index控制器下的toLogin方法
  }
}