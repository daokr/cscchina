<?php
/*
 * IKPHP 爱客开源社区 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class indexAction extends frontendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->article_mod = D('article');
	}
	public function index() {
		
		//获取最新的 8文章
		$arrNewArticle = $this->article_mod->getNewArticleItem(8);
		
		$this->assign ( 'arrNewArticle', $arrNewArticle );
		
		$this->_config_seo ();
		$this->display();
	}
	

}