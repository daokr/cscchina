<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class singlepageModel extends Model {
	// 自动验证设置
	protected $_validate	 =	 array(
			array('content','require','内容必须填写'),
			array('title','','标题已经存在',0,'unique',self::MODEL_INSERT),
			
	);

	public function getOneArticle($catename){
		$where['catename'] = $catename;
		$strArticle = $this->where($where)->find(); 
		
		if(is_array($strArticle)){
			//获取 主图
			$result = $strArticle;
			$result['photo'] = D('images')->getTheImageByTypeid('singlepage',$strArticle['id']);
			
			//if($articleItem['isphoto']){
			//	$result ['photo'] = ikhtml_img('article', $articleItem['itemid'], $result ['content']);
			//}
			//$result ['content'] = nl2br ( ikhtml('article',$id,$result['content'],1));
			
			$result ['content'] =  htmlspecialchars_decode($result['content']);

			return $result;
		}
		return false;
	}
	


}