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
<script type="text/javascript" src="__STATIC__/public/js/jquery.KinSlideshow-1.2.1.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#focus-info").KinSlideshow({
			moveStyle:"right",
			titleBar:false,
			titleFont:false,
			btn:{btn_bgColor:"#8c1914",btn_bgHoverColor:"#0A4C83",btn_fontColor:"#fff",btn_fontHoverColor:"#fff",btn_borderColor:"#cccccc",btn_borderHoverColor:"#1188c0",btn_borderWidth:0}
	});
})
</script>
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
	<div class="midbd">
		<div id="hometopbanner">
	    	<div class="hbt1"><?php if($adList[0] != null): ?><a href="<?php echo ($adList[0][link]); ?>" target="_blank"><img src="<?php echo ($adList[0][path]); ?>"></a><?php endif; ?></div>
	        <div class="hbt2"><?php if($adList[1] != null): ?><a href="<?php echo ($adList[1][link]); ?>" target="_blank"><img src="<?php echo ($adList[1][path]); ?>"></a><?php endif; ?></div>
	        <div class="hbt3"><?php if($adList[2] != null): ?><a href="<?php echo ($adList[2][link]); ?>" target="_blank"><img src="<?php echo ($adList[2][path]); ?>"></a><?php endif; ?></div>
     	</div>
        <div class="inbox">
        	  <div class="inboxbd1">
              		<div class="leftbd">
                    	<h2><span class="cxrw">创新·人物</span></h2>
                        <div class="bd">
                        	<dl>
                            <dt><a href="<?php echo U('article/show',array('id'=>$strcxrw['aid']));?>"><img src="<?php echo ($strcxrw[photo][simg]); ?>"></a></dt>
                            <dd>
                            	<h3><a href="<?php echo U('article/show',array('id'=>$strcxrw['aid']));?>"><?php echo ($strcxrw[title]); ?></a></h3>
                                <p><?php echo getsubstrutf8(t($strcxrw[content]),0,50); ?>...</p>
                            </dd>
                            </dl>
                            <div class="cl"></div>
                        </div>
                    </div>
                    <div class="inmidbd">
                        <div class="bd">
                        	<dl>
                            <dt><a href="<?php echo U('article/show',array('id'=>$cxjd['aid']));?>"><img src="<?php echo ($cxjd[photo][simg]); ?>"></a></dt>
                            <dd>
                            	<h3><a href="<?php echo U('article/show',array('id'=>$cxjd['aid']));?>"><?php echo ($cxjd[title]); ?></a></h3>
                                <p><?php echo getsubstrutf8(t($cxjd[content]),0,90); ?>...</p>
                            </dd>
                            </dl>
                            <div class="cl"></div>
                        </div>                    
                    </div>
                    <div class="rightbd">
                    	<h2><em style="margin-right:30px"><a href="<?php echo U('article/category',array('cateid'=>7));?>">more</a></em><span class="cxsj">创新·事件</span><i></i></h2>
                        <div class="bd">
                        	<ul>
                            <?php if(is_array($cxsj)): foreach($cxsj as $key=>$item): ?><li><a href="<?php echo U('article/show',array('id'=>$item['aid']));?>" title="<?php echo ($item[title]); ?>"><?php echo ($item[title]); ?></a></li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="cl"></div>
              </div>
              <div class="blank15"></div>
              <div class="inboxbd1">

              		<div class="itembd">
                    	<h2><em><a href="<?php echo U('article/category',array('cateid'=>4));?>">more</a></em><span class="cxjs">创新·技术</span></h2>
                        <div class="bd">
                        	<dl>
                            <dt><a href="<?php echo U('article/show',array('id'=>$item['aid']));?>"><img src="<?php echo ($cxjstop[photo][simg]); ?>"></a></dt>
                            <dd>
                            	<h3><a href="<?php echo U('article/show',array('id'=>$item['aid']));?>" title="<?php echo ($cxjstop[title]); ?>"><?php echo ($cxjstop[title]); ?></a></h3>
                                <p><?php echo getsubstrutf8(t($cxjstop[content]),0,30); ?>...</p>
                            </dd>
                            </dl>
                            <div class="cl"></div>
                            <ul class="defUL">
                             <?php if(is_array($cxjs)): foreach($cxjs as $ck=>$item): ?><li><a href="<?php echo U('article/show',array('id'=>$item['aid']));?>" title="<?php echo ($item[title]); ?>"><?php echo ($item[title]); ?></a></li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div>
              		<div class="itembd">
                    	<h2><em><a href="<?php echo U('article/category',array('cateid'=>5));?>">more</a></em><span class="cxyy">创新·应用</span></h2>
                        <div class="bd">
                        	<dl>
                            <dt><a href="<?php echo U('article/show',array('id'=>$cxyytop['aid']));?>"><img src="<?php echo ($cxyytop[photo][simg]); ?>"></a></dt>
                            <dd>
                            <h3><a href="<?php echo U('article/show',array('id'=>$cxyytop['aid']));?>" title="<?php echo ($cxyytop[title]); ?>"><?php echo ($cxyytop[title]); ?></a></h3>
                                <p><?php echo getsubstrutf8(t($cxyytop[content]),0,30); ?>...</p>
                            </dd>
                            </dl>
                            <div class="cl"></div>
                            <ul class="defUL">
                             <?php if(is_array($cxyy)): foreach($cxyy as $ck=>$item): ?><li><a href="<?php echo U('article/show',array('id'=>$item['aid']));?>" title="<?php echo ($item[title]); ?>"><?php echo ($item[title]); ?></a></li><?php endforeach; endif; ?>
                            </ul>                           
                        </div>
                    </div>
              		<div class="itembd lastitembd">
                    	<h2><em><a href="<?php echo U('article/category',array('cateid'=>6));?>">more</a></em><span class="cxdg">创新·导购</span></h2>
                        <div class="bd">
                        	<dl>
                            <dt><a href="<?php echo U('article/show',array('id'=>$cxdgtop['aid']));?>"><img src="<?php echo ($cxdgtop[photo][simg]); ?>"></a></dt>
                            <dd>
                            	<h3><a href="<?php echo U('article/show',array('id'=>$cxdgtop['aid']));?>" title="<?php echo ($cxdgtop[title]); ?>"><?php echo ($cxdgtop[title]); ?></a></h3>
                                <p><?php echo getsubstrutf8(t($cxdgtop[content]),0,30); ?>...</p>
                            </dd>
                            </dl>
                            <div class="cl"></div>
                            <ul class="defUL">
                             <?php if(is_array($cxdg)): foreach($cxdg as $ck=>$item): ?><li><a href="<?php echo U('article/show',array('id'=>$item['aid']));?>" title="<?php echo ($item[title]); ?>"><?php echo ($item[title]); ?></a></li><?php endforeach; endif; ?>
                            </ul>
                        </div>                        
                    </div>                                        
       
              </div>
        </div>
        <div class="cl"></div>        
    </div>
        <div class="blank15"></div>
        <div><?php if($adList[3] != null): ?><a href="<?php echo ($adList[3][link]); ?>" target="_blank"><img src="<?php echo ($adList[3][path]); ?>"></a><?php endif; ?></div>
        <div class="blank10"></div>
        <div id="defSearch">
        	<form action="" target="">
        	<ul>
            	<li><span>年份</span><select class="defselect" style="width:95px"><option>请选择</option></select></li>
                <li><span>项目</span><select class="defselect" style="width:95px"><option>请选择</option></select></li>
                <li><span>公司</span><select class="defselect" style="width:95px"><option>请选择</option></select></li>
                <li><span>人物</span><select class="defselect" style="width:95px"><option>请选择</option></select></li>
                <li><span>类型</span><select class="defselect" style="width:95px"><option>请选择</option></select></li>
                <li class="defsBar"><div class="skeybar"><input type="text" value="" class="skey"></div>
                <div class="sbtnbar"><input type="submit" value="search" class="btnsech"></div></li>
            </ul>
            </form>
        </div>
        <div class="blank10"></div>
        <div><?php if($adList[4] != null): ?><a href="<?php echo ($adList[4][link]); ?>" target="_blank"><img src="<?php echo ($adList[4][path]); ?>"></a><?php endif; ?></div>
        <div class="blank15"></div>
    	<div class="defMenu">
        	<ul>
            	<li><a href="#" title="机构介绍"><img src="__STATIC__/theme/blue/images/layout/menu_34.jpg"></a></li>
                <li><a href="<?php echo U('singlepage/show',array('catename'=>'page1'));?>" title="评选章程"><img src="__STATIC__/theme/blue/images/layout/menu_35.jpg"></a></li>
                <li><a href="<?php echo U('singlepage/show',array('catename'=>'page2'));?>" title="评审委员会"><img src="__STATIC__/theme/blue/images/layout/menu_36.jpg"></a></li>
                <li><a href="#" title="评奖年鉴"><img src="__STATIC__/theme/blue/images/layout/menu_37.jpg"></a></li>
                <li><a href="<?php echo U('singlepage/show',array('catename'=>'bjdl'));?>" title="颁奖典礼"><img src="__STATIC__/theme/blue/images/layout/menu_40.jpg"></a></li>
                 <li><a href="<?php echo U('singlepage/show',array('catename'=>'wjhg'));?>" title="往届回顾" ><img src="__STATIC__/theme/blue/images/layout/menu_39.jpg"></a></li>
                <li><a href="<?php echo U('singlepage/show',array('catename'=>'ltbj'));?>" title="论坛背景"><img src="__STATIC__/theme/blue/images/layout/menu_ltbj.jpg"></a></li>
                <li><a href="<?php echo U('singlepage/show',array('catename'=>'ltxc'));?>" title="论坛现场"><img src="__STATIC__/theme/blue/images/layout/menu_ltxc.jpg"></a></li>
               
                <li><a href="#" title="评奖办公室"><img src="__STATIC__/theme/blue/images/layout/menu_42.jpg"></a></li>
            </ul>
        </div>
        <div class="mod2Box">
        		<div id="pjxwBar">
                	<h2><span class="more"><a href="<?php echo U('prize/category',array('catename'=>'news'));?>" target="_blank">more</a></span>评奖新闻</h2>
                    <div class="bd">
                    	<ul>
                         <?php if(is_array($pjxw_list)): foreach($pjxw_list as $key=>$item): ?><li><a href="<?php echo U('prize/show',array('id'=>$item['id']));?>" title="<?php echo ($item[title]); ?>"><?php echo ($item[title]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="modLag">
                    	<a href="#" class="comein">在线报名</a>
                    </div>
                </div>
                <div class="modR1">
	                <div class="mainfocus">
	                    <div id="focus-info" class="focus1">
                        	 <?php if(is_array($prizefocus_list)): foreach($prizefocus_list as $key=>$item): ?><a href="<?php echo ($item[link]); ?>" target="_blank"><img src="<?php echo ($item[path]); ?>"/></a><?php endforeach; endif; ?>
	                    </div>                        
	                    <div class="cl"></div>
	                </div>                        
	                <div class="zsBox">
                  		<div class="filebox"><img src="__STATIC__/theme/blue/images/temp/file.jpg"/></div>
                        <ul  class="hudongbox"><li>CCBN互换区</li><li>二维码</li></ul>
                    </div>
                    <div class="modRag">
                    <?php if($adList[5] != null): ?><a href="<?php echo ($adList[5][link]); ?>" target="_blank"><img src="<?php echo ($adList[5][path]); ?>"></a><?php endif; ?>
                    </div>
                </div>
                <div class="blank15"></div>
                <div class="winningBar">
                	<div class="bd">
                     <?php if(is_array($arr_content_cate)): foreach($arr_content_cate as $key=>$item): ?><div class="item_gongsi">
                            <h2 class="gongsi_tit"><span><a href="<?php echo U('content/category',array('yearid'=>$item[yearid],'cateid'=>$item[cateid]));?>">更多&gt;&gt;</a></span><?php echo ($item[catename]); ?></h2>
                            <ul class="gongsi_bd">
                           	  <?php if(is_array($item[arr_content])): foreach($item[arr_content] as $key=>$citem): ?><li><a href="<?php echo U('content/show',array('id'=>$citem[id]));?>"><img src="<?php echo ($citem[photo][simg]); ?>"/></a></li><?php endforeach; endif; ?>
                            </ul>
                        </div><?php endforeach; endif; ?>	                                                                                                                                                                        
                        <!--<h3>获奖公式</h3>-->
                    </div>
					<!--
                    <div style="margin-top:10px">
                    <?php if($adList[6] != null): ?><a href="<?php echo ($adList[6][link]); ?>" target="_blank"><img src="<?php echo ($adList[6][path]); ?>"></a><?php endif; ?>
                    </div>
                    -->
                </div>
                <div class="mtbox_r">
                    <div class="mtbdBar">
                        <div class="mtbdInfo">
                            <h2><em><a href="<?php echo U('prize/category',array('catename'=>'reports'));?>" target="_blank">more</a></em><span class="mtbd">媒体报道</span><i></i></h2>
                            <ul class="bd">
                             <?php if(is_array($mtbd_list)): foreach($mtbd_list as $key=>$item): ?><li><a href="<?php echo U('prize/show',array('id'=>$item['id']));?>" title="<?php echo ($item[title]); ?>"><?php echo ($item[title]); ?></a></li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                        <div class="hezuoInfo">
                                <h2>协办媒体</h2>
                                <div class="bd">
                                   <?php if(is_array($teams)): foreach($teams as $key=>$item): ?><img src="<?php echo ($item[simg]); ?>" width="90" height="42"><?php endforeach; endif; ?>                                
                                </div>
                        </div>                    
                    </div>
                   
                    <div class="hezuoqiyeBar">
                		<h2>合作企业</h2>
                        <div class="bd">
                       		<div id="bd_box" style="overflow:auto;">
                               <?php if(is_array($companys)): foreach($companys as $key=>$item): ?><img src="<?php echo ($item[simg]); ?>" ><?php endforeach; endif; ?> 
                            </div>                              
                        </div>                        
               		 </div>
                </div>
                
                 <!--
                 <div class="blank15"></div>
                 <div class="hezuoqiyeBar">
                		<h2>合作企业</h2>
                        <div class="bd">
                       		<div id="bd_box" style="overflow:auto;">
                               <?php if(is_array($companys)): foreach($companys as $key=>$item): ?><img src="<?php echo ($item[simg]); ?>" ><?php endforeach; endif; ?> 
                            </div>                              
                        </div>                        
                </div>
               
                <div class="clubBar">
                	<dl>
                   		  <?php if(is_array($subject_list)): foreach($subject_list as $key=>$item): ?><dt><a href="<?php echo U('forum/show',array('id'=>$item['id']));?>"><img src="<?php echo ($item[photo][mimg]); ?>" width="315" height="215"></a></dt><?php endforeach; endif; ?>       
                        <dd>
                         	<?php if(is_array($subject_list)): foreach($subject_list as $key=>$item): ?><h2><a href="<?php echo U('forum/show',array('id'=>$item['id']));?>"><?php echo ($item[title]); ?></a></h2>
                            <p><?php echo getsubstrutf8(t($item[content]),0,170); ?>...<a href="<?php echo U('forum/show',array('id'=>$item['id']));?>" class="red">详情>></a></p><?php endforeach; endif; ?>       
                        </dd>
                    </dl>
                </div>
                -->
                <div class="cl"></div>
        </div>
		<div class="clubMembers">
            <div class="mbd">
            <?php if(is_array($leaders_list)): foreach($leaders_list as $key=>$item): ?><div class="mitem">
                    <h2><span class="ltjb">论坛嘉宾</span></h2>
                    <div class="bd">
                        <dl>
                        <dt><a href="<?php echo U('forum/show',array('id'=>$item['id']));?>"><img src="<?php echo ($item[photo][simg]); ?>"></a></dt>
                        <dd>
                            <h3><a href="<?php echo U('forum/show',array('id'=>$item['id']));?>"><?php echo ($item[title]); ?></a></h3>
                            <p><?php echo getsubstrutf8(t($item[content]),0,70); ?>...</p>
                        </dd>
                        </dl>
                        <div class="cl"></div>
                    </div>                
                </div><?php endforeach; endif; ?>                                                                                   
            </div>
        </div>
        
        <div  class="historyBar">
        	<div class="bd">
			<ul id="hisbar">
            	<li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
            	<li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/210x145.jpg"></li>                
            </ul>            
            </div>
        </div>
        
         <div  class="frendlinkBar">
        	<div class="bd">
			<ul id="frendlinks">
            	 <?php if(is_array($medias)): foreach($medias as $key=>$item): ?><li><img src="<?php echo ($item[simg]); ?>" width="130" height="48"></li><?php endforeach; endif; ?>
            </ul>            
            </div>
        </div>
        
</div><!--//midder-->
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
<script language="javascript">
$(function(){
	var hisbar = setInterval(function(){ hScroll.start('#hisbar');} , 30);
	$('#hisbar').hover(function(){
		clearInterval(hisbar);
	},function(){
		hisbar = setInterval(function(){ hScroll.start('#hisbar');} , 30);
	});
	var frendlinks = setInterval(function(){ hScroll.start('#frendlinks');} , 30);
	$('#frendlinks').hover(function(){
		clearInterval(frendlinks);
	},function(){
		frendlinks = setInterval(function(){ hScroll.start('#frendlinks');} , 30);
	})	
})					
//ul 要滚动的对象一般是UL
var hScroll = {
	init:function(o){
		var li_w = $(o).find('li').eq(0).outerWidth(),
			num = $(o).find('li').length;
		$(o).width(li_w*num);
	},
	start:function(ul){
		this.init(ul);
		var left = $(ul).position().left-1;
		var liw = $(ul).find('li').eq(0).outerWidth();
		if(left == -liw){
			$(ul).css({'left':0});
			$(ul).find('li:first').appendTo(ul);
		}else{
			$(ul).css({'left':left});
		}
	}
}

/**合作企业**/
	var t = 0;
$(function(){
	var vbar = setInterval(function(){ vScroll.start('#bd_box'); t++} , 50);
	$('#bd_box').hover(function(){
		clearInterval(vbar);
	},function(){
		vbar = setInterval(function(){ vScroll.start('#bd_box'); t++} , 50);
	});
});
var vScroll = {
	start:function(id){
		var maxh = $(id).find('img').outerHeight()+6;
		if(t==maxh){
			t = 0;
			$(id).find('img').eq(0).appendTo(id);
			$(id).find('img').eq(1).appendTo(id);
			$(id).find('img').eq(2).appendTo(id);
		}
		$(id).css({'marginTop':-t});
	}
}
</script>
</body>
</html>