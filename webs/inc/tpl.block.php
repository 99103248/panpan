<?php
/**
 * ���黺�������ļ�
 */
$tpl_file_set = PT_DIR . PT_TPLDIR . PT_TPL . '/templets.set.php';
if (!file_exists($tpl_file_set)) {
	exit($tpl_file_set.'ģ�������ļ�templets.set.php������!(' . PT_TPLDIR . PT_TPL . '/templets.set.php' . ')');
}
echo '��⵽��ҳ���黺�治���ڣ�����ϵͳ��Ϊ�����»�ȡ��ҳ���黺��<br />';
include $tpl_file_set;
include PT_DIR.PT_TPLDIR.PT_TPL.'/block.php';
/**
 * ����������ҳ���黺���ļ�
 */
//��������
$setfile= PT_DIR.'data/replace/block.php';
if (file_exists($setfile)){
	$repstr=file($setfile);
}
$repnum=count($repstr);
for ($i=0;$i<$repnum;$i++){
	$estr=explode('|||',$repstr[$i]);
	if(isset($estr['0'])){$stra=$estr['0'];}else{$stra="";}
	if(isset($estr['1'])){$strb=$estr['1'];}else{$strb="";}
	if(isset($estr['2'])){$strc=$estr['2'];}else{$strc="";}
	$repstrbook[$stra][$strb]=$strc;
}
echo '���������������ݳɹ�.....<br />';
//��������
$blockcount = count($pt_templets_block);
echo '��ʼ������ҳ���黺������,����⵽�账��<font color="red"><b>'.$blockcount.'������</b></font><br />';
include PT_DIR.PT_RULESDIR.PT_RULE.'/rules.set.php';
$blockstr = "<?php\n";
for ($tpli = 1; $tpli <= $blockcount; $tpli++) {
	$blockarr = explode('|', $pt_templets_block[$tpli]['id']);
	$blockarrcount = count($blockarr);
	echo '<div style="padding-left:40px;">'.$tpli.'����ʼ����<font color="red"><b>'.$pt_templets_block[$tpli]['name'].'</b></font>��������,����⵽�账��<font color="red"><b>'.$blockarrcount.'</b></font>������<br /><div style="padding-left:40px;">';
	for ($tplj = 1; $tplj <= $blockarrcount; $tplj++) {
		$bookid = $blockarr[$tplj - 1];
		echo $tplj.'����ȡĿ�����'.$bookid.'��Ϣ............';
		$read=$show=$volumeid=$volumename=null;
		include PT_DIR . 'inc/data.php';
		if ($infoupdate){
			$chaptername=$lastchaptername;
			$chapterid=$lastchapterid;
		}
		if (isset($repstrbook[$bookid]['bookinfo'])){
			$bookinfo=$repstrbook[$bookid]['bookinfo'];
		}else{
			$bookinfo=str_replace(' ','',$bookinfo);
			$bookinfo=str_replace('����','',$bookinfo);
			$bookinfo=str_ireplace('&nbsp;','',$bookinfo);
			$bookinfo=str_ireplace('<br>','',$bookinfo);
			$bookinfo=str_ireplace('<br/>','',$bookinfo);
		}
		if (isset($repstrbook[$bookid]['bookimg'])){
			$bookimg=$repstrbook[$bookid]['bookimg'];
		}
		//����ͼƬд�뻺��
		if($bookimg=='' or strpos($bookimg,'noimg') or strpos($bookimg,'nocover')){
			$bookimg=PT_SITEURL.'images/noimg.gif';
		}else if(PT_IMGURL == 'true'){
			$dirid=floor($bookid/1000);
			$file=PT_DIR . 'files/cover/'.$dirid.'/'.$bookid.'/'.basename($bookimg);
			$ext=strtolower(extend_3(basename($bookimg)));
			if (!file_exists($file)){
				$str=$pt->getcode($bookimg,'0');
				if (strlen($str)>1000 and ($ext=='jpg' or $ext=='gif' or $ext=='jpeg' or $ext=='bmp') and strlen($str)<100000 ){
					$pt->writeto($file,$str);
				}			
			}
			$bookimg=PT_SITEURL.'files/cover/'.$dirid.'/'.$bookid.'/'.basename($bookimg);
		}
		$pt_tpl_block[$tplj]['cutid']=$cutid;
		$pt_tpl_block[$tplj]['bookid']=$bookid;
		$pt_tpl_block[$tplj]['bookname']=$bookname;
		$pt_tpl_block[$tplj]['bookinfo']=$bookinfo;
		$pt_tpl_block[$tplj]['author']=$author;
		$pt_tpl_block[$tplj]['authorurl']=$pt->getsearchurl($author, 'author');
		$pt_tpl_block[$tplj]['sortcname']=$sortcname;
		$pt_tpl_block[$tplj]['sortcid']=$sortcid;
		$pt_tpl_block[$tplj]['sortcurl']=$pt->getsorturl($sortcid);
		$pt_tpl_block[$tplj]['sortnname']=$sortnname;
		$pt_tpl_block[$tplj]['sortnid']=$sortnid;
		$pt_tpl_block[$tplj]['sortnurl']=$pt->getsorturl($sortnid);
		$pt_tpl_block[$tplj]['update']=date("Y-m-d",$lastupdate);
		$pt_tpl_block[$tplj]['chaptername']=$chaptername;
		$pt_tpl_block[$tplj]['chapterid']=$chapterid;
		$pt_tpl_block[$tplj]['chapterurl']=$pt->getchapterurl($cutid,$bookid,$chapterid);
		$pt_tpl_block[$tplj]['allclick']=$allclick;
		$pt_tpl_block[$tplj]['allvote']=$allvote;
		$pt_tpl_block[$tplj]['goodnum']=$goodnum;
		$pt_tpl_block[$tplj]['bookimg']=$bookimg;
		$pt_tpl_block[$tplj]['fontsize']=ceil($lastsize/2);
		$pt_tpl_block[$tplj]['isover']=$isover;
		$pt_tpl_block[$tplj]['bookurl']=$pt->getbookurl($bookid);
		$pt_tpl_block[$tplj]['readurl']=$pt->getreadurl($cutid,$bookid);
		$pt_tpl_block[$tplj]['downurl']=$pt->getdownurl($bookid);
		$pt_tpl_block[$tplj]['voteurl']=$pt->getvoteurl($bookid);
		$pt_tpl_block[$tplj]['markurl']=$pt->getmarkurl();
		echo $bookname,'��Ϣ��ȡ���,��������ͼƬ�洢��'.$bookimg.'<br />';
	}
	echo '</div>����<b>'.$pt_templets_block[$tpli]['name'].'</b>����ģ��<b>'.$pt_templets_block[$tpli]['templets'].'.html</b>������С˵��Ϣ�ɹ���<br /><hr></div>';
	$file = $pt_tpl->parser('block/' . $pt_templets_block[$tpli]['templets']);
	ob_start();
	include $file;
	$block_con = ob_get_contents();
	ob_end_clean();
	$blockstr .= '$pt_templets_block[' . "'$tpli'" . ']=<<<pttpl' . "\n" . $block_con . "\n" . "pttpl;\n";
}
$blockstr .= "?>";
echo 'ȫ����ҳ���黺���ȡ��ϣ�����д�뻺���ļ�......<br />';
$pt->writeto($tpl_file_block, $blockstr);
echo '<font color="red"><b>д���ļ��ɹ���������ϣ�������ˢ�µ�ǰҳ�棡</b></font>';
exit;
?>