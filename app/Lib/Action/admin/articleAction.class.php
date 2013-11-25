<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class articleAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->mod = D ( 'article' );
		$this->cate_mod = D ( 'article_cate' );
		$this->item_mod = D ( 'article_item' );
		$this->channel_mod = D ( 'article_channel' );
	}
	public function index() {
		$ik = $this->_get ( 'ik', 'trim' ,'list');
		$cateid = $this->_get ( 'cateid', 'trim');
		$arrCate = $this->cate_mod->getAllCate();
		if(empty($cateid)){
			$cateid = $arrCate[0]['cateid'];
		}
		$this->assign('cateid',$cateid);
		$this->assign ( 'arrCate', $arrCate );
		$this->assign('ik',$ik);
		$this->title ( '文章管理' );
		switch ($ik) {
			case "isaudit" :
				$this->article_isaudit($cateid);
				break;
			case "istop" :
				$this->article_istop($cateid);
				break;
			case "isdigest" :
				$this->article_isdigest($cateid);
				break;
			case "list" :
				$this->article_list($cateid);
				break;
		}
	}
	// 文章列表
	public function article_list($cateid){
		$isaudit = $this->_get('isaudit','intval','0');

		//查询条件 是否审核
		$map['cateid'] = $cateid;
		$map['isaudit'] = $isaudit;
		//显示列表
		$pagesize = 20;  
		$count = $this->item_mod->where($map)->order('addtime desc')->count('itemid');
		$pager = $this->_pager($count, $pagesize);
		$arrArticleItem =  $this->item_mod->where($map)->order('addtime desc')->limit($pager->firstRow.','.$pager->listRows)->select();
		
		foreach($arrArticleItem as $key=>$item){
			$arrArticle [] = $item;
			$arrArticle [$key]['cate'] = $this->cate_mod->getOneCate($item['cateid']);
			$arrArticle [$key]['user'] = D('user')->getOneUser($item['userid']);
			$arrArticle [$key]['addtime'] = date('Y-m-d H:i:s',$item['addtime']);
		}
		// 未审核数目
		$count_isaudit = $this->item_mod->where(array('isaudit'=>'1'))->count('itemid');
	
		
		$this->assign('pageUrl', $pager->fshow());
		$this->assign ( 'arrArticles', $arrArticle );
		$this->assign ( 'count_isaudit', $count_isaudit );
		$this->assign ( 'isaudit', $isaudit );
		
		
		$this->display('article_list');
	}
	//添加文章
	public function addarticle(){
		$cateid = $this->_get('cateid','trim');
		$strCate = $this->cate_mod->getOneCate ( $cateid );
		$arrCate = $this->cate_mod->getAllCate();
		if(IS_POST){
			$userid = $_SESSION['admin']['userid'];
			if($userid>0){
				
				$item ['userid'] = $userid;
				$item ['cateid'] = $this->_post ( 'cateid', 'intval',0);
				$item ['title'] = $this->_post ( 'title', 'trim' );
				$item ['addtime'] = time ();
					
				$data ['content'] = $this->_post ( 'content');

				$data ['postip'] = get_client_ip ();
				$data ['newsauthor'] = $this->_post('newsauthor','trim','');
				
				if($item ['cateid'] == 0){
					$this->error('分类必须选择！');
				}
				if (false !== $this->item_mod->create ( $item )) {
		           	$itemid = $data ['itemid'] = $this->item_mod->add ();
					if (false === $this->mod->create ($data)) {
						$this->error ( $this->mod->getError () );
					}
					// 保存当前数据对象
					$aid = $this->mod->add (); 
					if ($aid !== false) { // 保存成功
						//更新图片
						$map['typeid'] = $aid;
						D('images')->updateImage($map,array('type'=>'article','typeid'=>0));
						$this->success ( '新增成功!',U('article/index',array('ik'=>'list','cateid'=>$item ['cateid'])));
					} else {
						// 失败提示
						$this->error ( '新增失败!' );
					}
		        }else{
		        	    $this->error ($this->item_mod->getError () );
		        }
		       
			}
		}else{
			$this->assign('strCate',$strCate);
			$this->assign('arrCate',$arrCate);
			$this->assign('cateid',$cateid);
			$this->title ( '添加文章' );
			$this->display();		
		}
	}
	// 编辑文章
	public function editarticle(){
		
		if(IS_POST){
			$itemid = $this->_post('itemid','trim,intval');
			
			$item ['cateid'] = $this->_post ( 'cateid', 'intval',0);
			$item ['title'] = $this->_post ( 'title', 'trim' );
			$item ['uptime'] = time ();
					
			$data ['content'] = $this->_post ( 'content');
			$data ['newsauthor'] = $this->_post('newsauthor','trim','');
			
			if($item ['cateid'] == 0){
				$this->error('分类必须选择！');
			}
			//开始更新
			$this->item_mod->where(array('itemid'=>$itemid))->save($item);
			$this->mod->where(array('aid'=>$itemid))->save($data);
			$this->success('保存更新成功！', U('article/index',array('ik'=>'list','cateid'=>$item ['cateid'])));
		}else{
			$itemid = $this->_get('itemid','trim,intval');
			!empty($itemid) && $strArt = $this->mod->getOneArticle($itemid);
			
			$strCate = $this->cate_mod->getOneCate($strArt['cateid']);
			$arrCate = $this->cate_mod->getAllCate();
			
			$this->assign('strArt',$strArt);
			$this->assign('strCate',$strCate);
			$this->assign('arrCate',$arrCate);
			$this->display();			
		}

	}
	//单个审核
	public function article_isaudit($cateid){
		$itemid = $this->_get('itemid','intval');
		$isaudit = $this->_get('isaudit','intval','0');
		$strItem = $this->mod->getOneArticleItem($itemid);
		if($strItem){
			$this->item_mod->where(array('itemid'=>$itemid))->setField(array('isaudit'=>$isaudit));
			$isaudit = $isaudit == 0? 1 : 0;
			$this->redirect ( 'article/index',array('ik'=>'list','cateid'=>$cateid,'isaudit'=>$isaudit));
		}else{
			$this->error('文章不存在或已被删除！');
		}
	}
	//单个置顶
	public function article_istop($cateid){
		$itemid = $this->_get('itemid','intval');
		$istop = $this->_get('istop','intval','0');
		$strItem = $this->mod->getOneArticleItem($itemid);
		if($strItem){
			$this->item_mod->where(array('itemid'=>$itemid))->setField(array('istop'=>$istop));
			$this->redirect ( 'article/index',array('ik'=>'list','cateid'=>$cateid,'isaudit'=>$strItem['isaudit']));
		}else{
			$this->error('文章不存在或已被删除！');
		}
	}	
	//单个头条精华
	public function article_isdigest($cateid){
		$itemid = $this->_get('itemid','intval');
		$isdigest = $this->_get('isdigest','intval','0'); 
		$strItem = $this->mod->getOneArticleItem($itemid);
		if($strItem){
			$this->item_mod->where(array('itemid'=>$itemid))->setField(array('isdigest'=>$isdigest));
			$this->redirect ( 'article/index',array('ik'=>'list','cateid'=>$cateid,'isaudit'=>$strItem['isaudit']));
		}else{
			$this->error('文章不存在或已被删除！');
		}
	}	
	//ajax 设置 头条 置顶 审核 等操作
	public function ajax_setting(){
		$itemid = $this->_get('id');//信息id 
		$ik = $this->_get ( 'ik', 'trim');
		$field = $this->_post('field');
		$fieldval = $this->_post('fieldval');
		switch ($ik) {
			case "order" :
					$result = $this->item_mod->where(array('itemid'=>$itemid))->setField($field,$fieldval);
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
	//删除单个文章
	public function delarticle(){
		$id = $this->_get ( 'itemid' , 'intval'); //文章id
		// 根据id获取内容
		$strArticle = $this->mod->getOneArticle($id);
		// 执行删除
		$this->mod->delOneArticle($id);
		$this->success('删除成功！',U('article/index'));
	}
	//ajax删除数据
	public function ajax_delete(){
		$itemid = $this->_post('itemid');
		$ik = $this->_get ( 'ik', 'trim');
		if(!empty($itemid)){
				
			switch ($ik) {
				case "article" :
					//删除
					if($this->mod->delArticle($itemid)){
						$arrJson = array('r'=>0, 'html'=> '删除成功');
					}else{
						$arrJson = array('r'=>1, 'html'=> '删除失败！');
					}
					echo json_encode($arrJson);
					break;
			}
	
		}
	}


	
	// 分类管理
	public function cate() {
		$ik = $this->_get ( 'ik', 'trim' ,'list');
		$this->assign('ik',$ik);
		$this->title ( '分类管理' );
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
	// 单个频道的分类列表
	public function cate_list(){
		$arrCate = $this->cate_mod->getAllCate();
		$this->assign('arrCate',$arrCate);
		$this->display('cate_list');
	}
	public function cate_add(){
		if(IS_POST){

			$catename = $this->_post('catename','trim');
			if(!empty($catename)){
				//执行添加
				if(!false == $this->cate_mod->create()){
					$this->cate_mod->add();
					$this->redirect ( 'article/cate',array('ik'=>'list'));
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
		$strCate = $this->cate_mod->getOneCate($cateid);
		if($strCate){
			if(IS_POST){
				$catename =  $this->_post('catename','trim');
				$this->cate_mod->where(array('cateid'=>$cateid))->setField(array('catename'=>$catename));
				$this->redirect ( 'article/cate',array('ik'=>'list'));
			}else{
				$this->assign('strCate',$strCate);
				$this->display('cate_edit');
			}
		}else{
			$this->error('错误操作');
		}
	}
	public function cate_delete(){
		$cateid = $this->_get('cateid','intval');
		$strCate = $this->cate_mod->getOneCate($cateid); // 旧的分类
		if($strCate){
			if(IS_POST){
				$newcateid = $this->_post('newcateid','intval');
				// 删除旧分类
				$this->cate_mod->where(array('cateid'=>$strCate['cateid']))->delete();
				// 设置新分类
				$this->item_mod->where(array('cateid'=>$strCate['cateid']))->setField(array('cateid'=>$newcateid));
				// 新的分类
				$newCate =$this->cate_mod->getOneCate($newcateid); 
				
				$this->redirect ( 'article/cate',array('ik'=>'list'));
			}else{

				$arrCate = ''; // 初始化下拉列表
				$arrCatename = $this->cate_mod->getAllCate ( );
				foreach ( $arrCatename as $key1 => $item1 ) {
					if($strCate['cateid']!=$item1 ['cateid']){
						$arrCate .= '<option  value="' . $item1 ['cateid'] . '" >' . $item1 ['catename'] . '</option>';
					}
				}

				$this->assign('strCate',$strCate);
				$this->assign ( 'arrCate', $arrCate );				
				$this->display('cate_delete');
			}
		}else{
			$this->error('错误操作');
		}
	}	
}