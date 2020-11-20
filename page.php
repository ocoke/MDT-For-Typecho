<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $Content = CreateCatalog($this->content) ?>
<?php if($this->fields->menuTree == true): ?>
<div class="post-content mdui-card-content mdui-card">
<?php GetCatalog() ?>
<?php endif; ?>
</div>
<div class="post-content mdui-card-content mdui-card">
    <div class="mdui-typo">
    <?php if($this->options->pangu == true) echo "<pangu>"; ?>
        
        <?php echo $Content; ?>
    <?php if($this->options->pangu == true) echo "</pangu>"; ?>
    </div>
    
    
</div>


<?php $this->need('comments.php'); ?>




<?php $this->need('footer.php'); ?>
