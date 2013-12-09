<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class singlepageAction extends frontendAction {
	public function _initialize() {
		parent::_initialize ();
		// 访问者控制
		$this->mod = D ( 'singlepage' );
	}
	
	// 文章详情页
	public function show() {
		$user = $this->visitor->get ();
		$catename = $this->_get ( 'catename', 'trim');

		$strPage = $this->mod->getOneArticle($catename);
		
		// 浏览量加 +1
		if($strPage ['id']!=$user['userid']){
			$this->mod->where(array('id'=>$strPage['id']))->setInc('count_view');
		}
		
		$this->assign ( 'strArticle', $strPage );

		$this->_config_seo ( array (
				'title' => $strPage ['title'],
				'subtitle' => '阅读' 
		) );
		$this->display();
	}
	
	
}