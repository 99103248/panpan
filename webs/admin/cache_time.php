<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/cachetime.php';
include $setfile;
if (isset($_POST['save'])){
    unset($_POST['save']);
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){
            foreach($_POST[$key] as $akey => $bvalue){
                $str.="\$".$key."['".$akey."']='".$bvalue."';\n";
            }
        }else{
            $str.="\$$key='$value';\n";
        }
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);    
    if ($result){
        $msg="1|��ϲ�����޸Ĳ����ɹ�";
    }else{
        $msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
    }
	$url='cache_time.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>����̨ - PTС͵</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<style type="text/css">
td.hover, tr.hover
{
	background-color: #F2F9FD;
}
th.hover, thead td.hover, tfoot td.hover
{
	background-color: ivory;
}
</style>
</head>
<body>
<div id="currentPosition">
	<p>����ǰλ�ã� ϵͳ���� &raquo; �������</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>��̬����������</span></li>
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>��̬����Ϊ�������һ��ҳ���������ɵĻ���ҳ�棬���ԼӴ������ٴη������ҳ����ٶȣ�</li>
        <li>��̬�����ܿ�������<a href="config_function.php">���ܿ���</a>����,���ʱ����Ϊ0��Ϊ���������̬���棻</li>
		<li>������ʱ�䵥λΪСʱ��0.5��Ϊ��Сʱ 30���ӣ�</li>
        <li>�����ķ����������󣬾�̬������ô������ӿ�����ٶȣ�</li>
        <li>�������������̬���棬��׼���ÿռ䣬��Ϊ�½�ҳ�Ļ����Ǻ�ռ�ÿռ�ġ�</li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">          
          <tr>
            <th class="paddingT15"><label for="time_zone"> ��ҳ��������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[index]" type="text" value="<?php echo $cachetime['index']?>" class="infoTableInput" />
                <span class="gray">��վ������,����Ƶ�������ڽ϶࣬����һ��Сʱ֮�ڡ�</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �б�ҳ��������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[sort]" type="text" value="<?php echo $cachetime['sort']?>" class="infoTableInput" />
                <span class="gray">�ǳ���ҳ�棬�������ü���Գ���</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ȫ��ҳ��������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[over]" type="text" value="<?php echo $cachetime['over']?>" class="infoTableInput" />
                <span class="gray">�ǳ���ҳ�棬�������ü���Գ���</span>                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ����ҳ��������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[top]" type="text" value="<?php echo $cachetime['top']?>" class="infoTableInput" />
                <span class="gray">�����õ�ҳ�棬�������ü��������</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ȫ������ҳ��������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[topover]" type="text" value="<?php echo $cachetime['topover']?>" class="infoTableInput" />
                <span class="gray">�����õ�ҳ�棬�������ü��������</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ���������������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[search]" type="text" value="<?php echo $cachetime['search']?>" class="infoTableInput" />
                <span class="gray">��������Ƶ������</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �鼮���ݻ�������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[data]" type="text" value="<?php echo $cachetime['data']?>" class="infoTableInput" />
                <span class="gray">����С˵�������أ���������һ��Сʱ֮�ڡ�</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> Ŀ¼ҳ��������</label></th>
            <td class="paddingT15 wordSpacing5">
               <input name="cachetime[read]" type="text" value="<?php echo $cachetime['read']?>" class="infoTableInput" />
                <span class="gray">����С˵�������أ���������һ��Сʱ֮�ڡ�</span>
            </td>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �½�ҳ��������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[chapter]" type="text" value="<?php echo $cachetime['chapter']?>" class="infoTableInput" />
                <span class="gray">ֻ����ͼƬ�½ڻ�հ��½����ݣ��������úܳ���</span>
            </td>
          </tr>
        </table>
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="save" value="�ύ" />
                <input class="formbtn" type="reset" name="reset" value="����" />
            </td>
          </tr>
        </table>
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>