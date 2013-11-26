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

<?php if($action_name == 'index'): ?><li class="on"><a href="<?php echo C('ik_site_url');?>"><img src="__STATIC__/theme/blue/images/layout/home_7.jpg"></a></li>
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
<?php if($action_name == 'contact'): ?><li class="on"><a href="<?php echo U('help/contact');?>"><img src="__STATIC__/theme/blue/images/layout/home_14.jpg"></a></li>
<?php else: ?>
<li><a href="<?php echo U('help/contact');?>"><img src="__STATIC__/theme/blue/images/layout/home_14.jpg"></a></li><?php endif; ?>
        </ul>
    </div>
</div>
</header>

<div class="midder">
<div class="mc">
    <div class="cleft">
        <div class="art-body">
            <h1 class="title"><?php echo ($strArticle[title]); ?></h1>
            <div class="art-info">
            作者：<?php echo ($strArticle[newsauthor]); ?>&nbsp;&nbsp;<?php echo date('Y-m-d H:i',$strArticle[addtime]) ?>&nbsp;&nbsp; 浏览<?php echo ($strArticle[count_view]); ?>次&nbsp;&nbsp;
            </div>
        
            <div class="art-text">
                <?php echo ($strArticle[content]); ?>
            </div>
            <div class="control-btns">
            </div>
            
      	  <div class="clear"></div>
          <div class="art-titles"> 
             <span class="fl"><?php if(!empty($upArticle)): ?>上一篇：<a href="<?php echo U('prize/show',array('id'=>$upArticle['id']));?>"><?php echo ($upArticle['title']); ?></a><?php endif; ?></span>
             <span class="fr"><?php if(!empty($downArticle)): ?>下一篇：<a href="<?php echo U('prize/show',array('id'=>$downArticle['id']));?>"><?php echo ($downArticle['title']); ?></a><?php endif; ?></span>
          </div>
      </div>
    
    
    
    </div>


    <div class="cright">
    
        
        
    </div>

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
        </span> 
    </div>
</div>
</footer>
</body>
</html>