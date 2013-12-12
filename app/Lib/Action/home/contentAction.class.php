<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class contentAction extends frontendAction {
	public function _initialize() {
		parent::_initialize ();
		// 访问者控制

		$this->mod = D ( 'content' );
		$this->cate_mod = D ( 'content_cate' );
		$this->year_mod = D ( 'content_year' );
	}
	
	// 文章详情页
	public function show() {
		$user = $this->visitor->get ();
		$id = $this->_get ( 'id', 'intval');
		// 根据id获取内容
		$strArticle = $this->mod->getOneArticle ( $id );
		! $strArticle && $this->error ( '呃...你想要的东西不在这儿' );
		
		// 浏览量加 +1
		
		$this->mod->where(array('id'=>$strArticle['id']))->setInc('count_view');
		
		//上一篇帖子
		$upArticle = $this->mod->getOneArticle($id-1);
			
		//下一篇帖子
		$downArticle = $this->mod->getOneArticle($id+1);
		

		$this->assign ( 'strArticle', $strArticle );
		$this->assign ( 'upArticle', $upArticle );
		$this->assign ( 'downArticle', $downArticle );
		$this->_config_seo ( array (
				'title' => $strArticle ['title'],
				'subtitle' => '阅读' 
		) );
		$this->display ();
	}
	// 文章分类列表
	public function category(){
		$cateid = $this->_get('cateid','intval');
		$yearid = $this->_get('yearid','intval');
		$strCate = $this->cate_mod->where(array('cateid'=>$cateid))->find();
		$years = $this->year_mod->order('yearname desc')->select();
		
		///////////////////////////////
		$map['cateid'] = $cateid;
		$map['yearid'] = $yearid;
		//显示列表
		$pagesize = 20;
		$count = $this->mod->where($map)->order('addtime desc')->count('id');
		$pager = $this->_pager($count, $pagesize);
		$arrArticleItem =  $this->mod->where($map)->order('addtime desc')->limit($pager->firstRow.','.$pager->listRows)->select();
		
		foreach($arrArticleItem as $key=>$item){
			$arrArticle [] = $this->mod->getOneArticle($item['id']);

		}
		$this->assign('pageUrl', $pager->fshow());
		$this->assign ( 'arrArticle', $arrArticle );
		
		
		$this->_config_seo ( array (
				'title' => $strCate['catename'],
		) );
		$this->assign ( 'strCate', $strCate);
		$this->assign ( 'years', $years);
		$this->assign ( 'cateid', $cateid );
		$this->assign ( 'yearid', $yearid );
		$this->display ();
	}
	
}