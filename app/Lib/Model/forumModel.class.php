<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class forumModel extends Model {
	// 自动验证设置
	protected $_validate	 =	 array(
			array('content','require','内容必须填写'),
			array('title','','标题已经存在',0,'unique',self::MODEL_INSERT),
			
	);
	// 获取发表的文章
	public function getAll($catename,$limit){
		$where['catename'] = $catename;
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
			$result['photo'] = D('images')->getTheImageByTypeid($strArticle['catename'],$strArticle['id']);
			
			//if($articleItem['isphoto']){
			//	$result ['photo'] = ikhtml_img('article', $articleItem['itemid'], $result ['content']);
			//}
			//$result ['content'] = nl2br ( ikhtml('article',$id,$result['content'],1));
			
			$result ['content'] =  htmlspecialchars_decode($result['content']);

			return $result;
		}
		return false;
	}
	// 删除一篇文章
	public function delOneArticle($id){
		$where['id'] = $id;
		$strArticle = $this->where($where)->find();
		if(is_array($strArticle)){
			// 删除信息表
			$this->where($where)->delete();
			// 删除照片
			D('images')->delAllImage('forum',$id);
			// 删除视频
			D('videos')->delAllVideo('forum',$id);
		}
	}
	// 删除多篇文章
	public function delArticle($id){
		$where['id'] = array('exp',' IN ('.$id.') ');
		$data['typeid'] = array('exp',' IN ('.$id.') ');
		$data['type'] = 'forum';
		//删除内容
		$this->where($where)->delete(); 
		// 删除照片
		D('images')->where($data)->delete();
		// 删除视频
		D('videos')->where($data)->delete();
		return true;
	}



}