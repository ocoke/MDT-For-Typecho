<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<!-- post-main -->
<div class="mdui-card mdui-m-y-3">
<div class="mdui-card-primary">
    <div class="mdui-card-primary-title">
        <?php $this->title();?>
    </div>
    <div class="mdui-card-primary-subtitle">
        <?php $this->date(); ?>
        <span>&nbsp;|&nbsp;</span><i class="mdui-icon material-icons">&#xe853;</i>&nbsp;<a href="<?php $this->author->permalink(); ?>" class="link"><?php $this->author(); ?></a>
        <span>&nbsp;|&nbsp;</span><i class="mdui-icon material-icons">&#xe866;</i>&nbsp;<?php $this->category(' , '); ?>
    </div>
</div>
</div>
<div class="mdui-card-content mdui-card">
    <div class="mdui-typo">
    <?php if($this->options->pangu == true) echo "<pangu>"; ?>
        <?php $this->content(); ?>
    <?php if($this->options->pangu == true) echo "</pangu>"; ?>
    </div>
    <!-- 如果此文有标签 -->
    <?php if ($this->tags): ?>
    <br/>
    <div class="mdui-divider"></div>
    <div class="mdui-chip">
        <span class="mdui-chip-icon"><i class="mdui-icon material-icons">&#xe226;</i></span>
        <span class="mdui-chip-title"><?php $this->tags('</span></div>
      <div class="mdui-chip mdui-m-t-3">
        <span class="mdui-chip-icon"><i class="mdui-icon material-icons">&#xe226;</i></span>
        <span class="mdui-chip-title">', true, ''); ?></span>
    </div>
    <?php endif; ?>
    </div>
</div>
<?php $this->need('comments.php'); ?>

</div><!-- end #main-->


<?php $this->need('footer.php'); ?>
