<?php
if (isset($_POST['username'])){
	$username=$_POST['username'];
	$password=MD5($_POST['password']);
	$email=$_POST['email'];
	$qq=$_POST['qq'];
	if (!file_exists('../data/user/'.$username.'')){
		include '../inc/global.php';
		$pt_type='reg3';
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}else{
		echo"<script>alert('���û����Ѿ����ڣ�');location.href='reg2.php';</script>";
		exit();
	}
}else{
	echo"<script>alert('��·����ȷ��');location.href='reg.php';</script>";
	exit();
}
?>