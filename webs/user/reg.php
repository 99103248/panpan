<?php
include '../inc/global.php';
if (isset($_COOKIE['pt_username'])){
	$pt_type='msg';
	$msg="���ѵ�¼�������ظ�ע�ᣡ";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
$pt_type='reg';
include PT_DIR . 'inc/useroutput.php';
?>