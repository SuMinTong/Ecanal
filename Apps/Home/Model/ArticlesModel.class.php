<?php 

namespace Home\Model;
use Think\Model;

/**
* 
*/
class ArticlesModel extends BaseModel
{

	public function getArticleList()
	{
		$articleList = S("WST_CACHE_ARTICLE_LIST");
		if (!$articleList) {
			$sql ="SELECT artcat.catName, art.articleId,art.catId,art.articleTitle,art.articleImg FROM __PREFIX__article_cats artcat,__PREFIX__articles art 
			WHERE artcat.catId = art.catId AND artcat.catType=1 AND artcat.catFlag = 1 AND artcat.isShow=1 AND art.isShow=1 ORDER BY artcat.catSort ,art.articleId";
			$result = $this->query($sql);
			$articleList = array();
			for ($i=0; $i < count($result) ; $i++) { 
				$articleList[$result[$i]["catId"]]["articlecats"][] = $result[$i];
				$articleList[$result[$i]["catId"]]["catName"][] = $result[$i]["catName"];
			}
			S("WST_CACHE_ARTICLE_LIST",$articleList,2592000);
		}
		return $articleList;
	}

	public function getArticle($obj){
		$articleId = (int)$obj["articleId"];
		$sql ="SELECT * FROM __PREFIX__articles WHERE articleId=$articleId AND isShow=1  ";
		$article = $this->queryRow($sql);
		if (!$article) {
			echo "您所要查找的文章不存在";
		}
		return $article;
	}


}
