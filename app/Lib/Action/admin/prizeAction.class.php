<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class prizeAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->prize_mod = D ( 'prize' );
	}
	public function index() {
		$ik = $this->_get ( 'ik', 'trim');
		$catename = $this->_get ( 'catename', 'trim');
		
		$this->assign('catename',$catename);
		$this->assign('ik',$ik);
		
		$this->title ( '文章管理' );
		
		switch ($ik) {
			case "istop" :
				$this->article_istop($catename);
				break;
		}
	}
	//单个置顶
	public function article_istop($catename){
		$id = $this->_get('id','intval');
		$istop = $this->_get('istop','intval','0');
		$strItem = $this->prize_mod->where(array('id'=>$id))->find();
		if($strItem){
			$this->prize_mod->where(array('id'=>$id))->setField(array('istop'=>$istop));
			$this->redirect ( 'prize/manage',array('catename'=>$catename));
		}else{
			$this->error('文章不存在或已被删除！');
		}
	}
	//ajax 设置 头条 置顶 审核 等操作
	public function ajax_setting(){
		$id = $this->_get('id');//信息id
		$ik = $this->_get ( 'ik', 'trim');
		$field = $this->_post('field');
		$fieldval = $this->_post('fieldval');
		switch ($ik) {
			case "order" :
				$result = $this->prize_mod->where(array('id'=>$id))->setField($field,$fieldval);
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
	public function manage(){
		$catename = $this->_get('catename');
		
		$this->assign('catename',$catename);
		if($catename == 'news'){
			$this->title ( '评奖新闻 - 文章管理' );
		}else if($catename=='reports'){
			$this->title ( '媒体报道 - 文章管理' );
		}
		//查询条件 是否审核
		$map['catename'] = $catename;
		//显示列表
		$pagesize = 20;
		$count = $this->prize_mod->where($map)->order('addtime desc')->count();
		$pager = $this->_pager($count, $pagesize);
		$arrArticleItem =  $this->prize_mod->where($map)->order('addtime desc')->limit($pager->firstRow.','.$pager->listRows)->select();
		
		foreach($arrArticleItem as $key=>$item){
			$arrArticle [] = $item;
			$arrArticle [$key]['catename'] = $catename;
			$arrArticle [$key]['user'] = D('user')->getOneUser($item['userid']);
			$arrArticle [$key]['addtime'] = date('Y-m-d H:i:s',$item['addtime']);
		}

		$this->assign('pageUrl', $pager->fshow());
		$this->assign ( 'arrArticles', $arrArticle );

		
		$this->display('list');
	}
	//添加文章
	public function add(){
		$catename = $this->_get('catename','trim');
		if(IS_POST){
			$userid = $_SESSION['admin']['userid'];
			if($userid>0){
	
				$data ['userid'] = $userid;
				$data ['catename'] = $this->_post ( 'catename', 'trim','news');
				$data ['title'] = $this->_post ( 'title', 'trim' );
				$data ['addtime'] = time ();
					
				$data ['content'] = $this->_post ( 'content');
	
				$data ['postip'] = get_client_ip ();
				$data ['newsauthor'] = $this->_post('newsauthor','trim','');


				if (false === $this->prize_mod->create ($data)) {
					$this->error ( $this->mod->getError () );
				}
				// 保存当前数据对象
				$id = $this->prize_mod->add ();
				if ($id !== false) { // 保存成功
					//更新图片
					$map['typeid'] = $id;
					D('images')->updateImage($map,array('type'=>'prize','typeid'=>0));
					$this->success ( '新增成功!',U('prize/manage',array('catename'=>$data ['catename'])));
				} else {
					// 失败提示
					$this->error ( '新增失败!' );
				}
				 
			}
		}else{
			$this->assign('catename',$catename);
			$this->title ( '添加文章' );
			$this->display();
		}
	}
	// 编辑文章
	public function editarticle(){
	
		if(IS_POST){
			$id = $this->_post('id','trim,intval');
				
			$data ['catename'] = $this->_post ( 'catename');
			$data ['title'] = $this->_post ( 'title', 'trim' );
			$data ['uptime'] = time ();
				
			$data ['content'] = $this->_post ( 'content');
			$data ['newsauthor'] = $this->_post('newsauthor','trim','');

			//开始更新
			$this->prize_mod->where(array('id'=>$id))->save($data);
			$this->success('保存更新成功！', U('prize/manage',array('catename'=>$data ['catename'])));
		}else{
			$id = $this->_get('id','trim,intval');
			!empty($id) && $strArt = $this->prize_mod->getOneArticle($id);

				
			$this->assign('strArt',$strArt);

			$this->display();
		}
	
	}
	//删除单个文章
	public function delarticle(){
		$id = $this->_get ( 'id' , 'intval'); //文章id
		$catename = $this->_get('catename','trim');
		// 根据id获取内容
		$strArticle = $this->prize_mod->getOneArticle($id);
		// 执行删除
		$this->prize_mod->delOneArticle($id);
		$this->success('删除成功！',U('prize/manage',array('catename'=>$catename)));
	}
	//ajax删除数据
	public function ajax_delete(){
		$itemid = $this->_post('itemid');
		$ik = $this->_get ( 'ik', 'trim');
		if(!empty($itemid)){
	
			switch ($ik) {
				case "article" :
					//删除
					if($this->prize_mod->delArticle($itemid)){
						$arrJson = array('r'=>0, 'html'=> '删除成功');
					}else{
						$arrJson = array('r'=>1, 'html'=> '删除失败！');
					}
					echo json_encode($arrJson);
					break;
			}
	
		}
	}	
	public function medias(){
		$lists = D('photos')->getPhotos('medias');
		$this->assign('lists',$lists);
		$this->title ( 'LOGO列表' );
		$this->display();
	}
	public function addmedias(){
		$type = $this->_get('type','trim','');
		
		if($type == 'n'){
			if(IS_POST){
				//上传
				$arrUpload = D('images')->addPhoto($_FILES['picfile'],'medias');
				
				if($arrUpload){
					$arrData = array(
							'type' => 'medias',
							'name' => $arrUpload['filename'],
							'path' => $arrUpload['path'],
							'size' => $arrUpload['size'],
							'addtime' => time(),
					);
					
					if(!false == D('photos')->create ($arrData)){
						$photoid = D('photos')->add();
						$this->redirect('prize/medias');
					}
				}
			}
		}
		$this->assign('type',$type);
		$this->title ( '添加LOGO' );
		$this->display();
	}
	public function ajaxupload(){
		if(IS_POST){
			$type = $this->_post('type','trim');
			//上传
			$arrUpload = D('images')->addPhoto($_FILES['Filedata'],$type);
			if($arrUpload){
				$arrData = array(
						'type' => 'medias',
						'name' => $arrUpload['filename'],
						'path' => $arrUpload['path'],
						'size' => $arrUpload['size'],
						'addtime' => time(),
				);
					
				if(!false == D('photos')->create ($arrData)){
					$photoid = D('photos')->add();
				}
			}
			
		}else{
			$this->error('非法操作');
		}
	}
	public function deleteimg(){
		$id = $this->_get ( 'id' , 'intval'); //文章id
		$type = $this->_get('type','trim');
		// 执行删除
		D('photos')->where(array('id'=>$id,'type'=>$type))->delete();
		$this->success('删除成功！',U('prize/medias'));
	}
	//焦点图
	public function focus(){
		$focus_mod = D('focus');
		$list = $focus_mod->select();
		$this->assign('list',$list);
		$this->title ( '焦点图管理' );
		$this->display();	
	} 
	public function addfocus(){
		$focus_mod = D('focus');
		//添加
		if (IS_POST) {
			$id = $this->_post('id','trim','0');
			if(empty($id)){
				if (false === $focus_mod->create ()) {
					$this->error ( $focus_mod->getError () );
				}
				// 保存当前数据对象
				$aid = $focus_mod->add ();
				if ($aid !== false) { // 保存成功
					$this->redirect(U('prize/focus'));
				}else{
					$this->error ( '新增失败!' );
				}
			}else{
				//编辑
				if (false === $focus_mod->create ()) {
					$this->error ( $focus_mod->getError () );
				}
				$focus_mod->where(array('id'=>$id))->save();
				$this->redirect(U('prize/focus'));
			}
				
		} else {
			$this->title ( '添加图片' );
			$this->display();
		}
	}
	public function editfocus(){
		$id = $this->_get('id');
		$strAd = D('focus')->where(array('id'=>$id))->find();
		$this->assign('strAd',$strAd);
		$this->title ( '编辑图片' );
		$this->display('addfocus');
	}
	public function delfocus(){
		$id = $this->_get('id');
		$strNav = D('focus')->where(array('id'=>$id))->delete();
		$this->redirect(U('prize/focus'));
	}
	//上传图片
	public function ajax_upload_img() {
		$type = $this->_get('type', 'trim', 'picfile');
		if (!empty($_FILES[$type]['name'])) {
			$dir = date('ym/d/');
			$result = $this->_upload($_FILES[$type], 'focus/'. $dir );
			if ($result['error']) {
				$arrJson = array('r'=>0, 'html'=> $result['info']);
				echo json_encode($arrJson);
			} else {
				$savename = 'focus/'.$dir . $result['info'][0]['savename'];
				$arrJson = array('r'=>1, 'html'=> attach($savename));
				echo json_encode($arrJson);
			}
		} else {
			$arrJson = array('r'=>0, 'html'=> '上传失败');
			echo json_encode($arrJson);
		}
	}

}