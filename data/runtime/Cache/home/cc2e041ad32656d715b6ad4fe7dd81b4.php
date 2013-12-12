<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title><?php echo C('ik_site_title');?> - <?php echo C('ik_site_subtitle');?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo C('ik_site_keywords');?>" /> 
<meta name="description" content="<?php echo C('ik_site_desc');?>" /> 
<link rel="shortcut icon" href="__STATIC__/public/images/fav.ico" type="image/x-icon">
<meta name="robots" content="all" />
<meta name="author" content="Powered by <?php echo (IKPHP_SITENAME); ?>" />
<meta name="Copyright" content="Powered by <?php echo (IKPHP_SITENAME); ?>" />
<style>__SITE_THEME_CSS__</style>
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

<?php if($action_name == 'index'): ?><li class="on"><a href="<?php echo C('ik_site_url');?>"><img src="__STATIC__/theme/blue/images/layout/home_7.jpg"></a></li>
<?php else: ?>
<li><a href="<?php echo C('ik_site_url');?>"><img src="__STATIC__/theme/blue/images/layout/home_7.jpg"></a></li><?php endif; ?>

<?php if($catename == 'news'): ?><li class="on"><a href="<?php echo U('prize/category',array('catename'=>'news'));?>"><img src="__STATIC__/theme/blue/images/layout/home_8.jpg"></a></li>
<?php else: ?>
<li><a href="<?php echo U('prize/category',array('catename'=>'news'));?>"><img src="__STATIC__/theme/blue/images/layout/home_8.jpg"></a></li><?php endif; ?>

<?php if($catename == 'subject'): ?><li class="on"><a href="<?php echo U('forum/category',array('catename'=>'subject'));?>"><img src="__STATIC__/theme/blue/images/layout/home_9.jpg"></a></li>
<?php else: ?>
<li><a href="<?php echo U('forum/category',array('catename'=>'subject'));?>"><img src="__STATIC__/theme/blue/images/layout/home_9.jpg"></a></li><?php endif; ?>


<?php if($cateid == 6): ?><li class="on"><a href="<?php echo U('article/category',array('cateid'=>6));?>"><img src="__STATIC__/theme/blue/images/layout/home_10.jpg"></a></li>
<?php else: ?>
<li class=""><a href="<?php echo U('article/category',array('cateid'=>6));?>"><img src="__STATIC__/theme/blue/images/layout/home_10.jpg"></a></li><?php endif; ?>

<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/home_11.jpg"></a></li>

<?php if($catename == 'reports'): ?><li class="on"><a href="<?php echo U('prize/category',array('catename'=>'reports'));?>"><img src="__STATIC__/theme/blue/images/layout/home_12.jpg"></a></li>
<?php else: ?>
<li class=""><a href="<?php echo U('prize/category',array('catename'=>'reports'));?>"><img src="__STATIC__/theme/blue/images/layout/home_12.jpg"></a></li><?php endif; ?>

<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/home_13.jpg"></a></li>
<?php if($action_name == 'contact'): ?><li class="on"><a href="<?php echo U('help/contact');?>"><img src="__STATIC__/theme/blue/images/layout/home_14.jpg"></a></li>
<?php else: ?>
<li><a href="<?php echo U('help/contact');?>"><img src="__STATIC__/theme/blue/images/layout/home_14.jpg"></a></li><?php endif; ?>
        </ul>
    </div>
</div>
</header>
<div style="margin:150px auto; width:500px;">
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
        </span> 
    </div>
</div>
</footer>
</body>
</html>