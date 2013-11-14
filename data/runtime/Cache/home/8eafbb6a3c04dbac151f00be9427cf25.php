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
	<div class="site_top"><img src="__STATIC__/theme/blue/head.jpg"></div>
</div>
</header>

<div class="midder">
<div class="mc">
    <div class="cleft">
        <div class="art-body">
            <h1 class="title"><?php echo ($strArticle[title]); ?></h1>
            <div class="art-info">
            作者：<a href="<?php echo U('people/index',array('id'=>$strArticle[user][doname]));?>"><?php echo ($strArticle[newsauthor]); ?></a>&nbsp;&nbsp;<?php echo date('Y-m-d H:i',$strArticle[addtime]) ?>&nbsp;&nbsp;<a href="#comments"><?php echo ($strArticle[count_comment]); ?>条回复</a>&nbsp;&nbsp;浏览<?php echo ($strArticle[count_view]); ?>次&nbsp;&nbsp;<a href="#formMini">我要回复</a> 
            </div>
        
            <div class="art-text">
                <?php echo ($strArticle[content]); ?>
            </div>
            <div class="control-btns">
            <?php if($visitor[userid] == $strArticle[userid]): ?><a href="<?php echo U('article/edit',array('id'=>$strArticle['aid']));?>">编辑</a>&nbsp; &gt;&nbsp; <a href="<?php echo U('article/delete',array('id'=>$strArticle['aid']));?>" onclick="return confirm('确定删除?')">删除</a><?php endif; ?>
            <br/>
            本文由<a href="<?php echo U('people/index',array('id'=>$strArticle[user][doname]));?>"><?php echo ($strArticle[user][username]); ?></a>授权（爱客网）发表，文章著作权为原作者所有
            </div>
            
      	  <div class="clear"></div>
          <div class="art-titles"> 
             <span class="fl"><?php if(!empty($upArticle)): ?>上一篇：<a href="<?php echo U('article/show',array('id'=>$upArticle['aid']));?>"><?php echo ($upArticle['title']); ?></a><?php endif; ?></span>
             <span class="fr"><?php if(!empty($downArticle)): ?>下一篇：<a href="<?php echo U('article/show',array('id'=>$downArticle['aid']));?>"><?php echo ($downArticle['title']); ?></a><?php endif; ?></span>
          </div>
      </div>
    
    
    
    </div>


    <div class="cright">
    
        <div class="mod" id="g-user-profile">

    <div class="usercard">
      <div class="pic">
            <a href="<?php echo U('people/index',array('id'=>$strUser[doname]));?>"><img alt="<?php echo ($strUser[username]); ?>" src="<?php echo ($strUser[face]); ?>"></a>
      </div>
      <div class="info">
           <div class="name">
               <a href="<?php echo U('people/index',array('id'=>$strUser[doname]));?>"><?php echo ($strUser[username]); ?></a>
           </div>
                <?php if($strUser[area] != ''): echo ($strUser[area][areaname]); else: ?>火星<?php endif; ?>                        
                <br>
       </div>
    </div>
               
  
             
</div> 
         
<div class="mod">
    <?php if($visitor): ?><div class="create-group">
    <a href="<?php echo U('article/add');?>"><i>+</i>去投稿</a>
    </div><?php endif; ?>
</div>
        
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
            · <a href="<?php echo U('help/agreement');?>">用户条款</a>
            · <a href="<?php echo U('help/privacy');?>">隐私申明</a>
        </span> 
    </div>
</div>
</footer>
</body>
</html>