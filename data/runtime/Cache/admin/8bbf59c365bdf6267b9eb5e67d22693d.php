<?php if (!defined('THINK_PATH')) exit(); if($ik == 'index'): ?><li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">系统首页</a>
    <ul class="submenu" style="display: block;">
        <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('index/main');?>" target="MainIframe">首页</a></li>
        <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('cache/index');?>" target="MainIframe">缓存管理</a></li>
        <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('system/manage');?>" target="MainIframe">系统管理员</a></li>
    </ul>   
</li>
<li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">前台管理</a>
    <ul class="submenu" style="display: block;">
        <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('home/page');?>" target="MainIframe">单页管理</a></li>
        <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('setting/navlist');?>" target="MainIframe">导航管理</a></li>
    </ul> 
</li><?php endif; ?>
<?php if($ik == 'setting'): ?><li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">全局配置</a>
    <ul class="submenu" style="display: block;">
        <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('setting/index');?>" target="MainIframe">站点设置</a></li>
        <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('setting/url');?>" target="MainIframe">链接形式</a></li>
        <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('area/manage');?>" target="MainIframe">区域管理</a></li>
        
     </ul>
</li> 
<!--
<li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">前台界面</a>
    <ul class="submenu" style="display: block;">
        <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('nav/index');?>" target="MainIframe">导航设置</a></li>
        <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('setting/theme');?>" target="MainIframe">前台风格</a></li>        
     </ul>
</li>
--><?php endif; ?>
<?php if($ik == 'user'): ?><li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">报名管理</a>
    <ul class="submenu" style="display: block;">
     <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('user/cate');?>" target="MainIframe">奖项分类</a></li>
    </ul>
</li><?php endif; ?>

<?php if($ik == 'prize'): ?><li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">评奖管理</a>
    <ul class="submenu" style="display: block;">
     <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('prize/manage',array('catename'=>'news'));?>" target="MainIframe">评奖新闻</a></li>
     <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('prize/manage',array('catename'=>'reports'));?>" target="MainIframe">评奖媒体报道</a></li>
     <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('prize/focus');?>" target="MainIframe">焦点图管理</a></li>
     <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('prize/medias');?>" target="MainIframe">合作媒体LOGO</a></li>
    </ul>
</li><?php endif; ?>

<?php if($ik == 'ad'): ?><li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">广告管理</a>
    <ul class="submenu" style="display: block;">
      <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('ad/adlist');?>" target="MainIframe">广告列表</a></li>
      <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('ad/manage',array('ik'=>'add'));?>" target="MainIframe">添加新广告</a></li>
    </ul>
</li><?php endif; ?>

<?php if($ik == 'article'): ?><li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">行业管理</a>
    <ul class="submenu" style="display: block;">
    <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('article/index');?>" target="MainIframe">内容管理</a></li>
    <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('article/cate');?>" target="MainIframe">分类管理</a></li>
    </ul>
</li><?php endif; ?>

<?php if($ik == 'forum'): ?><li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">论坛管理</a>
    <ul class="submenu" style="display: block;">
    <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('forum/manage',array('catename'=>'subject'));?>" target="MainIframe">本届主题论坛</a></li>
    <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('forum/manage',array('catename'=>'leaders'));?>" target="MainIframe">本届论坛嘉宾</a></li>
    <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('forum/medias');?>" target="MainIframe">本届合作企业LOGO</a></li>
    <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('history/hislist');?>" target="MainIframe">往届回顾列表</a></li>
    </ul>
</li><?php endif; ?>

<?php if($ik == 'friends'): ?><li class="treemenu_on">
    <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">友情链接管理</a>
    <ul class="submenu" style="display: block;">
    <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('friends/hislist');?>" target="MainIframe">友情链接列表</a></li>
    <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('friends/manage',array('ik'=>'add'));?>" target="MainIframe">添加新链接</a></li>
    </ul>
</li><?php endif; ?>