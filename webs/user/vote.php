<?php
include 'usercheck.php';
//����Ƽ����
if (!empty($_GET['bookid']) and $_GET['bookid']>0){
	$bookid=$_GET['bookid'];
}else{
	$pt_type='msg';
	$msg="���������������Ƽ���";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
//����Ƽ�Ʊ��
include '../data/user/'.$username.'/vote.php';
$uservotenum=$pt_user_votenum[$userlv];
$votedatenow=date("Y-m-d");
if ($votedate==$votedatenow){
	if ($uservotenum<=$votenum){
		$pt_type='msg';
		$msg="�����յ��Ƽ�Ʊ������ ".$uservotenum." �ţ��޷�����ͶƱ��<br />����ǰ�û��ȼ�Ϊ ".$userlv." ����ÿ���Ƽ�Ʊ��Ϊ ".$uservotenum." �š�";
		$url=PT_SITEURL."user/index.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}else{
	$votenum=0;
}
//�����Ƽ�ҳ��
if(empty($_GET['action']) or $_GET['action']!='vote'){
	$pt_type='vote';
	include PT_DIR . 'inc/data.php';
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
//�Ƽ�����
$bookvotenum=intval($_GET['bookvotenum']);
if(empty($bookvotenum) or $bookvotenum<0){
	$pt_type='msg';
	$msg="�Ƽ�Ʊ��������������д��";
	$url=PT_SITEURL."user/vote.php?bookid=".$bookid;
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
//����Ƽ�Ʊ��
if ($bookvotenum > $uservotenum - $votenum){
	$pt_type='msg';
	$msg="�Ƽ�Ʊ�����㣬��������д��";
	$url=PT_SITEURL."user/vote.php?bookid=".$bookid;
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
//�Ƽ�����
include PT_DIR . PT_RULESDIR . PT_RULE . '/vote.php';
if (empty($vote)){
	$pt_type='msg';
	$msg="���������������Ƽ���";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
$str='<?php'."\n";
$str.="\$votenum='".($votenum+$bookvotenum)."';\n";
$str.="\$votedate='".$votedatenow."';\n";
$str.="?>";
$file='../data/user/'.$username.'/vote.php';
$result=$pt->writeto($file,$str);
//�Ƽ��ɹ�
$pt_type='msg';
$msg="�Ƽ��ɹ�����������ʹ�� ".($votenum+$bookvotenum)." ���Ƽ�Ʊ����л�������ߵ�֧�֣�<br />����ǰ�û��ȼ�Ϊ ".$userlv." ����ÿ��ӵ���Ƽ�Ʊ��Ϊ ".$uservotenum." �š�";
$url=$pt->getbookurl($bookid);
include PT_DIR . 'inc/useroutput.php';
?>