<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<style>
*{ padding:0px; margin:0px; font-size:12px}
ul{ display:block; overflow-y:scroll; list-style-type:none;}
li{ width:100px; height:180px; float:left; margin:10px; overflow:hidden; text-align:center}
</style>
<script>function insertEdit(x){callback(x);}</script>
<script src="__STATIC__/admin/js/jquery.js" type="text/javascript"></script>
<script language="javascript">
function ajaxsetimg(id){
	alert(id);
}
</script>
</head>

<body>
<form action="index.php?g=admin&m=images&a=add"  enctype="multipart/form-data" method="POST">
<input type="hidden" name="type" value="<?php echo ($type); ?>">
<input type="hidden" name="typeid" value="<?php echo ($typeid); ?>">
<input name="file" type="file" id="file"> <input type="submit" value="开始上传" >
</form>
<hr>
<?php if(is_array($list)): foreach($list as $key=>$item): ?><li>
<a href="javascript:void(0)" onclick="insertEdit('<?php echo ($item[bimg]); ?>');">
<img src="<?php echo ($item[simg]); ?>" title="点击插入" width="120" height="120"/></a>
<div align="center"><label><input type="radio" value="1" name="topimg" onClick="ajaxsetimg(<?php echo ($item[id]); ?>)"> 设为主图</label></div>
</li><?php endforeach; endif; ?>
</ul>

</body>
</html>