<?php 

namespace Admin\Model;

/**
* 
*/
class IndexModel extends BaseModel
{
	
	public function getWeekInfo(){
		$ret = array();
		//用户
		$weekDate = date('Y-m-d 00:00:00',time()-604800);//一周内
		$ret['userNew'] = M('Users')->where('userFlag=1 and createTime>"'.$weekDate.'"')->count();//新增用户
		
		//申请店铺
		$ret['shopApply'] = M('Shops')->where('shopStatus >= 0 and shopFlag=1 and createTime>"'.$weekDate.'"')->count();
		
		//新增商品
		$ret['goodsNew'] = M('goods')->where('goodsFlag=1 and createTime>"'.$weekDate.'"')->count();
		//新增订单
		$ret['ordersNew'] = M('orders')->where('orderFlag=1 and orderStatus >=0 and createTime>"'.$weekDate.'"')->count();
		//新增店铺
		$map['shopStatus'] = 1;
		$ret['shopNew'] = M('Shops')->where('shopStatus = 1 and shopFlag=1 and createTime>"'.$weekDate.'"')->count();
		return $ret;
	}

	/**
	 * 统计信息
	 * @return array 统计信息的数组
	 */
	public function getSumInfo(){
		$ret = array();
		$ret['userSum'] = M('Users')->where('userFlag=1')->count();//新增用户
		//申请店铺
		$ret['shopApplySum'] = M('Shops')->where('shopStatus = 0 and shopFlag=1')->count();
		//商品
		$ret['goodsSum'] = M('goods')->where('goodsFlag=1')->count();
		//订单
		$ret['ordersSum'] = M('orders')->where('orderFlag=1 and orderStatus >=0')->count();
		//订单总金额
		$ret['moneySum'] = M('orders')->where('orderFlag=1 and orderStatus >=0')->sum('totalMoney');
		
		//店铺
		$ret['shopSum'] = M('Shops')->where('shopStatus = 1 and shopFlag=1')->count();
		return $ret;
	}

}