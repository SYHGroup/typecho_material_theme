<?php

function themeConfig($form)  {
    $billboard = new Typecho_Widget_Helper_Form_Element_Text('billboard', NULL, _t('./usr/themes/typecho-material-theme/pixiv.php?num=0'), _t('首页图片'), _t('在这里填入一个图片URL, 作为首页图片'));
    $form->addInput($billboard);
    $slogan = new Typecho_Widget_Helper_Form_Element_Text('slogan', NULL, _t('simonsmh后花园'), _t('首页图片主标语'), _t('在这里填入一段文字，作为首页图片中的主要文字，留空则不显示'));
    $form->addInput($slogan);
    $leanSlogan = new Typecho_Widget_Helper_Form_Element_Text('leanSlogan', NULL, NULL, _t('首页图片副标语'), _t('在这里填入一段文字，作为首页图片中的附加文字，留空则不显示'));
    $form->addInput($leanSlogan);
    $siteIcon = new Typecho_Widget_Helper_Form_Element_Text('siteIcon', NULL,  _t('./usr/themes/typecho-material-theme/favicon.ico'), _t('标题栏和书签栏 Icon'), _t('在这里填入一个图片URL, 作为标题栏和书签栏 Icon, 默认不显示'));
    $form->addInput($siteIcon);
    $miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, NULL, _t('备案号'), _t('在这里填入网站备案号，留空则不显示'));
    $form->addInput($miibeian);
    $googleAnalyticsTrackingId = new Typecho_Widget_Helper_Form_Element_Text('googleAnalyticsTrackingId', NULL, _t('UA-73742380-2'), _t('Google Analytics Tracking ID'), _t('在这里填入 Google Analytics Tracking ID，不使用 Google Analytics 则留空'));
    $form->addInput($googleAnalyticsTrackingId);
 $misc = new Typecho_Widget_Helper_Form_Element_Checkbox('misc', array(
        'ShowLogin' => _t('前台显示登录入口'),
        'ShowThemeCopyRight' => _t('页脚显示模板版权'),
        'ShowLoadTime' => _t('页脚显示加载耗时'),
    ),
        array('ShowLogin'), _t('杂项'));
    $form->addInput($misc->multiMode());
}

function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
 
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format( $timetotal, $precision );
    if ( $display )
    echo $r;
    return $r;
}
