<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class photosModel extends Model {
	//根据用户photoid 图片
	public  function getPhotos($type){
		$where = array('type'=>$type);
		$res = $this->where($where)->select();
		foreach($res as $key=>$item){
			$result[$key] = $item;
			$ext =  explode ( '.', $item['name']);
			//图片大小
			$result[$key]['simg'] =  attach($item['path'].$ext[0].'_'.C('ik_simg.width').'_'.C('ik_simg.height').'.jpg');
			$result[$key]['mimg'] =  attach($item['path'].$ext[0].'_'.C('ik_mimg.width').'_'.C('ik_mimg.height').'.jpg');
			$result[$key]['bimg'] =  attach($item['path'].$ext[0].'_'.C('ik_bimg.width').'_'.C('ik_bimg.height').'.jpg');
			$result[$key]['img']  =  attach($item['path'].$ext[0].'.'.$ext[1]);
		}
		return $result;		
	}
	

}