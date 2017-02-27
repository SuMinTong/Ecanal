<?php 
namespace Home\Model;
use Think\Model;
class BaseModel extends Model {

	public function checkEmpty($data,$isDie = false){
		foreach ($data as $key=>$v){
			if(trim($v)==''){
				if($isDie)die("{'status':-1,'key':'$key'}");
				return false;
			}
		}
		return true;
	}
	public function queryRow($sql){
		$plist = $this->query($sql);
		return $plist[0];
	}
}