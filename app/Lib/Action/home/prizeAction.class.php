<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class prizeAction extends frontendAction {
	public function _initialize() {
		parent::_initialize ();
		// 访问者控制
		$this->mod = D ( 'prize' );
	}
	
	// 文章详情页
	public function show() {
		$user = $this->visitor->get ();
		$id = $this->_get ( 'id', 'intval');
		// 根据id获取内容
		$strArticle = $this->mod->getOneArticle ( $id );
		! $strArticle && $this->error ( '呃...你想要的东西不在这儿' );
		
		// 浏览量加 +1
		if($strArticle ['userid']!=$user['userid']){
			$this->mod->where(array('id'=>$strArticle['id']))->setInc('count_view');
		}
		//上一篇帖子
		$upArticle = $this->mod->getOneArticle($id-1);
			
		//下一篇帖子
		$downArticle = $this->mod->getOneArticle($id+1);
		

		$this->assign ( 'strArticle', $strArticle );
		$this->assign ( 'upArticle', $upArticle );
		$this->assign ( 'downArticle', $downArticle );
		$this->assign ( 'strUser', $strArticle ['user'] );
		$this->_config_seo ( array (
				'title' => $strArticle ['title'],
				'subtitle' => '阅读' 
		) );
		$this->display();
	}
	// 文章分类列表
	public function category(){
		$catename = $this->_get('catename','trim');
		//查询条件 是否审核
		$map['catename'] = $catename;
		$map['isaudit'] = 0;
		//显示列表
		$pagesize = 20;
		$count = $this->mod->where($map)->order('orderid desc')->count();
		$pager = $this->_pager($count, $pagesize);
		$arrItemid =  $this->mod->field('id')->where($map)->order('orderid desc')->limit($pager->firstRow.','.$pager->listRows)->select();
		foreach($arrItemid as $key=>$item){
			$arrArticle [] = $this->mod->getOneArticle($item['id']);
		}
		$this->assign('pageUrl', $pager->fshow());
		$this->assign ( 'arrArticle', $arrArticle );
		$this->assign ( 'catename', $catename );
		///////////////////////////////

		if($catename=='news'){
			$cname = '评奖新闻';
		}else{
			$cname = '媒体报道';
		}
		$this->_config_seo ( array (
				'title' => $cname,
		) );
		$this->display ();
	}
	
}