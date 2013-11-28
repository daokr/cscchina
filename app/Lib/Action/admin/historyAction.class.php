<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class historyAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->mod = D ( 'history' );
		$this->cate_mod = D ( 'history_cate' );
	}
	public function hislist(){
		$arrCate = $this->cate_mod->select();
		$this->assign('arrCate',$arrCate);
		
		$cateid = $this->_get('cateid','trim,intval','0');
		if($cateid==0){
			$cateid = $arrCate[0]['cateid'];
		}
		
		//查询条件 
		$map['cateid'] = $cateid;
		//显示列表
		$pagesize = 20;
		$count = $this->mod->where($map)->order('addtime desc')->count();
		$pager = $this->_pager($count, $pagesize);
		$list =  $this->mod->where($map)->order('addtime desc')->limit($pager->firstRow.','.$pager->listRows)->select();

		$this->assign('pageUrl', $pager->fshow());
		
		$this->assign('list',$list);
		$this->assign('cateid',$cateid);
		$this->title ( '往届回顾管理' );
		$this->display();		
	}
	public function cate(){
		$ik = $this->_get('ik');
		if($ik == 'add'){
			//添加
			if (IS_POST) {
				$id = $this->_post('id','trim','0');
				if(empty($id)){
					if (false === $this->cate_mod->create ()) {
						$this->error ( $this->cate_mod->getError () );
					}
					// 保存当前数据对象
					$aid = $this->cate_mod->add ();
					if ($aid !== false) { // 保存成功
						$this->redirect(U('history/hislist'));
					}else{
						$this->error ( '新增失败!' );
					}
				}else{
					if (false === $this->cate_mod->create ()) {
						$this->error ( $this->cate_mod->getError () );
					}
					$this->cate_mod->where(array('id'=>$id))->save();
					$this->redirect(U('history/hislist'));
				}
		
					
			} else {
				$this->title ( '添加年份' );
				$this->display('cate_add');
			}
		}
		
		
	}
	public function manage(){
		$ik = $this->_get ( 'ik', 'trim' ,'list');
		$cateid = $this->_get ( 'cateid', 'trim');
		$arrCate = $this->cate_mod->select();
		if(empty($cateid)){
			$cateid = $arrCate[0]['cateid'];
		}
		$this->assign('cateid',$cateid);

		$this->assign('ik',$ik);
		switch ($ik) {
			case "add" :
				$this->add($cateid);
				break;
		}
	}
	public function add($cateid){
		if(IS_POST){
			
			if (false !== $this->mod->create ()) {
				$id = $this->mod->add ();
				if ($id !== false) {
					$map ['typeid'] = $id;
					D ( 'images' )->updateImage ( $map, array (
							'type' => 'history',
							'typeid' => 0 
					) );
					$this->success ( '新增成功!', U ( 'history/hislist', array (
							'cateid' => $cateid
					) ) );
				} else {
					// 失败提示
					$this->error ( '新增失败!' );
				}

			} else {
				$this->error ( $this->mod->getError () );
			}
		}else{
			// 1科技奖回顾 2论坛回顾
			$arrType = array(
					'forum' => array('name'=>'创新论坛','value'=>'1'),
					'prize' => array('name'=>'科技评奖','value'=>'2'),
					);
			$strCate = $this->cate_mod->where(array('cateid'=>$cateid))->find();
			$this->title ( $strCate['catename'].' - 添加内容' );
			$this->assign('arrType',$arrType);
			$this->display('add');
		}
	}
}