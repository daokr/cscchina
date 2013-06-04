<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class adModel extends Model {
	// 自动验证设置
	protected $_validate	 =	 array(
			array('name','require','广告名称必须填写'),
			array('name','','广告名称已经存在',0,'unique',self::MODEL_INSERT),
				
	);
	

}