<?php 
namespace Admin\Controller;

/**
* 文章列表控制器
*/
class ArticleCatsController extends BaseController{


//新增 编辑页面
	public function newEdit()
	{
		$this->islogin();//判断是否登录
		$m = D('Admin/ArticleCats');//快速实例化ArticleCats模块库
		$obj = array();			
		if (I('id',0)>0) {  //如果取到的id值不存在，则默认为0
			$this->checkPrivelege('wzfl_fl');//判断是否有管理文章分类的权限
			$obj = $m->get();
		}else {
			$this->checkPrivelege('wzfl_xz');//判断是否有新增文章的权限
			$obj = $m->getModel();
    		$obj['parentId'] = I('parentId',0);//选择文章分类parentId：文章分类代码
		}
		$this->assign('object',$obj);//对模板变量赋值
		$this->view->display('/articlecats/edit');
	}



}
	
	


