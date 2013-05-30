<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<style>
*{ padding:0px; margin:0px;}
ul{ display:block; overflow-y:scroll; list-style-type:none;}
li{ width:100px; height:180px; float:left; margin:10px; overflow:hidden; text-align:center}
</style>
<script>function insertEdit(x){callback(x);}</script>

</head>

<body>
<ul>
<?php if(is_array($list)): foreach($list as $key=>$item): ?><li>
<a href="javascript:void(0)" onclick="insertEdit('<?php echo ($item[bimg]); ?>');">
<img src="<?php echo ($item[simg]); ?>" title="点击插入" width="120" height="120"/></a>
<div align="center"><input type="radio" value="1" name="topimg"></div>
</li><?php endforeach; endif; ?>
</ul>
</ul>
</div>

</body>
</html>