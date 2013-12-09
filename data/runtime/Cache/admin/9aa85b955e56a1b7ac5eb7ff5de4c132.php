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
<h2><?php echo ($title); ?></h2>
<form method="POST" action="<?php echo U('singlepage/update');?>" id="formMini" onsubmit="return miniSubmit(this)">
<input name="id" value="<?php echo ($strPage[id]); ?>"  type="hidden"/>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th>标题：</th>
		<td><input name="title" value="<?php echo ($strPage[title]); ?>" style="width:600px" type="text"/></td>
	</tr> 
	<tr>
		<th>页面别名：</th>
		<td>
			<?php echo ($strPage[catename]); ?><input name="catename" value="<?php echo ($strPage[catename]); ?>" type="hidden"/>
        </td>
	</tr> 
	<tr>
		<th>内容：</th>
		<td>
<textarea style="width:100%;" id="editor_mini" name="content" class="txt"   placeholder="请填写内容"><?php echo ($strPage[content]); ?></textarea>        
        </td>
	</tr> 
	<tr>
		<th>作者：</th>
		<td><input name="newsauthor" value="" style="width:300px"/></td>
	</tr>                    
</table>
<div class="page_btn"><input type="submit" value="提 交" class="submit" /></div>

</form>
<!--加载编辑器-->
<script src="__STATIC__/public/js/editor/xheditor/xheditor.js" type="text/javascript"></script>
<script src="__STATIC__/public/js/editor/xheditor/loadeditor.js" type="text/javascript"></script>
<script>
	var type = 'singlepage';
	var typeid = '<?php echo ($strPage[id]); ?>';
</script>

</div>
</body>
</html>