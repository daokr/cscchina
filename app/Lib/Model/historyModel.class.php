<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class historyModel extends Model {
	// 自动验证设置
	protected $_validate	 =	 array(
			array('title','require','标题必须填写'),
			array('content','require','内容必须填写'),
			array('title','','标题已经存在',0,'unique',self::MODEL_INSERT),
			
	);
	// 自动填充设置
	protected $_auto	 =	 array(
			array('isaudit','0',self::MODEL_INSERT),
			array('uptime','time',self::MODEL_UPDATE,'function'),
			array('addtime','time',self::MODEL_INSERT,'function'),
	);
	
	public function getOneArticle($id){
		$where['aid'] = $id;
		$strArticle = $this->where($where)->find(); 
		if(is_array($strArticle)){
			$articleItem = D('article_item')->where(array('itemid'=>$strArticle['itemid']))->find();
			//array_merge() 函数把两个或多个数组合并为一个数组
			$result = array_merge($articleItem, $strArticle);
			$result['user'] = D('user')->getOneUser($articleItem['userid']);
			//获取 主图
/*			if($articleItem['isphoto']){
				$result ['photo'] = ikhtml_img('article', $articleItem['itemid'], $result ['content']);
			}*/
			//$result ['content'] = nl2br ( ikhtml('article',$id,$result['content'],1));
			
			$result ['content'] =  htmlspecialchars_decode($result['content']);

			return $result;
		}
		return false;
	}




}