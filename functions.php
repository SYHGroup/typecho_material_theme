<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
	$billboard = new Typecho_Widget_Helper_Form_Element_Text('billboard', NULL, _t('https://manage.conoha.jp/Content/Images/ConoHa/ConoHaMode/bg_conoha.jpg'), _t('首页图片'), _t('在这里填入一个图片URL, 作为首页图片, 留空则不使用<p style="word-break:break-all">默认URL：https://manage.conoha.jp/Content/Images/ConoHa/ConoHaMode/bg_conoha.jpg</p>'));
	$form->addInput($billboard);
	$slogan = new Typecho_Widget_Helper_Form_Element_Text('slogan', NULL, _t('simonsmh后花园'), _t('首页图片主标语'), _t('在这里填入一段文字，作为首页图片中的主要文字, 留空则不使用'));
	$form->addInput($slogan);
	$leanSlogan = new Typecho_Widget_Helper_Form_Element_Text('leanSlogan', NULL, NULL, _t('首页图片副标语'), _t('在这里填入一段文字，作为首页图片中的附加文字, 留空则不使用'));
	$form->addInput($leanSlogan);
	$siteIcon = new Typecho_Widget_Helper_Form_Element_Text('siteIcon', NULL,  _t('/usr/themes/typecho_material_theme/img/favicon.ico'), _t('标题栏和书签栏 Icon'), _t('在这里填入一个图片URL, 作为标题栏和书签栏 Icon, 留空则不使用'));
	$form->addInput($siteIcon);
	$miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, NULL, _t('备案号'), _t('在这里填入网站备案号，留空则不使用'));
	$form->addInput($miibeian);
	$googleAnalyticsTrackingId = new Typecho_Widget_Helper_Form_Element_Text('googleAnalyticsTrackingId', NULL, _t('UA-73742380-2'), _t('Google Analytics Tracking ID'), _t('在这里填入 Google Analytics Tracking ID, 留空则不使用'));
	$form->addInput($googleAnalyticsTrackingId);
	$datearchivetype = new Typecho_Widget_Helper_Form_Element_Select('datearchivetype',
	array('year'=>_t('按年排序'),'month'=>_t('按月排序'),'day'=>_t('按日排序')),'month', _t('归档模式'), _t('在这里选择归档模式'));
	$form->addInput($datearchivetype);
	$datearchiveformat = new Typecho_Widget_Helper_Form_Element_Text('datearchiveformat', NULL,  _t('Y年 m月'), _t('归档时间格式'), _t('在这里填入归档时间格式, 请务必根据归档模式修改, 具体写法请参考<a href="http://www.php.net/manual/zh/function.date.php" target="_blank">PHP 日期格式写法</a>'));
	$form->addInput($datearchiveformat);
	$misc = new Typecho_Widget_Helper_Form_Element_Checkbox('misc',
	array('ShowLogin' => _t('前台显示登录入口'),'ShowThemeCopyRight' => _t('页脚显示模板版权'),'ShowLoadTime' => _t('页脚显示加载耗时'),),array('ShowLogin','ShowThemeCopyRight','ShowLoadTime'), _t('杂项'));
	$form->addInput($misc->multiMode());
}
function timer_start() {
	global $timestart;
	$mtime = explode( ' ', microtime() );
	$timestart = $mtime[1] + $mtime[0];
	return true;
}
timer_start();
function timer_stop($display = 0,$precision = 3) {
	global $timestart, $timeend;
	$mtime = explode( ' ', microtime() );
	$timeend = $mtime[1] + $mtime[0];
	$timetotal = number_format( $timeend - $timestart, $precision );
	$r = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
	if ( $display )
	echo $r;
	return $r;
}
