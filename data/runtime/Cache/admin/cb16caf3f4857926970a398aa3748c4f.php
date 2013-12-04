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
<form method="POST" action="<?php echo U('prize/addfocus');?>" id="formMini" >
<input type="hidden" value="<?php echo ($strAd[id]); ?>" name="id"/>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th>标题：</th>
		<td><input name="name" value="<?php echo ($strAd[name]); ?>" style="width:200px"/></td>
	</tr> 
	<tr>
		<th>所属栏目：</th>
		<td>
        	prize<input name="catename" value="prize" type="hidden"/
        </td>
	</tr>     
	<tr>
		<th>链接地址：</th>
		<td>
			<input name="link" value="<?php echo ($strAd[link]); ?>" style="width:400px"/> 请填写http://地址
        </td>
	</tr> 
	<tr>
		<th>广告图片：</th>
		<td>
        	<input name="picfile" type="file" id="picfile">
            <input name="path" value="<?php echo ($strAd[path]); ?>" type="hidden" id="path">
            <div style="padding:10px 0px" id="img"><?php echo ($strAd[path]); ?></div><div id="imgfile"></div>
        </td>
	</tr>               
</table>
<div class="page_btn"><input type="submit" value="提 交" class="submit" /></div>

</form>
<script language="javascript">
$(function(){
	$('input[name=picfile]').bind('change',function(){
		if($(this).val() !=''){
			var ajaxurl = '<?php echo U("prize/ajax_upload_img");?>'
		$.ajaxFileUpload(
            {
                url : ajaxurl,
                fileElementId : 'picfile',
                dataType : 'json',
                allowType : 'jpg|png|gif|jpeg',
                begin : function(){
                    $('#imgfile').show();
					$('#imgfile').html('上传中。。。。')
                },
                complete : function(){
                 	$('#imgfile').hide();
					$('#imgfile').html('上传中。。。。')
                },
                success : function(data, status){
                    if(data.r == 0){
                        //console.log(data.err_msg);
                        alert(data.html);
                    }else{
						$('#path').val(data.html);
						$('#img').html('<img src="'+data.html+'">');
                    }
                },
                error : function(data, status, e){
                    // console.log(e);
                }
            }
       ); 
		 return false;
	    }
	})
})
</script>

</div>
</body>
</html>