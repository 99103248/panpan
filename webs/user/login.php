<?php
include '../inc/global.php';

if (isset($_COOKIE['pt_username'])){
	$pt_type='msg';
	$msg="���Ѿ���¼��ϵͳת���û����ģ�";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}

$pt_type='login';
include PT_DIR . 'inc/useroutput.php';
?>