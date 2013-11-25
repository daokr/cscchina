<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($seo["title"]); ?> - <?php echo ($seo["subtitle"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["keywords"]); ?>" /> 
<meta name="description" content="<?php echo ($seo["description"]); ?>" /> 
<link rel="shortcut icon" href="__STATIC__/public/images/fav.ico" type="image/x-icon">
<style>__SITE_THEME_CSS__</style>
<!--[if gte IE 7]><!-->
    <link href="__STATIC__/public/js/dialog/skins5/idialog.css" rel="stylesheet" />
<!--<![endif]-->
<!--[if lt IE 7]>
    <link href="__STATIC__/public/js/dialog/skins5/idialog.css" rel="stylesheet" />
<![endif]-->
<script>var siteUrl = '__SITE_URL__';</script>
<script src="__STATIC__/public/js/jquery.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="__STATIC__/public/js/html5.js"></script>
<![endif]-->
<script src="__STATIC__/public/js/dialog/jquery.artDialog.min5.js" type="text/javascript"></script> 
__EXTENDS_JS__
</head>

<body>
<!--头部开始-->
<header>
<div id="header">
	<div class="site_top">
    	<a href="<?php echo C('ik_site_url');?>" class="site_logo" title="<?php echo C('ik_site_title');?>"><?php echo C('ik_site_title');?></a>
        <div class="searchBox">
	        <form action="" target="_blank">
	        	<div class="keyBar"><input type="text" value="" class="keytext"></div>
	            <div class="searchBtn"><a href="javascript:;">搜索</a></div>
	        </form>    
        </div>
    </div>
    <div class="bannerBar">
    	<div><img src="__STATIC__/theme/blue/images/layout/home_4.jpg" width="980" height="242" style="display:block"></div>
        <div class="bannerBom"></div>
    </div>
    <div class="navBar">
    	<ul>
<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/home_6.jpg"></a></li>

<?php if($cateid == ''): ?><li class="on"><a href="<?php echo C('ik_site_url');?>"><img src="__STATIC__/theme/blue/images/layout/home_7.jpg"></a></li>
<?php else: ?>
<li><a href="<?php echo C('ik_site_url');?>"><img src="__STATIC__/theme/blue/images/layout/home_7.jpg"></a></li><?php endif; ?>
<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/home_8.jpg"></a></li>
<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/home_9.jpg"></a></li>

<?php if($cateid == 6): ?><li class="on"><a href="<?php echo U('article/category',array('cateid'=>6));?>"><img src="__STATIC__/theme/blue/images/layout/home_10.jpg"></a></li>
<?php else: ?>
<li class=""><a href="<?php echo U('article/category',array('cateid'=>6));?>"><img src="__STATIC__/theme/blue/images/layout/home_10.jpg"></a></li><?php endif; ?>

<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/home_11.jpg"></a></li>
<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/home_12.jpg"></a></li>
<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/home_13.jpg"></a></li>
<li><a href="<?php echo U('help/contact');?>"><img src="__STATIC__/theme/blue/images/layout/home_14.jpg"></a></li>
        </ul>
    </div>
</div>
</header>

<div class="midder">
<div class="mc">
<h1><?php echo ($seo["title"]); ?></h1>
<div class="cleft">
    <div class="infocontent">
    	<h2>最新版本下载：<font color="#CCCCCC">已被下载（<?php echo ($count); ?>）次</font></h2>
        <p>IKPHP_1.5.2版 更新时间 2013.5.25 
        <br>下载地址：<a href="<?php echo U('help/download',array('id'=>'4'));?>" target="_blank">在本站下载</a>
        </p>
        
        <p>IKPHP_1.5.1版 更新时间 2013.4.15 
        <br>下载地址：<a href="<?php echo U('help/download',array('id'=>'1'));?>" target="_blank">在本站下载</a>
        &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('help/download',array('id'=>'2'));?>" target="_blank">在Admin5下载</a>
        &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('help/download',array('id'=>'3'));?>" target="_blank">中国站长下载</a>
        </p>

                
        <h2>运行环境：</h2>
        <p>本程序使用的开源框架是ThinkPHP，如果有二次开发的请参该<a href="http://doc.thinkphp.cn" target="_blank">官方开发手册</a></p>
        <p>PHP5.2及以上版本，MySQL5.0及以上版本，推荐使用Linux + Apache环境的主机</p>	
        
        <h2>往期12Ik版本下载：</h2>
        <p>12ik-v1.1.zip <a href="http://www.12ik.com/uploadfile/12ik/12ik-v1.0.zip" target="_blank">在本站下载</a></p> 
        <p>12ik-v1.0.zip <a href="http://www.12ik.com/uploadfile/12ik/12ik-v1.0.zip" target="_blank">在本站下载</a></p> 
        <br>
		<br>

        <p>本页持续更新中...</p>
       

    </div>
</div>
<div class="cright"><div class="infomenu">
<ul>
<?php if(is_array($arrMenu)): $i = 0; $__LIST__ = $arrMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if($key == $infokey): ?><li class="select"><a href="<?php echo ($item[url]); ?>"><?php echo ($item[text]); ?></a></li>
    <?php else: ?>
    <li><a href="<?php echo ($item[url]); ?>"><?php echo ($item[text]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div></div>
</div>
</div>

<!--footer-->
<footer>
<div id="footer">
	<div class="f_content">
        <span class="fl gray-link" id="icp">
            &copy; 2012－2015 CSCCHINA.ORG, All Rights Reserved <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备13018602号</a></span>
        </span>
        
        <span class="fr">
            <a href="<?php echo U('help/about');?>">关于我们</a>
            · <a href="<?php echo U('help/contact');?>">联系我们</a>
            · <a href="<?php echo U('help/agreement');?>">用户条款</a>
            · <a href="<?php echo U('help/privacy');?>">隐私申明</a>
        </span> 
    </div>
</div>
</footer>
</body>
</html>