<?php 

namespace Admin\Model;

/**
* 
*/
class ArticleCatsModel extends BaseModel
{
	//得到指定的id值；“catId”：数据表中的字段
	public function get()
	{
		return $this->where("catId=".int(I('id')))->find();
	}
}