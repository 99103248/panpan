<?php
include 'usercheck.php';

$pmstr=file('../data/user/' . $username . '/pm.php');
$pmnum=0;

if (isset($_POST['reply'])){
	$pmid=$_POST['pmid'];
	$pmcon=explode('~|~',$pmstr[$pmid]);
	$title='Re:'.$pmcon['2'];
	$usernamesend=$pmcon['4'];		
	$date=$pmcon['5'];
	$content='[quote]'."\n".$usernamesend.'����'.$date."����:".$pmcon['2']."\n����:".str_replace('<br />',"\r\n",$pmcon['3'])."\n".'[/quote]'."\n";
	$pt_type='pmsend';
	include PT_DIR . 'inc/useroutput.php';
	exit();
}

if (isset($_POST['send'])){
	$usernamesend=$_POST['username'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	if (strpos($content,'[/quote]')){
		$constr=explode('[/quote]',$content);
		$constr['0']=str_replace('[quote]','',$constr['0']);
		$content=$constr['1']."\r\n\r\n----------------------------".$constr['0'];
	}
	$content=str_replace("\r\n","<br />",$content);
	$date=date("Y-m-d H:i:s");
	$pmsendstr='1~|~1~|~'.$title.'~|~'.$content.'~|~'.$username.'~|~'.$date;	
	$pmsendfile='../data/user/' . $usernamesend . '/pm.php';
	$pmsendstr=$pmsendstr."\r\n".file_get_contents($pmsendfile);
	$result=$pt->writeto($pmsendfile,$pmsendstr);
	$pmsavestr='0~|~1~|~'.$title.'~|~'.$content.'~|~'.$usernamesend.'~|~'.$date;
	$pmsavefile='../data/user/' . $username . '/pm.php';
	$pmsavestr=$pmsavestr."\r\n".file_get_contents($pmsavefile);
	$result=$pt->writeto($pmsavefile,$pmsavestr);
	if ($result){
		$pt_type='msg';
		$msg="����Ϣ���ͳɹ���";
		$url=PT_SITEURL."user/pmsend.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}else{
		$pt_type='msg';
		$msg="����Ϣ����ʧ�ܣ�";
		$url=PT_SITEURL."user/pmsend.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

for ($i=0;$i<count($pmstr);$i++){
	$pmcon=explode('~|~',$pmstr[$i]);
	if ($pmcon['0']==0){
		$pmnum++;
		$pmlist[$pmnum]['pmid']=$i;			
		$pmlist[$pmnum]['username']=$pmcon['4'];		
		$pmlist[$pmnum]['date']=$pmcon['5'];
		$pmlist[$pmnum]['pmurl']='pm.php?viewid='.$i;
		$pmlist[$pmnum]['title']=$pmcon['2'];
	}	
}

$pt_type='pmnew';
include PT_DIR . 'inc/useroutput.php';
?>