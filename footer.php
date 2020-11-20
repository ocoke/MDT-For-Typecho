<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


    

<?php if ($this->options->customFootHTML): ?>
    <?php $this->options->customFootHTML() ?>
<?php endif; ?>

<!-- MDT For Typecho By oCoke -->
<div id="footer" role="contentinfo" class="mdui-text-center mdui-card mdui-m-y-3 footer">
    <p>&copy; <?php echo date('Y'); ?> <a class="mdui-text-color-theme-accent" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</p>
    <p>Powered by <a class="mdui-text-color-theme-accent" href="http://www.typecho.org">Typecho</a></p>
    <p>Theme <a class="mdui-text-color-theme-accent" href="https://github.com/oCoke/MDT-For-Typecho">MDT</a> by <a class="mdui-text-color-theme-accent" href="https://github.com/oCoke">oCoke</a></p>
</div><!-- end #footer -->
</div><!-- end #main-->
</div>
</div><!-- end #body -->
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

<!-- RSS 目录 -->
<?php if ($this->options->appBarRSS == true) : ?>
    
<script>
// RSS-MENU

var rss = new mdui.Menu('#open-rss-menu', '#rss-menu');

// method
document.getElementById('open-rss-menu').addEventListener('click', function () {
    rss.open();
});
</script>
<?php endif; ?>


<script src="<?php $this->options->themeUrl('assets/js/darkmode.js'); ?>"></script>

<?php if($this->options->comment == "valine"): ?>
<script src="<?php $this->options->themeUrl('assets/js/valine.min.js'); ?>"></script>
<?php endif; ?>

<?php outputEnd($this->options->pangu, $this->options->lazyLoad); ?>

<?php $this->footer(); ?>

<?php if($this->options->comment == "valine"): ?>
<script>
    new Valine({
        el: '#vcomments',
        appId: '<?php echo $this->options->valineID; ?>',
        appKey: '<?php echo $this->options->valineKey; ?>',
        placeholder: '<?php echo $this->options->valineHolder; ?>',
        enableQQ: true,
        <?php if($this->options->valineBiliBili == true): ?>
        emojiCDN: '//i0.hdslb.com/bfs/emote/',
        emojiMaps: {
        "tv_doge": "6ea59c827c414b4a2955fe79e0f6fd3dcd515e24.png",
        "tv_亲亲": "a8111ad55953ef5e3be3327ef94eb4a39d535d06.png",
        "tv_偷笑": "bb690d4107620f1c15cff29509db529a73aee261.png",
        "tv_再见": "180129b8ea851044ce71caf55cc8ce44bd4a4fc8.png",
        "tv_冷漠": "b9cbc755c2b3ee43be07ca13de84e5b699a3f101.png",
        "tv_发怒": "34ba3cd204d5b05fec70ce08fa9fa0dd612409ff.png",
        "tv_发财": "34db290afd2963723c6eb3c4560667db7253a21a.png",
        "tv_可爱": "9e55fd9b500ac4b96613539f1ce2f9499e314ed9.png",
        "tv_吐血": "09dd16a7aa59b77baa1155d47484409624470c77.png",
        "tv_呆": "fe1179ebaa191569b0d31cecafe7a2cd1c951c9d.png",
        "tv_呕吐": "9f996894a39e282ccf5e66856af49483f81870f3.png",
        "tv_困": "241ee304e44c0af029adceb294399391e4737ef2.png",
        "tv_坏笑": "1f0b87f731a671079842116e0991c91c2c88645a.png",
        "tv_大佬": "093c1e2c490161aca397afc45573c877cdead616.png",
        "tv_大哭": "23269aeb35f99daee28dda129676f6e9ea87934f.png",
        "tv_委屈": "d04dba7b5465779e9755d2ab6f0a897b9b33bb77.png",
        "tv_害羞": "a37683fb5642fa3ddfc7f4e5525fd13e42a2bdb1.png",
        "tv_尴尬": "7cfa62dafc59798a3d3fb262d421eeeff166cfa4.png",
        "tv_微笑": "70dc5c7b56f93eb61bddba11e28fb1d18fddcd4c.png",
        "tv_思考": "90cf159733e558137ed20aa04d09964436f618a1.png",
        "tv_惊吓": "0d15c7e2ee58e935adc6a7193ee042388adc22af.png",
        }  
        <?php endif; ?>
    })
</script>
<?php endif; ?>


<?php if ($this->options->customJS): ?>
    <script>
      <?php $this->options->customJS() ?>
    </script>
<?php endif; ?>

</body>
</html>