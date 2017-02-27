<?php 
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class ArticlesController extends Controller
{
  
  public function index(){
  	$m = D('Home/Articles');
   	$articleList = $m->getArticleList();
   	$obj["articleId"] = (int)I("articleId",0);
   	if(!$obj["articleId"]){
    		foreach($articleList as $key=> $articles){
    			$obj["articleId"] = $articles["articlecats"][0]["articleId"];
    			break;
    		}	
    	}
    	$article = $m->getArticle($obj);
    	// $this->assign('articleList',$articleList);
    	// $article['articleContent'] = htmlspecialchars_decode($article['articleContent']);
    	// $this->assign('carticle',$article);
        // $this->display("default/help_center");
        // $json_string = json_encode($article);
		// var_dump($json_string);
  	   // var_dump($articleList);
  	   // echo "<hr/>";
  	   print_r($article);  
  }


}