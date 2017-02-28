<?php 
namespace Admin\Model;

/**
* 角色服务类
*/
class RolesModel extends BaseModel
{
	// 添加管理员
	public function insert()
	{
		$rd = array('stauts' => -1);
		$data = array();
		$data['roleNmae'] = I('roleNmae');//角色名称
		$data["grant"] = I("grant");       //角色拥有的权限名称
		$data["createTime"] = date('Y-m-d H:i:s');//创建时间
		$data["roleFlag"] = 1;//角色标志
		if($this->checkEmpty($data)){  //检测$data是否为空
			$rs = $this->add($data);	//向数据库里面添加值
			if($rs) {
				$rd['stauts'] = 1;		//如果添加成功。$rd的状态为1
			}
		}
	    
		return $rs;
	}


	
	
}