<?php 
namespace Admin\Controller;
/**
* 
*/
class IndexController extends BaseController
{
	public function index()
	{
		$this->isLogin();
		$this->display("/index");//	
	}

// 跳转到后台主页面
    public function toLogin()
    {
        $this->islogin();//检测是否登录
        $this->display("/main");//跳转到main.html
    }

    
}


