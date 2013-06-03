<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class userAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->mod = D ( 'user' );
		$this->award_cate = D ('award_cate');
	}
	//会员管理
	public function manage(){
		$ik = $this->_get ( 'ik', 'trim','users');

		$this->assign('ik', $ik);
		$this->title ( '会员管理' );
		switch ($ik) {
			case "users" :
				$this->users();
				break;
		}
	}
	//会员列表
	public function users(){
		//是否启用 0 启用 1 禁用
		$isenable = $this->_get('isenable','intval','0');
		//查询开放
		//$map = array('isenable'=>$isenable);
		$map = '';
		//显示列表
		$pagesize = 20;
		$count = $this->mod->where($map)->order('addtime DESC')->count();
		$pager = $this->_pager($count, $pagesize);
		$query =  $this->mod->field('userid')->where($map)->order('addtime DESC')->limit($pager->firstRow.','.$pager->listRows)->select();
		
		foreach($query as $key=>$item){
			$list[] = $this->mod->getOneUser($item['userid']);
		}
		// 已经禁用的用户数目
		$count_isenable = $this->mod->where(array('isenable'=>'1'))->count();
		 
		$this->assign ( 'isenable', $isenable );
		$this->assign ( 'count_isenable', $count_isenable );
		$this->assign('pageUrl', $pager->fshow());
		$this->assign('list', $list);
		$this->display('users');
	}
	//审核
	public function isenable(){
		$ik = $this->_get ( 'ik', 'trim');
		$id = $this->_get ( 'id', 'intval');
		$isenable = $this->_get('isenable','intval','0');
		switch ($ik) {
			case "user" :
				$this->mod->where(array('userid'=>$id))->setField(array('isenable'=>$isenable));
				$isenable = $isenable == 0? 1 : 0;
				$this->redirect ( 'user/manage',array('ik'=>'users','isenable'=>$isenable));
				break;
		}
		 
	}
	//ajax批量审核
	public function ajax_isenable(){
		$itemid = $this->_post('itemid');
		$ik = $this->_get ( 'ik', 'trim');
		$isenable = $this->_get('isenable','intval','0');
		if(!empty($itemid)){
			 
			switch ($ik) {
				case "users" :
					//审核
					$where['userid'] = array('exp',' IN ('.$itemid.') ');
					$this->mod->where($where)->setField(array('isenable'=>$isenable));
					$arrJson = array('r'=>0, 'html'=> '操作成功');
					echo json_encode($arrJson);
					break;
			}
	
		}
	}
	
	//报名管理奖设置
	// 分类管理
	public function cate() {
		$ik = $this->_get ( 'ik', 'trim' ,'list');

		$this->assign('ik',$ik);
		$this->title ( '奖项分类管理' );
		switch ($ik) {
			case "edit" :
				$this->cate_edit();
				break;
			case "add" :
				$this->cate_add();
				break;
			case "list" :
				$this->cate_list();
				break;
			case "delete" :
				$this->cate_delete();
				break;
		}
	}
	// 单个分类列表
	public function cate_list(){
		$arrCate = $this->award_cate->where('')->order('cateid desc')->select();
		$this->assign('arrCate',$arrCate);
		$this->display('cate_list');
	}
	public function cate_add($nameid){
		if(IS_POST){
			$catename = $this->_post('catename','trim');
			if(!empty($catename)){
				//执行添加
				if (false === $this->award_cate->create ()) {
					$this->error ( $this->award_cate->getError () );
				}
				// 保存当前数据对象
				$cateid = $this->award_cate->add ();
				if($cateid>0){
					$this->success ( '添加成功!' );
				}else{
					$this->error ( '添加失败!' );
				}
				
			}else{
				$this->error('添加失败，分类名称不能为空');
			}
				
		}else{
			$this->display('cate_add');
		}
	}
	public function cate_edit(){
		$cateid = $this->_get('cateid','intval');
		$strCate = $this->award_cate->where(array('cateid'=>$cateid))->find();
		if($strCate){
			if(IS_POST){
				$catename =  $this->_post('catename','trim');
				$this->award_cate->where(array('cateid'=>$cateid))->setField(array('catename'=>$catename));
				$this->redirect ( 'user/cate',array('ik'=>'list'));
			}else{
				$this->assign('strCate',$strCate);
				$this->display('cate_edit');
			}
		}else{
			$this->error('错误操作');
		}
	}
	
}