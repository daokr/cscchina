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
            	<li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_34.jpg"></a></li>
                <li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_35.jpg"></a></li>
                <li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_36.jpg"></a></li>
                <li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_37.jpg"></a></li>
                <li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_38.jpg"></a></li>
                <li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_39.jpg"></a></li>
                <li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_40.jpg"></a></li>
                <li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_41.jpg"></a></li>
                <li><a href="#"><img src="__STATIC__/theme/blue/images/layout/menu_42.jpg"></a></li>
            </ul>
        </div>
        <div class="mod2Box">
        		<div id="pjxwBar">
                	<h2><span class="more"><a href="#">more</a></span>评奖新闻</h2>
                    <div class="bd">
                    	<ul>
                            	<li><a href="#">一是主题全面。这次会议确定的主</a></li>
                                <li><a href="#">一是主题全面。这次会议确定的主</a></li>
                                <li><a href="#">一是主题全面。这次会议确定的主</a></li>
                                <li><a href="#">一是主题全面。这次会议确定的主</a></li>
                                <li><a href="#">一是主题全面。这次会议确定的主</a></li>
                                 <li><a href="#">一是主题全面。这次会议确定的主</a></li>
                        </ul>
                    </div>
                    <div class="modLag">
                    	<a href="#" class="comein">在线报名</a>
                    </div>
                </div>
                <div class="modR1">
	                <div class="mainfocus">
	                    <ul id="focus-li">
	                        <li><a href="javascript:;" class="on">1</a></li> <li><a href="javascript:;" >2</a></li>
	                    </ul>
	                    <div id="focus-info">
	                        <ul>
	                        <li><a href="javascript:;"><img src="__STATIC__/theme/blue/images/temp/365x250.jpg"/></a></li>
	                        <li><a href="javascript:;"><img src="__STATIC__/theme/blue/images/temp/365x250.jpg"/></a></li>  
	                        </ul>
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
                    	<ul class="gongsi">
                        	<li>获奖公式（图片+文字）</li>
                            <li>获奖公式（图片+文字）</li>
                            <li>获奖公式（图片+文字）</li>
                            <li>获奖公式（图片+文字）</li>
                            <li>获奖公式（图片+文字）</li>
                            <li>获奖公式（图片+文字）</li>
                        </ul>
                        <h3>获奖公室</h3>
                    </div>
					<div style="margin-top:10px">
                    <?php if($adList[6] != null): ?><a href="<?php echo ($adList[6][link]); ?>" target="_blank"><img src="<?php echo ($adList[6][path]); ?>"></a><?php endif; ?>
                    </div>
                </div>
                <div class="mtbdBar">
                	<div class="mtbdInfo">
                    	<h2><em><a href="#">more</a></em><span class="mtbd">媒体报道</span><i></i></h2>
                        <ul class="bd">
                            	<li><a href="#">环保部官员：8年前反映灰霾越来越重 未引起重视</a></li>
                            	<li><a href="#">国资委深化国企改革方案 央企红利上缴比例或至30%</a></li>
                            	<li><a href="#">专家：养老双轨制并轨职工或还是吃亏</a></li>
                            	<li><a href="#">菲灾后救援吃力 政府称不可能每个人都获救援</a></li>
                            	<li><a href="#">知情人：季建业在上百人面前像骂儿子一样骂下属</a></li>
                        </ul>
                    </div>
                    <div class="hezuoInfo">
                    		<h2>合作媒体</h2>
                            <div class="bd">
                            	<a href="#"><img src="__STATIC__/theme/blue/images/mt/1.png"></a>
                                <a href="#"><img src="__STATIC__/theme/blue/images/mt/2.png"></a>
                                <a href="#"><img src="__STATIC__/theme/blue/images/mt/3.png"></a>
								<a href="#"><img src="__STATIC__/theme/blue/images/mt/1.png"></a>
                                <a href="#"><img src="__STATIC__/theme/blue/images/mt/2.png"></a>
                                <a href="#"><img src="__STATIC__/theme/blue/images/mt/3.png"></a>
								<a href="#"><img src="__STATIC__/theme/blue/images/mt/1.png"></a>
                                <a href="#"><img src="__STATIC__/theme/blue/images/mt/2.png"></a>
                                <a href="#"><img src="__STATIC__/theme/blue/images/mt/3.png"></a>                                
                            </div>
                    </div>
                </div>
                <div class="blank15"></div>
                <div class="hezuoqiyeBar">
                		<h2>合作企业</h2>
                        <div class="bd">
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/1.png"></a>
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/2.png"></a>
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/3.png"></a>
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/1.png"></a>
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/2.png"></a>
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/3.png"></a>
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/1.png"></a>
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/2.png"></a>
                            <a href="#"><img src="__STATIC__/theme/blue/images/mt/3.png"></a>                                
                        </div>                        
                </div>
                <div class="clubBar">
                	<dl>
                    	<dt><a href="#"><img src="__STATIC__/theme/blue/images/temp/315x215.jpg" width="315" height="215"></a></dt>
                        <dd>
                        	<h2><a href="#">全面深化改革决定</a></h2>
                            <p>一是主题全面。这次会议确定的主题是全面深化改革，这与十一届三中全会以来的前这与十一届三中全会以来的前这与十一届三中全会以来的前这与十一届三中全会以来的前这与十一届三中全会以来的前6次s持全面改革，才能继续深化改革化改革化改革改革化改革化改一是主题全面。这次会议确定的主题是全面深化改革...<a href="#" class="red">详情>></a></p>
                        </dd>
                    </dl>
                </div>
                <div class="cl"></div>
        </div>
		<div class="clubMembers">
            <div class="mbd">
            	<div class="mitem">
                    <h2><span class="ltjb">论坛嘉宾</span></h2>
                    <div class="bd">
                        <dl>
                        <dt><a href="#"><img src="__STATIC__/theme/blue/images/temp/home_20.jpg"></a></dt>
                        <dd>
                            <h3><a href="#">全面深化改革决定</a></h3>
                            <p>一是主题全面。这次会议确定的主题是全面深化改革，这与十一届三中全会以来的前6次s持全面改革，才能继续深化改革化改革化改革改革化改革化改革</p>
                        </dd>
                        </dl>
                        <div class="cl"></div>
                    </div>                
                </div>
				<div class="mitem">
                    <h2><span class="ltjb">论坛嘉宾</span></h2>
                    <div class="bd">
                        <dl>
                        <dt><a href="#"><img src="__STATIC__/theme/blue/images/temp/home_20.jpg"></a></dt>
                        <dd>
                            <h3><a href="#">全面深化改革决定</a></h3>
                            <p>一是主题全面。这次会议确定的主题是全面深化改革，这与十一届三中全会以来的前6次s持全面改革，才能继续深化改革化改革化改革改革化改革化改革</p>
                        </dd>
                        </dl>
                        <div class="cl"></div>
                    </div>                
                </div>
				<div class="mitem">
                    <h2><span class="ltjb">论坛嘉宾</span></h2>
                    <div class="bd">
                        <dl>
                        <dt><a href="#"><img src="__STATIC__/theme/blue/images/temp/home_20.jpg"></a></dt>
                        <dd>
                            <h3><a href="#">全面深化改革决定</a></h3>
                            <p>一是主题全面。这次会议确定的主题是全面深化改革，这与十一届三中全会以来的前6次s持全面改革，才能继续深化改革化改革化改革改革化改革化改革</p>
                        </dd>
                        </dl>
                        <div class="cl"></div>
                    </div>                
                </div>
				<div class="mitem">
                    <h2><span class="ltjb">论坛嘉宾</span></h2>
                    <div class="bd">
                        <dl>
                        <dt><a href="#"><img src="__STATIC__/theme/blue/images/temp/home_20.jpg"></a></dt>
                        <dd>
                            <h3><a href="#">全面深化改革决定</a></h3>
                            <p>一是主题全面。这次会议确定的主题是全面深化改革，这与十一届三中全会以来的前6次s持全面改革，才能继续深化改革化改革化改革改革化改革化改革</p>
                        </dd>
                        </dl>
                        <div class="cl"></div>
                    </div>                
                </div>
				<div class="mitem">
                    <h2><span class="ltjb">论坛嘉宾</span></h2>
                    <div class="bd">
                        <dl>
                        <dt><a href="#"><img src="__STATIC__/theme/blue/images/temp/home_20.jpg"></a></dt>
                        <dd>
                            <h3><a href="#">全面深化改革决定</a></h3>
                            <p>一是主题全面。这次会议确定的主题是全面深化改革，这与十一届三中全会以来的前6次s持全面改革，才能继续深化改革化改革化改革改革化改革化改革</p>
                        </dd>
                        </dl>
                        <div class="cl"></div>
                    </div>                
                </div>
 				<div class="mitem">
                    <h2><span class="ltjb">论坛嘉宾</span></h2>
                    <div class="bd">
                        <dl>
                        <dt><a href="#"><img src="__STATIC__/theme/blue/images/temp/home_20.jpg"></a></dt>
                        <dd>
                            <h3><a href="#">全面深化改革决定</a></h3>
                            <p>一是主题全面。这次会议确定的主题是全面深化改革，这与十一届三中全会以来的前6次s持全面改革，才能继续深化改革化改革化改革改革化改革化改革</p>
                        </dd>
                        </dl>
                        <div class="cl"></div>
                    </div>                
                </div>                                                                               
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
            	<li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
            	<li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>
                <li><img src="__STATIC__/theme/blue/images/temp/105x85.gif"></li>                
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
</script>
</body>
</html>