<?php
include '../inc/global.php';

setcookie("pt_username","",time()-41536000,"/");
if (isset($_GET['logintype']) and $_GET['logintype']=="logfrm"){
	$comeurl=$_GET['url'];
	echo"<script>location.href='$comeurl';</script>";
	exit();
}else{
	$pt_type='msg';
	$msg="���Ѿ��ɹ��˳���¼��";
	$url=PT_SITEURL."user/login.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
?>