<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="mdui-typo mdui-text-center">
        <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类「%s」下的文章'),
            'search'    =>  _t('包含关键字「%s」的文章'),
            'tag'       =>  _t('标签「%s」下的文章'),
            'author'    =>  _t('作者「%s」发布的文章')
        ), '', ''); ?></h3>

    </div>
        <?php if ($this->have()): ?>
        <!-- 如果有相关内容，则进入 while 循环打印相关文章 -->
    	<?php while ($this->next()): ?>
  <div class="mdui-card mdui-hoverable mdui-m-y-3">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
      <div class="mdui-card-primary-subtitle mdui-text-color-theme-text">
        <?php $this->date(); ?>
          <span>&nbsp;|&nbsp;</span><i class="mdui-icon material-icons">&#xe853;</i>&nbsp;<a href="<?php $this->author->permalink(); ?>" class="link"><?php $this->author(); ?></a>

    
          <span>&nbsp;|&nbsp;</span><i class="mdui-icon material-icons">&#xe866;</i>&nbsp;<?php $this->category(' , '); ?>

      </div>
    </div>
    <?php
    $excerpt = $this->fields->excerpt;
    ?>
    <!-- 文章简介 -->
    <div class="mdui-card-content mdui-typo">
    <?php if($this->fields->excerpt && $this->fields->excerpt!='') {
        // 输出文章简介
		    echo $this->fields->excerpt;
		}else{
        // 未设置文章简介则默认截取前 130 字
				echo $this->excerpt(130);
		}
		?>
    <div class="mdui-card-actions">
      <a class="mdui-btn mdui-ripple mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>">继续阅读</a>
    </div>
  </div>
  </div>
<?php endwhile; ?>
    	
        <?php else: ?>
          <div class="mdui-typo mdui-text-center">
                <h2 class="post-title"><?php _e('没有找到相关内容'); ?></h2>
          </div>
        <?php endif; ?>

<!-- 文章分页 -->
<div class="post-pagenav">
    <span class="mdui-btn"><?php $this->pageLink('<i class="mdui-icon material-icons">&#xe408;</i>'); ?></span>
		<span class="mdui-btn"><?php $this->pageLink('<i class="mdui-icon material-icons">&#xe409;</i>','next'); ?></span>
</div>
    </div><!-- end #main -->

	<?php $this->need('footer.php'); ?>
