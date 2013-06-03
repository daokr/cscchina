<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="160780470@qq.com" />
<meta name="Copyright" content="<?php echo ($ikphp["ikphp_site_name"]); ?>" />
<title><?php echo ($title); ?> - <?php echo ($site_title); ?></title>
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/style.css" />
<!--[if gte IE 7]><!-->
    <link href="__STATIC__/admin/js/dialog/skins5/idialog.css" rel="stylesheet" />
<!--<![endif]-->
<!--[if lt IE 7]>
    <link href="__STATIC__/admin/js/dialog/skins5/idialog.css" rel="stylesheet" />
<![endif]-->
<script src="__STATIC__/admin/js/jquery.js" type="text/javascript"></script>
<script src="__STATIC__/admin/js/common.js" type="text/javascript"></script>
<script>
var siteUrl = "<?php echo C('ik_site_url');?>";
</script>
<script src="__STATIC__/admin/js/dialog/jquery.artDialog.min5.js" type="text/javascript"></script> 
<script language="javascript">
function tips(c){ $.dialog({content: '<font style="font-size:14px;">'+c+'</font>',fixed: true, width:300, time:1500});}
function succ(c){ $.dialog({icon: 'succeed',content: '<font  style="font-size:14px;">'+c+'</font>' , time:2000});}
function error(c){$.dialog({icon: 'error',content: '<font  style="font-size:14px;">'+c+'</font>' , time:2000});}
</script>
</head>
<body>
<!--main-->
<div class="midder">
<h2><?php echo ($title); ?></h2> 
<form method="POST" action="<?php echo U('setting/setnav',array('ik'=>'add'));?>" id="formMini" >
<table cellpadding="0" cellspacing="0">
	<tr>
		<th>导航名称：</th>
		<td><input name="name" value="" style="width:200px"/></td>
	</tr> 
	<tr>
		<th>链接地址：</th>
		<td>
			<input name="link" value="" style="width:400px"/> 请填写http://地址
        </td>
	</tr> 
	<tr>
		<th>排序：</th>
		<td>
        <input name="ordid" value="" style="width:100px"/> 请填写数字；提示：值越大越在前面
        </td>
	</tr>               
</table>
<div class="page_btn"><input type="submit" value="提 交" class="submit" /></div>

</form>


</div>
</body>
</html>