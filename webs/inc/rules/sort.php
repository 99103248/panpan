<?php
//Ŀ¼��ҳ
$pagestart = $page-3;
if ($pagestart<=1){
	$pagestart=0;
}
$pageend=$pagestart+5;
if ($pageend>$pagec){
	$pageend=$pagec-$pagestart;
}else{
	$pageend=5;
}

//ҳ�����ӵ�ַ
$starturl=$pt->getsorturl($sortid,1);
$endurl=$pt->getsorturl($sortid,$pagec);
$sorturl=$pt->getsorturl($sortid);
if($page==1){
	$backurl=$pt->getsorturl($sortid,$page);
}else{
	$backurl=$pt->getsorturl($sortid,$page-1);
}
if ($page==$pagec){
	$nexturl=$pt->getsorturl($sortid,$page);
}else{
	$nexturl=$pt->getsorturl($sortid,$page+1);
}

//����ȫ�ֻ����ļ�
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';

//����ҳ����Ϣ�ļ�
include PT_DIR . 'data/page/' . $pt_type . '.php';
?>