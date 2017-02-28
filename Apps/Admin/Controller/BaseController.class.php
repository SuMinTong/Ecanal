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
		$s = session('E_STAFF');//html中设置session 例如：                               
    // <span>{:session('E_STAFF.staffName')}&nbsp;<i class="caret"></i></span>
		$this->assign('E_STAFF',$s);
	}
  /*判断是否登录
  **redirect ：Controller重定向
  **如果没有登录。跳转到Index控制器下的toLogin方法
  */
  public function islogin()
  {
  	$s = session('E_STAFF');//从session中取出E_STAFF对象中的值
    if(empty($s))$this->redirect("Index/toLogin");//如果取出的值为空，则重定向至Index控制器下的toLogin方法
  }

  // 判断权限操作
  public function checkPrivelege($grant)
  {
    $s = session('E_STAFF.grant');//从session中取出权限标识符
    if (IS_AJAX) {                //判断是否IS_AJAX验证
        if(empty($s) || !in_array($grant,$s)){    //如果$s为空或者参数$grant中没有$s
            die("{status:-998}");//返回错误标识符。您没有权限操作
        }else {                   //如果是AJAX验证
          if(empty($s) || !in_array($grant,$s)){  //如果$s为空或者参数$grant中没有$s
            $this->display('/noprivelege');          //跳转到noprivelege页面（没有权限页面）
            exit();
          }
        }
    }
  }
}