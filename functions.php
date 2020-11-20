<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

require_once("libs/contents.php");

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


function outputEnd($pangu) {
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
      'deep-orange' => 'Deep Orange',

      'transparent' => '透明',
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

      $pageSlogan = new Typecho_Widget_Helper_Form_Element_Text('pageSlogan', NULL, NULL, _t('首页 Banner 文字'), _t('该文字将会被输出在首页 Banner 上'));
        $form->addInput($pageSlogan);
    


        $bannerImage = new Typecho_Widget_Helper_Form_Element_Text(
          'bannerImage',NULL,'https://cdn.jsdelivr.net/gh/MyBlog-GitHub/image-upload@main/uPic/Xci879.jpg',
          _t('Banner 图片'),
          _t('Banner 背景图片（文章可另外设置）')
        );

        $form->addInput($bannerImage);

      $postMessage = new Typecho_Widget_Helper_Form_Element_Text('postMessage', NULL, NULL, _t('文章末尾信息'), _t('该信息将会在文章末尾显示（可标明版权等）'));
        $form->addInput($postMessage);
        


      $postIndexImage = new Typecho_Widget_Helper_Form_Element_Text(
        'postIndexImage',NULL,'https://cdn.jsdelivr.net/gh/MyBlog-GitHub/image-upload@main/uPic/www.todaybing.com.1605173678..1080P.jpg',
        _t('文章默认预览图'),
        _t('文章默认预览图，将在未设置单独预览图片时展示。')
      );
          $form->addInput($postIndexImage);
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
        ], '', _t('LazyLoad'), _t('开启图片懒加载后，站点内的图片都会使用懒加载加载。该设置不影响 SEO。'));
        $form->addInput($lazyLoad);
        
     // $this->options->pangu
     $pangu = new Typecho_Widget_Helper_Form_Element_Select('pangu', [
        false => '关闭',
        true => '开启'
        ], '', _t('中英文分割'), _t('使用 Pangu.php 对页面内的中英文，中文数字之间添加空格保证美观。'));
        $form->addInput($pangu);

      $appBarRSS = new Typecho_Widget_Helper_Form_Element_Select('appBarRSS', [
          true => '开启',
          false => '关闭'
          ], '', _t('导航栏 RSS'), _t('选择『关闭』将不展示 RSS 按键'));
          $form->addInput($appBarRSS);

    

      // ---


        // $this->options->comment
     $comment = new Typecho_Widget_Helper_Form_Element_Select('comment', [
      "default" => 'Typecho 原生评论',
      "valine" => 'Valine 评论'
      ], '', _t('<hr/><h2>评论设置</h2>评论设置'), _t('评论设置，支持原生评论与 Valine 评论。<br/>如果选择 Valine ，请<strong>保证每个文章页路径的唯一性</strong>，永久链接不应该为 URL 后带参数。错误示例：https://site.url/?id=[文章 CID]'));
      $form->addInput($comment);

      $valineID = new Typecho_Widget_Helper_Form_Element_Text('valineID', NULL, NULL, _t('Valine - LeanCloud AppID'), _t('LeanCloud AppID（如选择 Valine 评论则必填）'));
      $form->addInput($valineID);

      $valineKey = new Typecho_Widget_Helper_Form_Element_Text('valineKey', NULL, NULL, _t('Valine - LeanCloud AppKey'), _t('LeanCloud AppKey（如选择 Valine 评论则必填）'));
      $form->addInput($valineKey);
      
      $valineHolder = new Typecho_Widget_Helper_Form_Element_Text('valineHolder', NULL, NULL, _t('Valine - 评论框占位提示符'), _t('Valine 评论框的占位提示符（选填）'));
      $form->addInput($valineHolder);
      
      $valineBiliBili = new Typecho_Widget_Helper_Form_Element_Select('valineBiliBili', [
        true => '开启',
        false => '关闭'
        ], '', _t('Valine - 哔哩哔哩表情'), _t('Valine 评论使用哔哩哔哩表情。如关闭，则使用微博表情。'));
        $form->addInput($valineBiliBili);




      $customCSS = new Typecho_Widget_Helper_Form_Element_Textarea('customCSS', null, null, '<hr/><h2>开发者设置</h2>自定义 CSS', '在此处编辑 CSS 代码，它将会被应用至每一个页面。');
        $form->addInput($customCSS);

      $customJS = new Typecho_Widget_Helper_Form_Element_Textarea('customJS', null, null, '自定义 JavaScript', '在此处编辑 JS 代码，它将会被应用至每一个页面。');
        $form->addInput($customJS);

      $customHeadHTML = new Typecho_Widget_Helper_Form_Element_Textarea('customHeadHTML', null, null, '自定义头部 HTML', '在此处编辑头部 HTML 代码，它将会被应用至每一个页面的头部。');
        $form->addInput($customHeadHTML);

      $customFootHTML = new Typecho_Widget_Helper_Form_Element_Textarea('customFootHTML', null, null, '自定义页脚 HTML', '在此处编辑页脚 HTML 代码，它将会被应用至每一个页面的页脚。');
        $form->addInput($customFootHTML);
    
}




// 文章发布页面
// 文章摘要
// $this->fields->excerpt;
function themeFields(Typecho_Widget_Helper_Layout $layout) {
  echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/oCoke/Assets@d46e5b3/mdt/settings.css'>";
	$excerpt = new Typecho_Widget_Helper_Form_Element_Text('excerpt', NULL, NULL,_t('文章摘要'), _t('输入一段文本来自定义摘要，如果为空则自动提取文章前 130 字。'));
    $layout->addItem($excerpt);
  $postImage = new Typecho_Widget_Helper_Form_Element_Text('postImage', NULL, NULL,_t('文章 Banner 图片'), _t('文章 Banner 图片链接，不输入则与默认 Banner 图保持一致。'));
    $layout->addItem($postImage);
  $indexImage = new Typecho_Widget_Helper_Form_Element_Text('indexImage', NULL, NULL,_t('文章列表图片'), _t('文章列表图片链接'));
    $layout->addItem($indexImage);
  $menuTree = new Typecho_Widget_Helper_Form_Element_Select('menuTree', [
      true => '开启',
      false => '关闭'
      ], '', _t('文章目录树'), _t('开启后将会在文章内容前插入目录树'));
      $form->addInput($menuTree);
}


