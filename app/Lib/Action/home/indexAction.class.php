<?php
/*
 * IKPHP 爱客开源社区 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class indexAction extends frontendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->article_mod = D('article');
		$this->item_mod = D ( 'article_item' );
		$this->prize_mod = D ( 'prize' );
		$this->photos_mod = D('photos'); 
	}
	public function index() {
		
		//创新人物
		$cxrw_id = $this->item_mod->where(array('cateid'=>8,'istop'=>1))->find();
		$strcxrw = $this->article_mod->getOneArticle($cxrw_id['itemid']);
		$this->assign ( 'strcxrw', $strcxrw );
		//创新焦点
		$cxjd_id = $this->item_mod->where(array('cateid'=>9,'istop'=>1))->find();
		$cxjd = $this->article_mod->getOneArticle($cxjd_id['itemid']);
		$this->assign ( 'cxjd', $cxjd );	

		//创新事件
		$cxsj_arrItemid =  $this->item_mod->field('itemid')->where(array('cateid'=>7))->order('orderid desc')->limit(6)->select();
		foreach($cxsj_arrItemid as $key=>$item){
			$arr_cxsj [] = $this->article_mod->getOneArticle($item['itemid']);
		}		
		$this->assign ( 'cxsj', $arr_cxsj );
		//创新技术
		$cxjsItemid =  $this->item_mod->field('itemid')->where(array('cateid'=>4,'istop'=>1))->order('orderid desc')->find();
		$cxjstop = $this->article_mod->getOneArticle($cxjsItemid['itemid']);
		$this->assign ( 'cxjstop', $cxjstop );	
			
		$cxjs_arrItemid =  $this->item_mod->field('itemid')->where(array('cateid'=>4,'istop'=>array('neq',1)))->order('orderid desc')->limit(5)->select();
		foreach($cxjs_arrItemid as $key=>$item){
			$arr_cxjs [] = $this->article_mod->getOneArticle($item['itemid']);
		}
		$this->assign ( 'cxjs', $arr_cxjs );	

		//创新应用
		$cxyyItemid =  $this->item_mod->field('itemid')->where(array('cateid'=>5,'istop'=>1))->order('orderid desc')->find();
		$cxyytop = $this->article_mod->getOneArticle($cxyyItemid['itemid']);
		$this->assign ( 'cxyytop', $cxyytop );
			
		$cxyy_arrItemid =  $this->item_mod->field('itemid')->where(array('cateid'=>5,'istop'=>array('neq',1)))->order('orderid desc')->limit(5)->select();
		foreach($cxyy_arrItemid as $key=>$item){
			$arr_cxyy [] = $this->article_mod->getOneArticle($item['itemid']);
		}
		$this->assign ( 'cxyy', $arr_cxyy );
		
		//创新导购
		$cxdgItemid =  $this->item_mod->field('itemid')->where(array('cateid'=>6,'istop'=>1))->order('orderid desc')->find();
		$cxdgtop = $this->article_mod->getOneArticle($cxdgItemid['itemid']);
		$this->assign ( 'cxdgtop', $cxdgtop );
			
		$cxdg_arrItemid =  $this->item_mod->field('itemid')->where(array('cateid'=>6,'istop'=>array('neq',1)))->order('orderid desc')->limit(5)->select();
		foreach($cxdg_arrItemid as $key=>$item){
			$arr_cxdg [] = $this->article_mod->getOneArticle($item['itemid']);
		}
		$this->assign ( 'cxdg', $arr_cxdg );		
		
		//首页广告获取
		$adList[0] = D('ad')->where(array('posid'=>1))->find();
		$adList[1] = D('ad')->where(array('posid'=>2))->find();
		$adList[2] = D('ad')->where(array('posid'=>3))->find();
		$adList[3] = D('ad')->where(array('posid'=>4))->find();
		$adList[4] = D('ad')->where(array('posid'=>5))->find();
		$adList[5] = D('ad')->where(array('posid'=>6))->find();
		$adList[6] = D('ad')->where(array('posid'=>7))->find();
		$this->assign ( 'adList', $adList );	
		
		//评奖新闻
		$pjxw_list = $this->prize_mod->getAll('news',6);
		$this->assign ( 'pjxw_list', $pjxw_list );

		//媒体报道
		$mtbd_list = $this->prize_mod->getAll('reports',5);
		$this->assign ( 'mtbd_list', $mtbd_list );

		//合作logo
		$medias = $this->photos_mod->getPhotos('medias');
		$this->assign ( 'medias', $medias );
		
		$this->_config_seo ();
		$this->display();
	}
	

}