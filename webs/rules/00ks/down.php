<?php
$msgstr='������Ҫ��½���۳����֣�����ֻ���ṩ���ɺ�ĵ�ַ����û���������޷�����';
$downlistnum='1';
$downlist['1']['name']=$bookname.$type.'����';
$downlist['1']['size']=ceil($lastsize/1000).'K';
$downlist['1']['date']=pt_datetime();
$downid=$bookid-PT_PLUSBID;
$dcid=floor($downid/1000);
switch ($type){
case 'txt':
  $downlist['1']['url']="http://www.00ks.com/Down/Txt/$dcid/$downid/$downid.rar";
  break;
case 'umd':
  $downlist['1']['url']="http://www.00ks.com/Down/Chm/$dcid/$downid/$downid.chm";
  break;
case 'jar':
  $downlist['1']['url']="http://www.00ks.com/Down/Txt/$dcid/$downid/$downid.rar";
  break;
case 'jad':
  $downlist['1']['url']="http://www.00ks.com/Down/Txt/$dcid/$downid/$downid.rar";
  break;
case 'chm':
  $downlist['1']['url']="http://www.00ks.com/Down/Chm/$dcid/$downid/$downid.chm";
  break;
default:
  $downlist['1']['url']="http://www.00ks.com/Down/Txt/$dcid/$downid/$downid.rar";
  break;
}
?>