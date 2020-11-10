<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="post-content mdui-card-content mdui-card">
    <div class="mdui-typo">
    <?php if($this->options->pangu == true) echo "<pangu>"; ?>
        <?php $this->content(); ?>
    <?php if($this->options->pangu == true) echo "</pangu>"; ?>
    </div>
    
    </div>
</div>
<div class="mdui-card mdui-m-y-3 mdui-text-center post-meta">
<div class="mdui-typo">
<blockquote style="margin: 20px;"><p>
<?php echo $this->options->postMessage; ?>
</p></blockquote>
</div>
<div class="mdui-card-primary-subtitle">
<!-- 时间 -->
<div class="mdui-chip">
  <span class="mdui-chip-icon"><i class="mdui-icon material-icons">&#xe192;</i></span>
  <span class="mdui-chip-title"><?php $this->date(); ?></span>
</div>
<!-- 作者 -->
<div class="mdui-chip">
  <span class="mdui-chip-icon"><i class="mdui-icon material-icons">&#xe87c;</i></span>
  <span class="mdui-chip-title"><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></span>
</div>
<!-- 分类 -->
<div class="mdui-chip">
  <span class="mdui-chip-icon"><i class="mdui-icon material-icons">&#xe866;</i></span>
  <span class="mdui-chip-title"><?php $this->category(' , ');  ?></span>
</div>

</div>
<!-- 如果此文有标签 -->
<?php if ($this->tags): ?>
<br/>
    <div>
        <i class="mdui-icon material-icons">&#xe54e;</i>
        <?php $this->tags('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', true, ''); ?></span>
    </div>
<?php endif; ?>
<br/>
</div>


</div>
<?php $this->need('comments.php'); ?>

</div><!-- end #main-->


<?php $this->need('footer.php'); ?>
