<?php
include '../inc/global.php';
include '../data/user.php';
if (isset($_POST['username'])){
	$username_chk=$_POST['username'];
	$password_chk=md5($_POST['password']);
	$cookietime=$_POST['cookietime'];
	$comeurl=$_POST['comeurl'];
}elseif(isset($_GET['msg'])){
	$pt_type='msg';
	$msg=$_GET['msg'];
	$url=$_GET['url'];
	include PT_DIR . 'inc/useroutput.php';
	exit();
}else{
	echo '��·����ȷ��';
	exit();
}

$userfile='../data/user/'.$username_chk.'/info.php';
if (file_exists($userfile)){
	include $userfile;
	if (strtolower($username)==strtolower($username_chk) and $password==$password_chk){
		setcookie("pt_username",$username,time()+$cookietime,"/");
		//��¼��־
		$userfile='../data/user/'.$username_chk.'/log.php';
		include $userfile;
		setcookie("logtime",$logtime,time()+$cookietime,"/");
		setcookie("logip",$logip,time()+$cookietime,"/");
		$str='<?php'."\n";
		$str.="\$logtime='".date("Y-m-d H:i:s")."';\n";
		$str.="\$logip='".$_SERVER["REMOTE_ADDR"]."';\n";
		$str.="?>";
		$file='../data/user/'.$username.'/log.php';
		$result=$pt->writeto($userfile,$str);
		//��������
		$userfile = '../data/user/'.$username_chk.'/point.php';
		include $userfile;
		include '../data/user.php';
		//ÿ�ջ��ֵ�¼��֤
		$logtimelast=explode(' ',$logtime);
		$logtimenow=date("Y-m-d");
		if ($logtimenow != $logtimelast['0']) {
			$userpoint=$userpoint+$pt_user_loginpoint;
		}
		setcookie("pt_userlv",$pt_user_lvname[$userlv],time()+$cookietime,"/");
		$pmstr=file_get_contents('../data/user/'.$username_chk.'/pm.php');
		$pmnum=substr_count($pmstr,'1~|~1');
		setcookie("pt_userpmnum",$pmnum,time()+$cookietime,"/");
		$str='<?php'."\n";
		$str.="\$userpoint='".$userpoint."';\n";
		$str.="\$userlv='".$userlv."';\n";
		$str.="\$comepoint='".$comepoint."';\n";
		$str.="\$comenum='".$comenum."';\n";
		$str.="?>";
		$result=$pt->writeto($userfile,$str);
		if (isset($_POST['logintype']) and $_POST['logintype']=="logfrm"){
			echo"<script>location.href='$comeurl';</script>";
		}else{			
			$pt_type='msg';
			$msg="��¼�ɹ��������Զ����أ�";
			$url=$comeurl;
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}			 
	}else{
		if (isset($_POST['logintype']) and $_POST['logintype']=="logfrm"){
			echo"<script>alert('�˺Ż����������');location.href='$comeurl';</script>";exit;
		}
		$pt_type='msg';
		$msg="��¼ʧ�ܣ��˺Ż����������";
		$url=PT_SITEURL."user/login.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}else{
	if (isset($_POST['logintype']) and $_POST['logintype']=="logfrm"){
		echo"<script>alert('�û��������ڣ�');location.href='$comeurl';</script>";
		exit();
	}
	$pt_type='msg';
	$msg="�û��������ڣ����������룡";
	$url=PT_SITEURL."user/login.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
?>