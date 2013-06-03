<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class article_itemModel extends Model {
	// 自动验证设置
	protected $_validate	 =	 array(
			array('title','require','分类必须填写'),
			array('title','','标题已经存在',0,'unique',self::MODEL_INSERT),
				
	);
	

}