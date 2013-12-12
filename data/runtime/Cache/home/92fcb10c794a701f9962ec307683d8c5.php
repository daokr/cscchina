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
<div class="midder">
	<div class="mc">
		<aside class="w190 fl">
			<section class="categories">
				<div class="hd">
					<h3>全部年份</h3>
				</div>
				<ul class="list categories-list">
                    <?php if(is_array($years)): foreach($years as $key=>$item): if($item[yearid] == $yearid): ?><li class="on"><a href="<?php echo U('content/category',array('yearid'=>$item[yearid],'cateid'=>$cateid));?>"><?php echo ($item[yearname]); ?> 年</a></li>
                        <?php else: ?>
                        <li><a href="<?php echo U('content/category',array('yearid'=>$item[yearid],'cateid'=>$cateid));?>"><?php echo ($item[yearname]); ?> 年</a></li><?php endif; endforeach; endif; ?>
				</ul>
			</section>

		</aside>
		<article class="w770 fr">
			<section>
				<div class="hd tag-heading">
					<h3 class="the-tag-name"><?php echo ($seo["title"]); ?></h3>
				</div>

				<div class="bd">
					<ul class="list-lined article-list">
						<?php if(is_array($arrArticle)): foreach($arrArticle as $key=>$item): ?><li class="item">
							<div class="title">
								<a href="<?php echo U('content/show',array('id'=>$item[id]));?>"><?php echo ($item[title]); ?></a>
							</div>
                           <?php if($item[photo]): ?><div class="cover">
                                <a class="pic" href="<?php echo U('content/show',array('id'=>$item[id]));?>">
									<img src="<?php echo ($item[photo][simg]); ?>" />
								</a> 
							</div><?php endif; ?>                           
							<div class="info">
								<div class="article-desc-brief">
									<?php echo getsubstrutf8(t($item[content]),0,150); ?>...
                                    <a href="<?php echo U('content/show',array('id'=>$item[id]));?>">（更多）</a>
								</div>
							</div>
							<span class="time">发表于 <?php echo date('Y-m-d H:i',$item[addtime]) ?>  | 浏览 <?php echo ($item[count_view]); ?></span> 
						</li><?php endforeach; endif; ?>

					</ul>
				</div>


			</section>
            
             <div class="page"><?php echo ($pageUrl); ?></div>   
             
		</article>
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