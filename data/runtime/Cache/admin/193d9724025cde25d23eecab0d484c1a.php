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
<div class="tabnav">
<ul>
<?php if(is_array($arrCate)): foreach($arrCate as $key=>$item): if($item[cateid] == $cateid): ?><li class="select"><a href="<?php echo U('history/hislist',array('ik'=>'list','cateid'=>$item[cateid],'isaudit'=>'0'));?>"><?php echo ($item[catename]); ?></a></li>
    <?php else: ?>
    <li><a href="<?php echo U('history/hislist',array('ik'=>'list','cateid'=>$item[cateid],'isaudit'=>'0'));?>"><?php echo ($item[catename]); ?></a></li><?php endif; endforeach; endif; ?>
</ul>
</div>
<div class="Toolbar_inbox">
	<a class="btn_a" href="<?php echo U('history/manage',array('ik'=>'add','cateid'=>$cateid));?>"><span>添加内容</span></a>
</div>
<table  cellpadding="0" cellspacing="0">
<tr class="old">
<td>ID</td>
<td>标题</td>
<td>所属类别</td>
<td>状态</td>
<td>排序</td>
<td width="200">操作</td>
</tr>
<?php if(is_array($list)): foreach($list as $key=>$item): ?><tr class="odd">
<td><?php echo ($item[id]); ?></td>
<td><?php echo ($item[title]); ?></td>
<td>
	<?php if($item[typeid] == 1): ?>科技评奖<?php endif; ?>
    <?php if($item[typeid] == 2): ?>创新论坛<?php endif; ?>
</td>
<td>
<?php if($item[istop] == 1): ?><font color="green">顶</font>&nbsp;<?php endif; ?>
<?php if($item[isdigest] == 1): ?><font color="blue">头</font><?php endif; ?>
</td>
<td><span class="tdedit" data-id="<?php echo ($item[id]); ?>" data-field="orderid" data-tdtype="edit" data-action="<?php echo U('history/ajax_setting',array('ik'=>'order','id'=>$item[id]));?>"><?php echo ($item[orderid]); ?></span></td>

<td>
<a href="<?php echo U('history/manage',array('ik'=>'edit','id'=>$item[id]));?>">[编辑]</a>&nbsp;&nbsp;
<a href="<?php echo U('history/manage',array('ik'=>'del','id'=>$item[id]));?>">[删除]</a>

<?php if($item[istop] == 0): ?><a href="<?php echo U('history/manage',array('ik'=>'istop','id'=>$item[id],'istop'=>'1'));?>">[置顶]</a> 
<?php else: ?>
<a href="<?php echo U('history/manage',array('ik'=>'istop','id'=>$item[id],'istop'=>'0'));?>">[取消置顶]</a><?php endif; ?>

<?php if($item[isdigest] == 0): ?><a href="<?php echo U('history/manage',array('ik'=>'isdigest','id'=>$item[id],'isdigest'=>'1'));?>">[头条]</a> 
<?php else: ?>
<a href="<?php echo U('history/manage',array('ik'=>'isdigest','id'=>$item[id],'isdigest'=>'0'));?>">[取消头条]</a><?php endif; ?>
</td>
<tr><?php endforeach; endif; ?>
</table>

<div class="pagebar"><?php echo ($pageUrl); ?></div>

</div>
</body>
</html>