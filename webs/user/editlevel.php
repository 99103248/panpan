<?php
include 'usercheck.php';

if ($userlv=='vip'){
	$pt_type='msg';
	$msg="���Ѵ��˽缫�ޣ������~~~~~~��";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
$pt_user_lvname['11']=$pt_user_lvname['vip'];
$pt_user_lvpoint['11']=$pt_user_lvpoint['vip'];
$userlevel=$pt_user_lvname[$userlv];
$userlevelup=$pt_user_lvname[$userlv+1];
$usernextlevelpoint=$pt_user_lvpoint[$userlv+1];
if ($usernextlevelpoint<=$userpoint){
	$levelupmsg="<a href='editlevel.php?action=up' style='color:red'>���Ѵ����������������������</a>";
}else{
	$levelupmsg="���Ļ���û�дﵽ��׼�������Ŭ����";
}
$nowinfo="��ܸ�����$pt_user_markc[$userlv]<br />
������ܲ�������$pt_user_marknum[$userlv]<br />
�������ޣ�$pt_user_friendnum[$userlv]<br />
����Ϣ���ޣ�$pt_user_pmnum[$userlv]";
$userlvup=$userlv+1;
if ($userlvup==11) {
	$userlvup='vip';
}
$upinfo="��ܸ�����$pt_user_markc[$userlvup]<br />
������ܲ�������$pt_user_marknum[$userlvup]<br />
�������ޣ�$pt_user_friendnum[$userlvup]<br />
����Ϣ���ޣ�$pt_user_pmnum[$userlvup]";
$usermarknum=$pt_user_marknum[$userlv];
$usermarkc=$pt_user_markc[$userlv];

if (isset($_GET['action'])){	
	if ($usernextlevelpoint<=$userpoint){
		if ($userlv==10){
			$userlv='vip';
		}else{
			$userlv++;
		}
		$str='<?php'."\n";
		$str.="\$userpoint='".$userpoint."';\n";
		$str.="\$userlv='".$userlv."';\n";
		$str.="\$comepoint='".$comepoint."';\n";
		$str.="\$comenum='".$comenum."';\n";
		$str.="?>";
		$file='../data/user/'.$username.'/point.php';
		$result=$pt->writeto($file,$str);
		if ($result){
			setcookie("pt_userlv",$pt_user_lvname[$userlv],time()+86400,"/");
			$pt_type='msg';
			$msg="��ϲ���������ɹ���";
			$url=PT_SITEURL."user/editlevel.php";
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}else{
			$pt_type='msg';
			$msg="����ʧ�ܣ�����ϵ����Ա��";
			$url=PT_SITEURL."user/index.php";
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}
	}else{
		$pt_type='msg';
		$msg="����ʧ�ܣ����Ļ���δ�ﵽ������׼��";
		$url=PT_SITEURL."user/editlevel.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

$pt_type='editlevel';
include PT_DIR . 'inc/useroutput.php';
?>