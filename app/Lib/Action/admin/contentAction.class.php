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
		$yearid =  $this->_get('yearid','intval');
		$cateid =  $this->_get('cateid','intval');
		
		$years = $this->year_mod->order('yearname desc')->select();
		$yearid = empty($yearid) ? $years[0]['yearid'] : $yearid;
		
		$cates = $this->cate_mod->order('cateid desc')->select();
		$cateid = empty($cateid) ? $cates[0]['cateid'] : $cateid;
		
		//开始查询
		//查询条件 是否审核
		$map['cateid'] = $cateid;
		$map['yearid'] = $yearid;
		//显示列表
		$pagesize = 20;
		$count = $this->mod->where($map)->order('addtime desc')->count('id');
		$pager = $this->_pager($count, $pagesize);
		$arrArticleItem =  $this->mod->where($map)->order('addtime desc')->limit($pager->firstRow.','.$pager->listRows)->select();
		
		foreach($arrArticleItem as $key=>$item){
			$arrArticle [] = $item;
			//$arrArticle [$key]['cate'] = $this->cate_mod->getOneCate($item['cateid']);
			$arrArticle [$key]['addtime'] = date('Y-m-d H:i:s',$item['addtime']);
		}
		$this->assign('pageUrl', $pager->fshow());
		$this->assign ( 'arrArticles', $arrArticle );
		
		$this->assign('years',$years);	
		$this->assign('cates',$cates);

		$this->assign('yearid',$yearid);
		$this->assign('cateid',$cateid);
		$this->display();
	}
	//添加文章
	public function addarticle(){
		$cateid = $this->_get('cateid','trim');
		$yearid = $this->_get('yearid','trim');
		
		$years = $this->year_mod->order('yearname desc')->select();
		$cates = $this->cate_mod->order('cateid desc')->select();

		if(IS_POST){
			
				$data ['cateid'] = $this->_post ( 'cateid', 'trim');
				$data ['yearid'] = $this->_post ( 'yearid', 'trim');
				$data ['title'] = $this->_post ( 'title', 'trim' );
				$data ['addtime'] = time ();
					
				$data ['content'] = $this->_post ( 'content');
	
				$data ['postip'] = get_client_ip ();
				$data ['newsauthor'] = $this->_post('newsauthor','trim','');


				if (false === $this->mod->create ($data)) {
					$this->error ( $this->mod->getError () );
				}
				// 保存当前数据对象
				$id = $this->mod->add ();
				if ($id !== false) { // 保存成功
					//更新图片
					$map['typeid'] = $id;
					D('images')->updateImage($map,array('type'=>'awards','typeid'=>0));
					$this->success ( '新增成功!',U('content/manage',array('yearid'=>$data ['yearid'],'cateid'=>$data ['cateid'])));
				} else {
					// 失败提示
					$this->error ( '新增失败!' );
				}
			
		}else{
			$this->assign('cates',$cates);
			$this->assign('years',$years);
			$this->assign('yearid',$yearid);
			$this->assign('cateid',$cateid);
			$this->title ( '添加内容' );
			$this->display();
		}
	}
	//编辑文章
	public function editarticle(){
		$id = $this->_get('id','trim');
		$years = $this->year_mod->order('yearname desc')->select();
		$cates = $this->cate_mod->order('cateid desc')->select();
		$strContent = $this->mod->getOneArticle($id);
	
		if(IS_POST){
				
			$data ['cateid'] = $this->_post ( 'cateid', 'trim');
			$data ['yearid'] = $this->_post ( 'yearid', 'trim');
			$data ['title'] = $this->_post ( 'title', 'trim' );
			$data ['addtime'] = time ();
				
			$data ['content'] = $this->_post ( 'content');
			
			$data ['postip'] = get_client_ip ();
			$data ['newsauthor'] = $this->_post('newsauthor','trim','');
			
			//开始更新
			$this->mod->where(array('id'=>$id))->save($data);
			$this->success ( '更新成功!',U('content/manage',array('yearid'=>$data ['yearid'],'cateid'=>$data ['cateid'])));
				
		}else{
			$this->assign('cates',$cates);
			$this->assign('years',$years);
			$this->assign('strContent',$strContent);
			$this->title ( '编辑内容' );
			$this->display();
		}
	}
	public function years(){
		$years = $this->year_mod->order('yearid desc')->select();	
		$this->assign('years',$years);
		$this->display();
	}
	public function edityear(){
		$yearid =  $this->_get('yearid','intval');
		if($yearid){
			if(IS_POST){
				$data['yearname'] = $this->_post('yearname');
				$this->year_mod->where(array('yearid'=>$yearid))->save($data);
				$this->redirect ( 'content/years');
			}else{
				$str = $this->year_mod->where(array('yearid'=>$yearid))->find();
				$this->assign('str',$str);
				$this->display();
			}
		}
	}	
	public function addyear(){
		if(IS_POST){
			$yearname = $this->_post('yearname');
			
			if($yearname){
				//执行添加
				if(!false == $this->year_mod->create()){
					$yearid = $this->year_mod->add();
					$this->redirect ( 'content/years');
				}
			}
		}else{
			$this->title('添加年份');
			$this->display();
		}

	}
	
	public function cates(){
		$cates = $this->cate_mod->order('cateid desc')->select();
		$this->assign('cates',$cates);
		$this->display();
	}
	public function editcate(){
		$cateid =  $this->_get('cateid','intval');
		if($cateid){
			if(IS_POST){
				$data['catename'] = $this->_post('catename');
				$this->cate_mod->where(array('cateid'=>$cateid))->save($data);
				$this->redirect ( 'content/cates');
			}else{
				$str = $this->cate_mod->where(array('cateid'=>$cateid))->find();
				$this->assign('str',$str);
				$this->display();
			}
		}
	}
	public function addcate(){
		if(IS_POST){
			$catename = $this->_post('catename');
				
			if($catename){
				//执行添加
				if(!false == $this->cate_mod->create()){
					$yearid = $this->cate_mod->add();
					$this->redirect ( 'content/cates');
				}
			}
		}else{
			$this->title('添加奖项名');
			$this->display();
		}
	
	}
	//删除单个文章
	public function delarticle(){
		$id = $this->_get ( 'id' , 'intval'); //文章id
		// 执行删除
		$this->mod->where(array('id'=>$id))->delete();
		$this->success('删除成功！');
	}
	//ajax 设置 头条 置顶 审核 等操作
	public function ajax_setting(){
		$itemid = $this->_get('id');//信息id
		$ik = $this->_get ( 'ik', 'trim');
		$field = $this->_post('field');
		$fieldval = $this->_post('fieldval');
		switch ($ik) {
			case "order" :
				$result = $this->mod->where(array('id'=>$itemid))->setField($field,$fieldval);
				if($result){
					$arrJson = array('r'=>0, 'html'=> '操作成功');
				}else{
					$arrJson = array('r'=>1, 'html'=> '操作失败！');
				}
				echo json_encode($arrJson);
				break;
			case "istop" :
	
				break;
		}
	}
}