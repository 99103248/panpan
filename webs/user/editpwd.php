<?php
include 'usercheck.php';

if (isset($_POST['dosubmit'])){
	unset($_POST['dosubmit']);
	if ($password==md5($_POST['old_password'])){
		$newpassword=md5($_POST['password']);
		$file='../data/user/'.$username.'/info.php';
		$str=file_get_contents($file);
		$str=str_replace($password,$newpassword,$str);
		$result=$pt->writeto($file,$str);
		if ($result){
			setcookie("pt_username","",time()-41536000,"/");
			$pt_type='msg';
			$msg="�޸ĳɹ��������µ�¼��";
			$url=PT_SITEURL."user/login.php";
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}else{
			$pt_type='msg';
			$msg="�޸�ʧ�ܣ�����ϵ����Ա��";
			$url=PT_SITEURL."user/editpwd.php";
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}
	}else{
		$pt_type='msg';
		$msg="�޸�ʧ�ܣ�ԭ�������";
		$url=PT_SITEURL."user/editpwd.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

$pt_type='editpwd';
include PT_DIR . 'inc/useroutput.php';
?>