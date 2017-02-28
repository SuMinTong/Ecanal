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
    	$this->assign('articleList',$articleList);//将$articleList赋值给articleList模型
    	// $article['articleContent'] = htmlspecialchars_decode($article['articleContent']);
    	$this->assign('article',$article);//将$article赋值给article模型
  }


}