<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller{
    public function index(){
    	// $model=M('users');
    	// $data = $model->select();
    	// dump($data);
    	 echo C('URL_MODEL');
       echo "<hr/>";
    	 echo U('Index/user',array('id'=>1),'html',false,'localhost');
    }
  // public function user(){
  // 	echo "123456";
  // }

}