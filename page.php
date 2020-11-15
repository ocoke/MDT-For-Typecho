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





</div>
<?php $this->need('comments.php'); ?>

</div><!-- end #main-->


<?php $this->need('footer.php'); ?>
