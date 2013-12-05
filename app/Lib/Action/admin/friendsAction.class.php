<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class friendsAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->mod = D ( 'friends' );
	}
	//焦点图
	public function manage(){
		$list = $this->mod->select();
		$this->assign('list',$list);
		$this->title ( '友情链接管理' );
		$this->display();	
	} 
	public function add(){
		//添加
		if (IS_POST) {
			$id = $this->_post('id','trim','0');
			if(empty($id)){
				if (false === $this->mod->create ()) {
					$this->error ( $this->mod->getError () );
				}
				// 保存当前数据对象
				$aid = $this->mod->add ();
				if ($aid !== false) { // 保存成功
					$this->redirect(U('friends/manage'));
				}else{
					$this->error ( '新增失败!' );
				}
			}else{
				//编辑
				if (false === $this->mod->create ()) {
					$this->error ( $this->mod->getError () );
				}
				$this->mod->where(array('id'=>$id))->save();
				$this->redirect(U('friends/manage'));
			}
				
		} else {
			$this->title ( '添加图片' );
			$this->display();
		}
	}
	public function edit(){
		$id = $this->_get('id');
		$strAd = $this->mod->where(array('id'=>$id))->find();
		$this->assign('strAd',$strAd);
		$this->title ( '编辑图片' );
		$this->display('addfocus');
	}
	public function del(){
		$id = $this->_get('id');
		$strNav = $this->mod->where(array('id'=>$id))->delete();
		$this->redirect(U('friends/manage'));
	}
	//上传图片
	public function ajax_upload_img() {
		$type = $this->_get('type', 'trim', 'picfile');
		if (!empty($_FILES[$type]['name'])) {
			$dir = date('ym/d/');
			$result = $this->_upload($_FILES[$type], 'friends/'. $dir );
			if ($result['error']) {
				$arrJson = array('r'=>0, 'html'=> $result['info']);
				echo json_encode($arrJson);
			} else {
				$savename = 'friends/'.$dir . $result['info'][0]['savename'];
				$arrJson = array('r'=>1, 'html'=> attach($savename));
				echo json_encode($arrJson);
			}
		} else {
			$arrJson = array('r'=>0, 'html'=> '上传失败');
			echo json_encode($arrJson);
		}
	}

}