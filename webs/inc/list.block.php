<?php
/**
 * ����rules.set.php����ȡ�б�ľ���ͼ��
 */
ini_set("max_execution_time", "1800");
echo '��⵽���а����ݻ��治���ڣ�����ϵͳ��Ϊ�����»�ȡ���а����ݻ���<br />';
$rule_file_set=PT_DIR . PT_RULESDIR . PT_RULE . '/rules.set.php';
if (!file_exists($rule_file_set)) {
    exit('���������ļ�rules.set.php������!(' . PT_RULESDIR . PT_RULE . '/rules.set.php' . ')');
}
include $rule_file_set;
$cachefile=PT_DIR . 'cache/' . PT_RULESDIR . PT_RULE . '/block.list.php';
$blstr="<?php\n";
echo '����'.count($pt_top_list).'�����а�������Ҫ����<br />';
$i=0;
foreach($pt_top_list as $type=>$value){
    $i++;
    $code=pt::getcode($value);
    $listcon=pt::steal($code,$pt_top_list_start,$pt_top_list_end,false,false);
    $listarr=explode($pt_top_list_split,$listcon);
    for ($l=1;$l<=30;$l++){
        $bookid=pt::steal($listarr[$l],$pt_top_list_bookid_start,$pt_top_list_bookid_end,false,false);
        $bookname=pt::steal($listarr[$l],$pt_top_list_bookname_start,$pt_top_list_bookname_end,false,false);
        if (strpos($bookid,'/')){
			$aaaaa=explode('/',$bookid);
			$bookid=$aaaaa['1'];
		}
		$bookurl=pt::getbookurl($bookid+PT_PLUSBID);
        $blstr .= '$topblock'."['$l']['$type']['bookurl']='$bookurl';\n";
        $blstr .= '$topblock'."['$l']['$type']['bookname']='$bookname';\n";
    }
    $blstr .= "\n\n";
    echo '��'.$i.'�����ݻ���ɹ���д�����ݣ�Ŀ���ַҳ�棺',$value,'<br />';
	ob_flush( );
	flush( );
}
$blstr.="?>";
echo 'ȫ�����а����ݻ����ȡ��ϣ�����д�뻺���ļ�......<br />';
pt::writeto($cachefile,$blstr);
echo '<font color="red"><b>д���ļ��ɹ���������ϣ�������ˢ�µ�ǰҳ�棡</b></font>';
exit;
?>