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
$starturl=$pt->getoverurl(1);
$endurl=$pt->getoverurl($pagec);
$overurl=$pt->getoverurl();
if($page==1){
	$backurl=$pt->getoverurl($page);
}else{
	$backurl=$pt->getoverurl($page-1);
}
if ($page==$pagec){
    $nexturl=$pt->getoverurl($page);
}else{
	$nexturl=$pt->getoverurl($page+1);
}

//����ȫ�ֻ����ļ�
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';

//����ҳ����Ϣ�ļ�
include PT_DIR . 'data/page/' . $pt_type . '.php';
?>