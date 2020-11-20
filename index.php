<?php
/**
 * 简洁，专注阅读的 Typecho 博客主题。
 * 
 * @package MDT For Typecho 
 * @author oCoke
 * @version 0.4
 * @link https://github.com/oCoke/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
  
  $this->need('header.php');

?>





<?php while ($this->next()): ?>






  <!-- NEW -->
  <div class="mdui-card postDiv mdui-center mdui-hoverable">
	<div class="mdui-card-media mdui-color-theme">
    <a href="<?php $this->permalink(); ?>">
    <?php if($this->fields->indexImage): ?>
			<img src="<?php echo $this->fields->indexImage; ?>" class="mdui-color-theme mdui-text-color-theme">
    <?php elseif($this->options->postIndexImage): ?>
      <img src="<?php echo $this->options->postIndexImage; ?>" class="mdui-color-theme mdui-text-color-theme">
    <?php else: ?>
      <img src="https://cdn.jsdelivr.net/gh/MyBlog-GitHub/image-upload@main/uPic/www.todaybing.com.1605173678..1080P.jpg" class="mdui-color-theme mdui-text-color-theme">
      
    <?php endif; ?>
      <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
				<div class="mdui-card-primary">
					<div class="mdui-card-primary-title"><?php $this->title(); ?></div>
				</div>
			</div>
		</a>
	</div>
	<div class="mdui-card-actions">
		<p class="ct1-p mdui-typo">
    <?php if($this->fields->excerpt && $this->fields->excerpt!='') {
        // 输出文章简介
		    echo $this->fields->excerpt;
		}else{
        // 未设置文章简介则默认截取前 130 字
				echo $this->excerpt(130);
    }
    ?>
    </p>
    <br/><div class="mdui-divider underline"></div><br/>
    <span class="info">
 <i class="mdui-icon material-icons info-icon">&#57746;</i>  <?php $this->date(); ?>&nbsp; | &nbsp;
 <i class="mdui-icon material-icons info-icon">&#xe853;</i> <a class="mdui-text-color-theme-accent" href="<?php $this->author->permalink(); ?>" ><?php $this->author(); ?></a>&nbsp;&nbsp;
  </span> <a class="mdui-btn mdui-ripple mdui-ripple-white coun-read mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>">阅读更多</a></div></div>


<?php endwhile; ?>

<!-- 文章分页 -->
<div class="post-pagenav">
    <span class="mdui-btn"><?php $this->pageLink('<i class="mdui-icon material-icons">&#xe408;</i>'); ?></span>
		<span class="mdui-btn"><?php $this->pageLink('<i class="mdui-icon material-icons">&#xe409;</i>','next'); ?></span>
</div>
    



<?php $this->need('footer.php'); ?>
