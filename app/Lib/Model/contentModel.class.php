<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class contentModel extends Model {
	// 自动验证设置
	protected $_validate	 =	 array(
			array('content','require','内容必须填写'),
			array('title','','标题已经存在',0,'unique',self::MODEL_INSERT),
			
	);
	// 获取发表的文章
	public function getAll($cateid,$yearid,$limit){
		$where['cateid'] = $cateid;
		$where['yearid'] = $yearid;
		$strItem = $this->field('id')->where($where)->order('orderid asc')->limit($limit)->select();
		if(!empty($strItem)){
			foreach($strItem as $item){
				$result[] = $this->getOneArticle($item['id']);
			}
			return $result;
		}else{
			return false;
		}		
	}
	public function getOneArticle($id){
		$where['id'] = $id;
		$strArticle = $this->where($where)->find();
	
		if(is_array($strArticle)){
			//获取 主图
			$result = $strArticle;
			$result['photo'] = D('images')->getTheImageByTypeid('awards',$strArticle['id']);
				
				
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