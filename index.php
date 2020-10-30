<?php
/**
 * 简洁，专注阅读的 Typecho 博客主题。
 * 
 * @package MDT For Typecho 
 * @author oCoke
 * @version 0.3
 * @link https://github.com/oCoke
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
  
  $this->need('header.php');

?>



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
    
    </div>
    <div class="mdui-card-actions">
      <a class="mdui-btn mdui-ripple mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>">继续阅读</a>
    </div>
  </div>
<?php endwhile; ?>

<!-- 文章分页 -->
<div class="post-pagenav">
    <span class="mdui-btn"><?php $this->pageLink('<i class="mdui-icon material-icons">&#xe408;</i>'); ?></span>
		<span class="mdui-btn"><?php $this->pageLink('<i class="mdui-icon material-icons">&#xe409;</i>','next'); ?></span>
</div>
    
</div><!-- end #main-->


<?php $this->need('footer.php'); ?>
