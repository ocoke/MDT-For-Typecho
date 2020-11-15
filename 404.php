<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


        <div class="error-page mdui-text-center">
            <div class="show-error">
                <h2 class="post-title">404 - <?php _e('页面没找到'); ?></h2>
                <p><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看 ?'); ?></p>
            </div>
            <div class="search-404 mdui-center">
            <form class="mdui-p-t-0 mdui-m-x-2 mdui-textfield mdui-textfield-floating-label mdui-center" method="post">
                <input class="mdui-textfield-input mdui-center" type="text" name="s" placeholder="搜索"/>
            </form>
            </div>
        </div>

	<?php $this->need('footer.php'); ?>
