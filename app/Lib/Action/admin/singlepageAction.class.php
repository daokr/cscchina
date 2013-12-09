<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class singlepageAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->mod = D ( 'singlepage' );
	}
	
	public function manage(){
		$catename = $this->_get('catename','trim');
		$res = $this->mod->where(array('catename'=>$catename))->find();
		if(empty($res)){
			//不存在新增
			$data['catename'] = $catename;
			if (false !== $this->mod->create ( $data )) {
				$id = $this->mod->add ();
				$strPage = $this->mod->where(array('catename'=>$catename))->find();
			}else{
				$this->error ($this->mod->getError () );
			}
		}else{
			//存在就查询
			$strPage = $this->mod->where(array('catename'=>$catename))->find();
		}
		
		$this->assign('strPage',$strPage);
		$this->title('单页管理');
		$this->display();
	}
	public function update(){
		if(IS_POST){
			$id = $this->_post('id','trim,intval');
			$data ['catename'] = $this->_post ( 'catename', 'trim');
			$data ['title'] = $this->_post ( 'title', 'trim' );
			$data ['content'] = $this->_post ( 'content');
			$data ['newsauthor'] = $this->_post('newsauthor','trim','');
			$data ['uptime'] = time ();

			//开始更新
			$this->mod->where(array('id'=>$id))->save($data);
			$this->success('保存更新成功！', U('singlepage/manage',array('catename'=>$data ['catename'])));
			
		}
	}
	

}