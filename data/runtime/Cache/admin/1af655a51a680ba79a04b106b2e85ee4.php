<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<style>
*{ padding:0px; margin:0px; font-size:12px}
a{ color:#09C; text-decoration:none}
body{ padding:10px}
ul{ display:block;list-style-type:none;}
li{ width:100px;  float:left; margin:10px 20px; overflow:hidden; text-align:center}
.line{ display:block; line-height:1px; margin:10px 0px; height:1px; font-size:0px; display:block; border:#ddd dotted 1px;}
</style>
<script>function insertEdit(x){callback(x);}</script>

<script src="__STATIC__/admin/js/jquery.js" type="text/javascript"></script>
<script language="javascript">
function ajaxsetimg(id,obj){
	var url = '<?php echo U("images/sethead");?>';
	var type = $(obj).attr('types');
	var typeid = $(obj).attr('typeid');
	$.post(url,{itemid:id,type:type,typeid:typeid},function(res){
		if(res==1) {alert('设置成功!')}else{ alert("设置失败！")};
	})
}
function delimg(id,o){
	var c = confirm('真的要删除吗？');
	var url = '<?php echo U("images/delete");?>';
	if(c){
		$.post(url,{id:id},function(res){
			if(res==1) {
				$(o).parents('li').remove();
			}else{
				alert('服务器忙；稍后再试试！')
			}
		})		
	}
}
</script>
</head>

<body>


<?php if(!empty($list)): ?><h3>点击图片插入到编辑框</h3>
<ul>
<?php if(is_array($list)): foreach($list as $key=>$item): ?><li>
<a href="javascript:void(0)" onclick="insertEdit('<?php echo ($item[bimg]); ?>');">
<img src="<?php echo ($item[simg]); ?>" title="点击插入" width="120" height="120" border="0"/></a>
<div align="center"><label><input type="radio" <?php if(($item["ishead"]) == "1"): ?>checked<?php endif; ?> value="1" name="topimg" onClick="ajaxsetimg(<?php echo ($item[id]); ?>,this)" typeid="<?php echo ($item[typeid]); ?>" types="<?php echo ($item[type]); ?>"> 设为主图</label>&nbsp;&nbsp;<label><a href="javascript:;" onClick="delimg(<?php echo ($item[id]); ?>,this)" >删除</a></label></div>
</li><?php endforeach; endif; ?>
</ul><?php endif; ?>

</body>
</html>