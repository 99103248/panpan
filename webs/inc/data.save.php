<?php
//����ʮ�½�
$tencon = "<?php\n";
for( $t=1; $t<=10; $t++ ) {
	$tencon .= "\$ten_list[$t]['chapterid']=".$ten_list[$t]['chapterid'].";\n";
	$tencon .= "\$ten_list[$t]['chaptername']='".$ten_list[$t]['chaptername']."';\n";
	$tencon .= "\$ten_list[$t]['update']='".$ten_list[$t]['update']."';\n";
	$tencon .= "\$ten_list[$t]['chapterurl']=\$pt->getchapterurl('$cutid','$bookid','".$ten_list[$t]['chapterid']."');\n";
	$tencon .= "\$ten_list[$t]['urltitle']='".$ten_list[$t]['urltitle']."';\n";
}
$tencon .= "?>";
//���з־��½�
$readcon = "";
$showcon = "";
$v=0;
foreach($volumeid as $vrow){
	$v++;
	$readcon .= '|'.$volumeid[$v];
	$showcon .= '���'.$volumename[$v];
}
$c=0;
foreach($read as $crow){
	$c++;
	$readcon .= "\n".$read[$c];
	$showcon .= "\n".$show[$c];
}
//д�뻺��
$pt->writeto( $tenfile, $tencon );
$pt->writeto( $readfile, $readcon );
$pt->writeto( $showfile, $showcon );
?>