<?php
include 'usercheck.php';

if (isset($_POST['dosubmit'])){
	unset($_POST['dosubmit']);
	$str='<?php'."\n";
	foreach($_POST as $key => $value){
		$str.="\$$key='$value';\n";
		$key=$value;
	}
	$str.="?>";
	$file='../data/user/'.$username.'/info.php';
	$result=$pt->writeto($file,$str);
	if ($result){
		$pt_type='msg';
		$msg="�޸ĳɹ���";
		$url=PT_SITEURL."user/info.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}else{
		$pt_type='msg';
		$msg="�޸�ʧ�ܣ�����ϵ����Ա��";
		$url=PT_SITEURL."user/edit.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

$pt_type='edit';
include PT_DIR . 'inc/useroutput.php';
?>