<?php
//��������
error_reporting(0);
ini_set("max_execution_time", "180");
date_default_timezone_set ('PRC');
define('PT_PATH', str_replace('inc', '', dirname(__file__)));
//��ֹ�Ƿ�POST
if (!empty($_REQUEST )){
	$value=implode(" ",$_REQUEST );
	if(preg_match("/\{|\}|fputs|fopen|base64|eval/i", $value)){
		exit('�����Ƿ�');
	}
}
//��������
include PT_PATH . 'data/config.php';
//��վ����
if (PT_OPEN=="false"){
	header("HTTP/1.1 500 Internal Server Error");
	die(PT_CLOSEWHY);
}
//����ģʽ
define ('PT_URLTYPE','web');
if ($_SERVER["SERVER_NAME"]==PT_WAPURL){
	header('location:'.PT_SITEURL.'wap/index.php');
	exit;
}
//�������ļ�
include PT_PATH . 'inc/common.class.php';//������
include PT_PATH . 'inc/tpl.class.php';//ģ����
//��ʼ����
$pt = new pt;//������
$pt_tpl = new pt_tpl;//ģ����
//֩���¼
if (PT_BOT_POWER=="true"){
	include PT_DIR . 'plus/bot/ptbot.php';
}
//ģ��������黺���ļ�
$tpl_file_nav = PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/nav.tpl.php';
$tpl_file_block = PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/block.tpl.php';
$tpl_file_blocklist = PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';
$rule_file_blocklist=PT_DIR . 'cache/' . PT_RULESDIR . PT_RULE . '/block.list.php';
//�ж��Ƿ���Ҫ�ٴν���
if (!file_exists($tpl_file_nav) or PT_CACHE_BLOCK=='false'){
	include PT_DIR . 'inc/tpl.nav.php';
}
if (!file_exists($rule_file_blocklist) or PT_CACHE_BLOCK=='false'){
	include PT_DIR . 'inc/list.block.php';
}
if (!file_exists($tpl_file_blocklist) or PT_CACHE_BLOCK=='false'){
	include PT_DIR . 'inc/tpl.blocklist.php';
}
if (!file_exists($tpl_file_block) or PT_CACHE_BLOCK=='false') {
	include PT_DIR . 'inc/tpl.block.php';
}
//������໺���ļ�
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/nav.tpl.php';
?>