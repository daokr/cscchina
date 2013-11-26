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
<h2><span><a href="<?php echo U('prize/add',array('catename'=>$catename));?>">+添加文章</a></span><?php echo ($title); ?></h2>  
<div class="Toolbar_inbox">
<a class="btn_a" href="javascript:;" data-url="<?php echo U('prize/ajax_delete',array('ik'=>'article','catename'=>$catename));?>" onclick="Delete(this)">
<span>删除选中</span>
</a>

<a class="btn_a" href="<?php echo U('prize/add',array('catename'=>$catename));?>"  onclick="Audit(this)">
<span>+添加文章</span>
</a>    
</div>
<table  cellpadding="0" cellspacing="0">
<tr class="old">
<td width="20"><input name="chkall" onclick="ToggleCheck(this)" type="checkbox"></td>
<td>itemid</td>
<td>标题</td>
<td>系统分类</td>
<td>添加人</td>
<td>发布日期</td>
<td>审核状态</td>
<td>状态</td>
<td>排序</td>
<td width="280">操作</td>
</tr>
<?php if(is_array($arrArticles)): foreach($arrArticles as $key=>$item): ?><tr class="odd">
<td><input type="checkbox" value="<?php echo ($item[id]); ?>" name="itemid"></td>
<td><?php echo ($item[id]); ?></td>
<td><a href="index.php?m=prize&a=show&id=<?php echo ($item[id]); ?>" target="_blank"><?php echo ($item[title]); ?></a></td>
<td><?php echo ($item[catename]); ?></td>
<td><?php echo ($item[user][username]); ?></td>
<td><?php echo ($item[addtime]); ?></td>
<td>
<?php if($item[isaudit] == 0): ?>已审核
<?php else: ?>
未审核<?php endif; ?>
</td>
<td>
<?php if($item[istop] == 1): ?><font color="green">顶</font>&nbsp;<?php endif; ?>
<?php if($item[isdigest] == 1): ?><font color="blue">头</font><?php endif; ?>
</td>
<td><span class="tdedit" data-id="<?php echo ($item[id]); ?>" data-field="orderid" data-tdtype="edit" data-action="<?php echo U('prize/ajax_setting',array('ik'=>'order','id'=>$item[id]));?>"><?php echo ($item[orderid]); ?></span></td>
<td>
<a href="<?php echo U('prize/editarticle',array('catename'=>$item[catename],'id'=>$item[id]));?>">[编辑]</a> 

<a href="<?php echo U('prize/delarticle',array('catename'=>$item[catename],'id'=>$item[id]));?>" onClick="return confirm('确定要执行删除操作吗？')">[删除]</a> 



<?php if($item[istop] == 0): ?><a href="<?php echo U('prize/index',array('ik'=>'istop','catename'=>$item[catename],'id'=>$item[id],'istop'=>'1'));?>">[置顶]</a> 
<?php else: ?>
<a href="<?php echo U('prize/index',array('ik'=>'istop','catename'=>$item[catename],'id'=>$item[id],'istop'=>'0'));?>">[取消置顶]</a><?php endif; ?>


</td>
<tr><?php endforeach; endif; ?>
</table>

<div class="pagebar"><?php echo ($pageUrl); ?></div>
</div>
</body>
</html>