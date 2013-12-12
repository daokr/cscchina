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
<script src="__STATIC__/admin/js/ajaxfileupload.js" type="text/javascript"></script>
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
<h2 style="height:28px;"><span><a href="<?php echo U('content/addcate');?>">+添加奖项名</a></span><?php echo ($title); ?></h2>  

<table  cellpadding="0" cellspacing="0">
<tr class="old">
<td>ID</td>
<td>名称</td>
<td width="280">操作</td>
</tr>
<?php if(is_array($cates)): foreach($cates as $key=>$item): ?><tr class="odd">
<td><?php echo ($item[cateid]); ?></td>
<td><?php echo ($item[catename]); ?></td>
<td><a href="<?php echo U('content/editcate',array('cateid'=>$item[cateid]));?>">[编辑]</a> </td>
<tr><?php endforeach; endif; ?>
</table>

<div class="pagebar"><?php echo ($pageUrl); ?></div>
</div>
</body>
</html>