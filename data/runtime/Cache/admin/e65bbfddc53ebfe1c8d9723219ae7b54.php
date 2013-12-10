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
<script src="__STATIC__/public/js/uploadify/jquery.uploadify.v2.1.4.js" type="text/javascript"></script>

<script src="__STATIC__/public/js/uploadify/swfobject.js" type="text/javascript"></script>

<link type="text/css" rel="stylesheet" href="__STATIC__/public/js/uploadify/uploadify2.css" />

<script type="text/javascript">
	var objdata = {'type': 'teams'};
	var jumpurl = "<?php echo U('prize/teams');?>";
$(document).ready(function()
{		
	$("#uploadify").uploadify({
		'uploader': siteUrl + 'static/public/js/uploadify/uploadify.swf',
		'expressInstall': siteUrl + 'static/public/js/uploadify/expressInstall.swf',
		'script': 'index.php?g=admin&m=prize&a=ajaxupload',
		'scriptData':objdata,
		'method':'POST', 
		'cancelImg': siteUrl+'static/public/js/uploadify/cancel2.png',
		'folder': 'UploadFile',
		'queueID': 'fileQueue',
		'auto': false,
		'multi': true,
		'buttonText': '',
		'buttonImg': siteUrl+'static/public/js/uploadify/upload-btns.png',		
		'fileDesc':'jpg,gif,png图片格式',
		'fileExt':'*.jpg;*.gif;*.png',
		'onAllComplete' : function(event,data) {
			window.location = jumpurl;
		}

	});

})
</script>
</head>
<body>
<!--main-->
<div class="midder">
<h2><?php echo ($title); ?></h2>


            <div class="uploadtype">
                <p class="pl">你可以上传JPG，JPEG， GIF，PNG，每个文件大小可以到1M。</p><br>
                <form enctype="multipart/form-data" action="<?php echo U('prize/addteams',array('type'=>'n'));?>" method="post" name="album_upload">
                
                  <input type="file" name="picfile">
                  <input type="hidden" name="typeid" value="0">
                  <input type="hidden" name="type" value="medias">
                <br><br>
                <span class="bn-flat"><input type="submit" value="开始上传" name="upload" class="submit" ></span>
                </form>
            
            </div>   	
   


</form>

</div>
</body>
</html>