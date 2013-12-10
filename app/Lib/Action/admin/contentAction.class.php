<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class contentAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->mod = D ( 'content' );
		$this->year_mod = D ( 'content_year' ); //年份
		$this->cate_mod = D ( 'content_cate' ); //类别
	}
	public function manage(){
		
		$this->display();
	}
	public function addyear(){
		
		$this->title('添加年份');
		$this->display();
	}
}