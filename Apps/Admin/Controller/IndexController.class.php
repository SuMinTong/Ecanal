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
		$this->display('../View/index');//	
	}

// 跳转到后台主页面
    public function toLogin()
    {
        // $this->islogin();//检测是否登录
        $this->display("/login");//跳转到main.html
    }
    
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

        public function toMain(){
        $this->isLogin();
        $m = D('Index');
        $weekInfo = $m->getWeekInfo();//一周动态
        $this->assign('weekInfo',$weekInfo);
        $sumInfo = $m->getSumInfo();//一周动态
        $this->assign('sumInfo',$sumInfo);
        $this->display("/main");
    }

    
}


