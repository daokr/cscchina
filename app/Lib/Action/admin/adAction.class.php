<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class adAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->mod = D ( 'ad' );
	}
	public function adlist(){
		$arrNav = $this->mod->select();
		$this->assign('list',$arrNav);
		$this->title ( '网站广告管理' );
		$this->display();		
	}
	public function manage(){
		$ik = $this->_get('ik');
		if($ik == 'add'){
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
						$this->redirect(U('ad/adlist'));
					}else{
						$this->error ( '新增失败!' );
					}
				}else{
					if (false === $this->mod->create ()) {
						$this->error ( $this->mod->getError () );
					}
					 $this->mod->where(array('id'=>$id))->save();
					 $this->redirect(U('ad/adlist'));
				}

					
			} else {
				$this->title ( '添加广告' );
				$this->display();
			}
		}
		if($ik == 'edit'){
			$id = $this->_get('id');
			$strAd = $this->mod->where(array('id'=>$id))->find();
			$this->assign('strAd',$strAd);
			$this->title ( '编辑广告' );
			$this->display();
		}
		
		if($ik == 'del'){
			$id = $this->_get('id');
			$strNav = $this->mod->where(array('id'=>$id))->delete();
			 $this->redirect(U('ad/adlist'));
		}
		

	}	
	//上传图片
	public function ajax_upload_img() {
		$type = $this->_get('type', 'trim', 'picfile');
		if (!empty($_FILES[$type]['name'])) {
			$dir = date('ym/d/');
			$result = $this->_upload($_FILES[$type], 'advert/'. $dir );
			if ($result['error']) {
				$arrJson = array('r'=>0, 'html'=> $result['info']);
				echo json_encode($arrJson);
			} else {
				$savename = 'advert/'.$dir . $result['info'][0]['savename'];
				$arrJson = array('r'=>1, 'html'=> attach($savename));
				echo json_encode($arrJson);
			}
		} else {
				$arrJson = array('r'=>0, 'html'=> '上传失败');
				echo json_encode($arrJson);
		}
	}
}