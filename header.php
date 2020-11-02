<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
<?php outputStart(); ?>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- 页面标题 -->
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <!-- MDUI CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.0/dist/css/mdui.min.css" integrity="sha384-2PJ2u4NYg6jCNNpv3i1hK9AoAqODy6CdiC+gYiL2DVx+ku5wzJMFNdE3RoWfBIRP" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/mdui.min.css'); ?>">
    <!-- 页面 CSS 样式 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/alert-js.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/prism.css'); ?>">
    
    <!-- ICON -->

    <link rel="icon" href="<?php $this->options->themeUrl('assets/img/icon.png'); ?>">

    <!-- 其他 HTML 头部信息 -->
    <?php if ($this->is('post')) : ?>
      <?php echo '<meta name="description" content="'.$this->fields->excerpt.'" />'; ?>
      <?php $this->header('description='); ?>
    <?php else: ?>
      <?php $this->header(); ?>

    <?php endif; ?>
    
    

    <?php if ($this->options->customCSS): ?>
      <style>
      <?php $this->options->customCSS() ?>
      </style>
    <?php endif; ?>

    <?php if ($this->options->customHeadHTML): ?>
      <?php $this->options->customHeadHTML() ?>
    <?php endif; ?>
</head>

<!-- 判断站点主题色，强调色 -->
<?php 
$mduiPrimary = $this->options->primaryColor;
$mduiAccent = $this->options->accentColor;
$mduiAutoDark = $this->options->autoDark;
$mduiAppbarFix = $this->options->appbarfix;
echo "<body class='mdui-drawer-body-left mdui-theme-primary-". $mduiPrimary." mdui-theme-accent-". $mduiAccent. " ".$mduiAutoDark ." ".$mduiAppbarFix." line-numbers' >";

?>
<!-- Check For JavaScript -->
<noscript>
	<div class="alert-js">
		<p>啊哦，<code class="code-js"> JavaScript </code>似乎无法正常使用。请尝试打开<code class="code-js"> JavaScript </code>以获得最佳体验！</p>
	</div>
</noscript>

<!-- SideBar -->
<?php
echo '<div class="mdui-drawer '.$this->options->menuSet.'"  id="drawer"> ';
?>
<div class="mdui-list" mdui-collapse="{accordion: true}">
          <form class="mdui-p-t-0 mdui-m-x-2 mdui-textfield mdui-textfield-floating-label" method="post">
            <label class="mdui-textfield-label">搜索</label>
            <input class="mdui-textfield-input" type="text" name="s" />
          </form>
          <div class="mdui-divider"></div>

          <a href="<?php $this->options->siteUrl(); ?>" class="mdui-list-item mdui-ripple" id="home-url">
            <i class="mdui-list-item-icon mdui-icon material-icons">&#xe88a;</i>
            <div class="mdui-list-item-content mdui-m-r-4">首页</div>
          </a>

        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php if ($pages->have()): ?>
          <?php while ($pages->next()): ?>
            <a href="<?php $pages->permalink(); ?>" class="mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon material-icons">&#xe86e;</i>
              <div class="mdui-list-item-content mdui-m-r-4"><?php $pages->title(); ?></div>
            </a>
          <?php endwhile; ?>
          <div class="mdui-divider"></div>
        <?php endif; ?>
</div>
</div>





<div id="menu-body">


<!-- AppBar -->
<?php
echo '<div class="mdui-appbar '.$this->options->appbarSet.'"  id="appbar"> ';
?>
<!-- mdui-appbar-fixed -->
    <div class="mdui-toolbar mdui-color-theme">
        <!-- 菜单 -->
        <!-- icon:menu -->
        <a href="javascript:;" id="toggle" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">&#xe5d2;</i></a>
        <!-- 站点标题 -->
        <a href="<?php $this->options->siteUrl(); ?>" class="mdui-typo-headline"><?php $this->options->title() ?></a>
        <div class="mdui-toolbar-spacer"></div>
        <!-- icon:brightness_high -->
        <span class="mdui-btn mdui-btn-icon" id="dark_toggle_btn" onclick='toggleDark();'><i class="mdui-icon material-icons" id="dark_toggle_icon">&#xe1ac;</i></span>
        <!-- icon:rss_feed -->
        
        <button id="open-rss-menu" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">&#xe0e5;</i></button>
        <ul class="mdui-menu" id="rss-menu">
          <li class="mdui-menu-item">
            <a href="<?php $this->options->feedUrl(); ?>" class="mdui-ripple">文章 RSS</a>
          </li>
          <li class="mdui-menu-item">
            <a href="<?php $this->options->commentsFeedUrl(); ?>" class="mdui-ripple">评论 RSS</a>
          </li>
        </ul>
        
    </div>
</div>
</div>


<div id="body">
    <div class="container">


    
    
