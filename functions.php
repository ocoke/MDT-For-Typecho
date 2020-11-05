<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
// Pangu
function pangu($text) {
    $cjk = '' .
           '\x{2e80}-\x{2eff}' .
           '\x{2f00}-\x{2fdf}' .
           '\x{3040}-\x{309f}' .
           '\x{30a0}-\x{30ff}' .
           '\x{3100}-\x{312f}' .
           '\x{3200}-\x{32ff}' .
           '\x{3400}-\x{4dbf}' .
           '\x{4e00}-\x{9fff}' .
           '\x{f900}-\x{faff}';
    $patterns = array(
      'cjk_quote' => array(
        '([' . $cjk . '])(["\'])',
        '$1 $2'
      ),
      'quote_cjk' => array(
        '(["\'])([' . $cjk . '])',
        '$1 $2'
      ),
      'fix_quote' => array(
        '(["\']+)(\s*)(.+?)(\s*)(["\']+)',
        '$1$3$5'
      ),
      'cjk_hash' => array(
        '([' . $cjk . '])(#(\S+))',
        '$1 $2'
      ),
      'hash_cjk' => array(
        '((\S+)#)([' . $cjk . '])',
        '$1 $3'
      ),
      'cjk_operator_ans' => array(
        '([' . $cjk . '])([A-Za-zΑ-Ωα-ω0-9])([\+\-\*\/=&\\|<>])',
        '$1 $2 $3'
      ),
      'ans_operator_cjk' => array(
        '([\+\-\*\/=&\\|<>])([A-Za-zΑ-Ωα-ω0-9])([' . $cjk . '])',
        '$1 $2 $3'
      ),
      'bracket' => array(
        array(
          '([' . $cjk . '])([<\[\{\(]+(.*?)[>\]\}\)]+)([' . $cjk . '])',
          '$1 $2 $4'
        ),
        array(
          'cjk_bracket' => array(
            '([' . $cjk . '])([<>\[\]\{\}\(\)])',
            '$1 $2'
          ),
          'bracket_cjk' => array(
            '([<>\[\]\{\}\(\)])([' . $cjk . '])',
            '$1 $2'
          )
        )
      ),
      'fix_bracket' => array(
        '([<\[\{\(]+)(\s*)(.+?)(\s*)([>\]\}\)]+)',
        '$1$3$5'
      ),
      'cjk_ans' => array(
        '([' . $cjk . '])([A-Za-zΑ-Ωα-ω0-9`@&%\=\$\^\*\-\+\\/|\\\])',
        '$1 $2'
      ),
      'ans_cjk' => array(
        '([A-Za-zΑ-Ωα-ω0-9`~!%&=;\|\,\.\:\?\$\^\*\-\+\/\\\])([' . $cjk . '])',
        '$1 $2'
      )
    );
    foreach ($patterns as $key => $value) {
      if ($key === 'bracket') {
        $old = $text;
        $new = preg_replace('/' . $value[0][0] . '/iu', $value[0][1], $text);
        $text = $new;
        if ($old === $new) {
          foreach ($value[1] as $val) {
            $text = preg_replace('/' . $val[0] . '/iu', $val[1], $text);
          }
        }
        continue;
      }
      $text = preg_replace('/' . $value[0] . '/iu', $value[1], $text);
    }
    return $text;
  }


function outputStart() {
    ob_end_clean();
    ob_start();
}


function outputEnd($pangu, $lazyLoad) {
    $output = ob_get_contents();
    ob_end_clean();
    if ($pangu) {
        // 中英文分割
        $output = preg_split('/(<pangu.*?\/pangu>)/msi', $output, NULL, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($output as $splitKey => $splitValue) {
          if (substr_compare($splitValue, '<pangu>', 0, 7) == 0) {
            $splitValue = preg_split('/(<nopangu.*?\/nopangu>|<pre.*?\/pre>|<code.*?\/code>|<textarea.*?\/textarea>)/msi', substr($splitValue, 7, -8), NULL, PREG_SPLIT_DELIM_CAPTURE);
            foreach ($splitValue as $exceptKey => $exceptValue) {
              if (
                substr_compare($exceptValue, '<nopangu', 0, 8) !== 0 &&
                substr_compare($exceptValue, '<pre', 0, 4) !== 0 &&
                substr_compare($exceptValue, '<code', 0, 5) !== 0 &&
                substr_compare($exceptValue, '<textarea', 0, 9) !== 0
              ) {
                $exceptValue = pangu($exceptValue);
              }
              $splitValue[$exceptKey] = $exceptValue;
            }
            $splitValue = implode('', $splitValue);
          }
          $output[$splitKey] = $splitValue;
        }
        $output = implode('', $output);
      }
      
    if ($lazyLoad) {
        // 图片懒加载
        $dom = new DOMDocument();
        @$dom->loadHTML($output);
        foreach ($dom->getElementsByTagName('img') as $node) {
        $node->setAttribute("class", $node->getAttribute('class') . " lazyload mdui-shadow-3 mdui-center");
        $node->setAttribute("data-src", $node->getAttribute('src'));
        $node->setAttribute("src", "https://cdn.jsdelivr.net/gh/oCoke/Assets@b3d2cef/mdt/loading-2.gif" );
    }
    $output = $dom->saveHtml();
    }
    echo $output;

}

// 设置页面
function themeConfig($form) {
    echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/oCoke/Assets@d46e5b3/mdt/settings.css'>";
    $primaryColor = new Typecho_Widget_Helper_Form_Element_Select('primaryColor', [
      'indigo' => 'Indigo',
      'red' => 'Red',
      'pink' => 'Pink',
      'purple' => 'Purple',
      'deep-purple' => 'Deep Purple',
      'blue' => 'Blue',
      'light-blue' => 'Light Blue',
      'cyan' => 'Cyan',
      'teal' => 'Teal',
      'green' => 'Green',
      'light-green' => 'Light Green',
      'lime' => 'Lime',
      'yellow' => 'Yellow',
      'amber' => 'Amber',
      'orange' => 'Orange',
      'deep-orange' => 'Deep Orange'
      ], '', _t('<h2>基础设置</h2>站点主题色'), _t('文档：https://heyos.gitee.io/mdt-docs/#/start/color'));
      $form->addInput($primaryColor);
      
    
    
      $accentColor = new Typecho_Widget_Helper_Form_Element_Select('accentColor', [
        'indigo' => 'Indigo',
        'red' => 'Red',
        'pink' => 'Pink',
        'purple' => 'Purple',
        'deep-purple' => 'Deep Purple',
        'blue' => 'Blue',
        'light-blue' => 'Light Blue',
        'cyan' => 'Cyan',
        'teal' => 'Teal',
        'green' => 'Green',
        'light-green' => 'Light Green',
        'lime' => 'Lime',
        'yellow' => 'Yellow',
        'amber' => 'Amber',
        'orange' => 'Orange',
        'deep-orange' => 'Deep Orange'
        ], '', _t('站点强调色'), _t('文档：https://heyos.gitee.io/mdt-docs/#/start/color'));
        $form->addInput($accentColor);


    

    // $this->options->smoothScroll
    $smoothScroll = new Typecho_Widget_Helper_Form_Element_Select('smoothScroll', [
    false => '关闭',
    true => '开启'
    ], '', _t('<hr/><h2>高级设置</h2>顺滑滚动'), _t('将改善页面滚动时的体验，但可能会造成页面滚动时轻微掉帧'));
    $form->addInput($smoothScroll);

     // $this->options->lazyLoad
    $lazyLoad = new Typecho_Widget_Helper_Form_Element_Select('lazyLoad', [
        false => '关闭',
        true => '开启'
        ], '', _t('LazyLoad'), _t('开启图片懒加载后，站点内的图片都会使用懒加载加载。不影响 SEO。'));
        $form->addInput($lazyLoad);
        
     // $this->options->pangu
     $pangu = new Typecho_Widget_Helper_Form_Element_Select('pangu', [
        false => '关闭',
        true => '开启'
        ], '', _t('中英文分割'), _t('使用 Pangu.php 对页面内的中英文，中文数字之间添加空格保证美观。'));
        $form->addInput($pangu);
    


      
      




      $customCSS = new Typecho_Widget_Helper_Form_Element_Textarea('customCSS', null, null, '<hr/><h2>开发者设置</h2>自定义 CSS', '在此处编辑 CSS 代码，它将会被应用至每一个页面。');
        $form->addInput($customCSS);

      $customJS = new Typecho_Widget_Helper_Form_Element_Textarea('customJS', null, null, '自定义 JavaScript', '在此处编辑 JS 代码，它将会被应用至每一个页面。');
        $form->addInput($customJS);

      $customHeadHTML = new Typecho_Widget_Helper_Form_Element_Textarea('customHeadHTML', null, null, '自定义头部 HTML', '在此处编辑头部 HTML 代码，它将会被应用至每一个页面的头部。');
        $form->addInput($customHeadHTML);

      $customFootHTML = new Typecho_Widget_Helper_Form_Element_Textarea('customFootHTML', null, null, '自定义页脚 HTML', '在此处编辑页脚 HTML 代码，它将会被应用至每一个页面的页脚。');
        $form->addInput($customFootHTML);
    // $this->options->cdn
    // $cdn = new Typecho_Widget_Helper_Form_Element_Select('cdn', [
    //   'false' => '关闭',
    //   'jsdelivr' => 'jsDelivr',
    //   'unicloud' => 'UniCloud',
    //   'true' => '自定义'
    //   ], '', _t('静态资源 CDN 调用'), _t('使用 CDN 调用静态资源'));
    //   $form->addInput($cdn);
    // // $this->options->cdnAddress
    // $cdnAddress = new Typecho_Widget_Helper_Form_Element_Text('cdnAddress', NULL, NULL, _t('自定义 CDN 链接'), _t('如您选择自定义 CDN 链接，请填写此项。目录下的内容应有 assets 目录下的内容。填写示例：https://cdn.url/assets/'));
    //   $form->addInput($cdnAddress);
}




// 文章发布页面
// 文章摘要
// $this->fields->excerpt;
function themeFields(Typecho_Widget_Helper_Layout $layout) {
  echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/oCoke/Assets@d46e5b3/mdt/settings.css'>";
	$excerpt = new Typecho_Widget_Helper_Form_Element_Text('excerpt', NULL, NULL,_t('文章摘要'), _t('输入一段文本来自定义摘要，如果为空则自动提取文章前 130 字。'));
    $layout->addItem($excerpt);
}


// if ($this->options->cdn == "false"){
//   // 本地链接
//   $cdnURLcss = $this->options->themeUrl('assets/css/');
//   $cdnURLjs = $this->options->themeUrl('assets/js/');
//   $cdnURLfont = $this->options->themeUrl('assets/fonts/');
//   $cdnURLicon = $this->options->themeUrl('assets/icons/');
//   $cdnURLimg = $this->options->themeUrl('assets/img/');
// }elseif ($this->options->cdn == "jsdelivr"){
//   // jsDelivr
//   $cdnURLcss = $this->options->themeUrl('assets/css/');
//   $cdnURLjs = $this->options->themeUrl('assets/js/');
//   $cdnURLfont = $this->options->themeUrl('assets/fonts/');
//   $cdnURLicon = $this->options->themeUrl('assets/icons/');
//   $cdnURLimg = $this->options->themeUrl('assets/img/');
// }elseif ($this->options->cdn == "unicloud"){
//   // UniCloud
//   $cdnURLcss = $this->options->themeUrl('assets/css/');
//   $cdnURLjs = $this->options->themeUrl('assets/js/');
//   $cdnURLfont = $this->options->themeUrl('assets/fonts/');
//   $cdnURLicon = $this->options->themeUrl('assets/icons/');
//   $cdnURLimg = $this->options->themeUrl('assets/img/');
// }elseif ($this->options->cdn == "true"){
//   // 自定义
//   $cdnURLcss = $this->options->cdnAddress.'css/';
//   $cdnURLjs = $this->options->cdnAddress.'js/';
//   $cdnURLfont = $this->options->cdnAddress.'fonts/';
//   $cdnURLicon = $this->options->cdnAddress.'icons/';
//   $cdnURLimg = $this->options->cdnAddress.'img/';
// }