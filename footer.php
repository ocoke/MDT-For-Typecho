<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


    </div>
</div><!-- end #body -->

<?php if ($this->options->customFootHTML): ?>
    <?php $this->options->customFootHTML() ?>
<?php endif; ?>

<!-- MDT For Typecho By oCoke -->
<div id="footer" role="contentinfo" class="mdui-text-center mdui-card mdui-m-y-3">
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</p>
    <p>Powered by <a href="http://www.typecho.org">Typecho</a></p>
    <p>Theme <a href="https://github.com/oCoke/MDT-For-Typecho">MDT</a> by <a href="https://github.com/oCoke">oCoke</a></p>
</div><!-- end #footer -->

<!-- MDUI JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.0/dist/js/mdui.min.js" integrity="sha384-aB8rnkAu/GBsQ1q6dwTySnlrrbhqDwrDnpVHR2Wgm8pWLbwUnzDcIROX3VvCbaK+" crossorigin="anonymous"></script> -->
<script src="<?php $this->options->themeUrl('assets/js/mdui.min.js'); ?>"></script>

<!-- Highlight.js -->

<script src="<?php $this->options->themeUrl('assets/js/prism.js'); ?>"></script>

<!-- JavaScript -->
<script src="<?php $this->options->themeUrl('assets/js/script.js'); ?>"></script>

<!-- LazyLoad -->
<?php if ($this->options->lazyLoad == true) : ?>
    <script src="<?php $this->options->themeUrl('assets/js/lazysizes.min.js'); ?>"></script>
<?php endif; ?>
<!-- 顺滑滚动 -->

<?php if ($this->options->smoothScroll == true) : ?>
    <script src="<?php $this->options->themeUrl('assets/js/smoothscroll.js'); ?>"></script>
    
<?php endif; ?>

<script src="<?php $this->options->themeUrl('assets/js/darkmode.js'); ?>"></script>

<?php outputEnd($this->options->pangu, $this->options->lazyLoad); ?>

<?php $this->footer(); ?>

<?php if ($this->options->customJS): ?>
    <script>
      <?php $this->options->customJS() ?>
    </script>
<?php endif; ?>

</body>
</html>