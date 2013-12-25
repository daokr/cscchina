<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class imagesAction extends backendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->_mod = D('images');	
		$this->userid = $_SESSION['admin']['userid'];	
	}
	public function add() { 
		$typeid  = $this->_post('typeid','intval','0');
		$file = $_FILES ['file'];
		$type = $this->_post('type','trim','');
		$userid = $this->userid;
		// 上传
		if (! empty ( $file )) {
			$data_dir = date ( 'Y/md/H' );
			$result = savelocalfile($file,$type . '/' . $data_dir,
					array (
					'width'=>C('ik_simg.width').','.C('ik_mimg.width').','.C('ik_bimg.width'),
					'height'=>C('ik_simg.height').','.C('ik_mimg.height').','.C('ik_bimg.height')
					),
					array('jpg','jpeg','png','gif'));
			if ($result ['error']) {
				//$arrJson = array('r'=>1, 'html'=> $result ['error']);
				//return $arrJson;
				 echo '图片上传失败；请重试！';
			} else {
				$name = $result ['filename'];
				$path = $type . '/'.$data_dir . '/' ;
				$size = $result ['size'];
				$title = $result ['name'];
				$photoid = D('images')->addImage($name,$path,$size,$title,$type,$typeid,$userid);
				//浏览该$photoid下的照片
				$arrPhoto = D('images')->getImageById($photoid);
				$arrJson = array(
						'id'=> $photoid,
						'layout'=> $arrPhoto['align'],
						'title'=>'',
						'seq_id'=> $arrPhoto['seqid'],
						'small_photo_url'=> $arrPhoto['simg'],
						'mid_photo_url'=> $arrPhoto['mimg'],
						'big_photo_url'=> $arrPhoto['bimg'],
						'ajaxurl' => U('images/delete'),
				);
				//echo json_encode($arrJson);
				//查询全部新传
				$list = D('images')->getImagesByTypeid($type,$typeid);
				$this->assign('list' ,$list);
				$this->display('images');
			}
		}else{
			 echo '图片上传失败；请重试！';
			//$arrJson = array('r'=>1, 'html'=> '请选择图片再上传！');
			//return $arrJson;
			//$this->error('图片上传失败；请重试！');
		}
	}
	// 删除图片
	public function delete(){
		$id = $this->_post('id','intval');
		if($id>0){
			$this->_mod->delImage($id);
			$this->ajaxReturn(1);
		}
	}
	public function imgupload(){
		$typeid  = $this->_get('typeid','intval','0');
		$type  = $this->_get('type','trim','');
		
		$list = D('images')->getImagesByTypeid($type,$typeid);
		$this->assign('list' ,$list);
		$this->assign('typeid',$typeid);
		$this->assign('type',$type);
		$this->display();
	}
	//设置主图
	public function sethead(){
		$type = $this->_post('type','trim');
		$typeid = $this->_post('typeid','trim');
		$id = $this->_post('itemid','trim,intval');
		if($id>0){
			$this->_mod->where(array('type'=>$type,'typeid'=>$typeid))->setField('ishead',0);
			$this->_mod->where(array('id'=>$id))->setField('ishead',1);
			$this->ajaxReturn(1);
		}
		
	}

}