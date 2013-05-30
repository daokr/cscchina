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

<div style="margin:150px auto; width:350px;">
  <img src="__STATIC__/public/images/ik_error.gif" style="float:left;">
  <ul style="margin-left:10px; list-style-type:none; list-style-image: none; list-style-position:outside;">
    <li style="font-size:14px; line-height: 32px; padding-left:30px"><?php echo ($error); ?></li>
    <li style="color:#666;line-height: 10px;">&nbsp;</li>

    <li style="color:#666;"> 
        &gt; <span id="f3s">3</span>秒后 <a href="<?php echo ($jumpUrl); ?>">点击返回</a>
        <script type="text/javascript">
            (function(){
                var secs=5,si=setInterval(function(){
                    if(--secs){
                        document.getElementById('f3s').innerHTML = secs;
                    }
                    else{
                        location.href="<?php echo ($jumpUrl); ?>";clearInterval(si);
                    }
            }, 1000)})();
        </script>
 	</li>

  </ul>
</div>

</body>
</html>