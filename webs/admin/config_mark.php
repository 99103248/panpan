<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/mark.php';
include $setfile;

if (isset($_POST['save'])){
    unset($_POST['save']);
    $str='<?php'."\n";
	foreach($_POST as $key => $value){
		$str.="\$$key='$value';\n";
	}
    $str.='?>';
    $result=$pt->writeto($setfile,$str);    
    if ($result){
        $msg="1|��ϲ�����޸Ĳ����ɹ�";
    }else{
        $msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
    }
	$url='config_mark.php';
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
	<p>����ǰλ�ã� ϵͳ���� &raquo; ���ܹ���</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>ͼƬˮӡ����</span></li>
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>ˮӡλ��:��10��״̬��1-9����Ϊ���λ�ã�</li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1Ϊ���˾���2Ϊ���˾��У�3Ϊ���˾��ң�</li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4Ϊ�в�����5Ϊ�в����У�6Ϊ�в����ң�</li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7Ϊ�׶˾���8Ϊ�׶˾��У�9Ϊ�׶˾��ң�</li>
        <li>������ܽ����Ǽ򵥵ļӸ�ˮӡ��������ʲô�����ã�Ҳ����������������ˮӡЧ����</li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">          
          <tr> 
			<th class="paddingT15">ˮӡģʽ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_mark_type" value="pic" <?php if ($pt_mark_type=='pic'){echo 'checked="checked"';}?> />ͼƬģʽ</label>
                <label><input type="radio" name="pt_mark_type" value="text" <?php if ($pt_mark_type=='text'){echo 'checked="checked"';}?> />����ģʽ</label>                
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ˮӡλ�ã�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_where" type="text" value="<?php echo $pt_mark_where?>" class="infoTableInput" />
                <span class="gray">���ͬʱ�ڶ��λ��������á�|������</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ˮӡͼƬ��ַ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_picurl" type="text" value="<?php echo $pt_mark_picurl?>" class="infoTableInput" />
                <span class="gray">ˮӡͼƬ�ĵ�ַ������ڸ�Ŀ¼�������ʼ�ġ�/����</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ˮӡ�������ݣ�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_textstr" type="text" value="<?php echo $pt_mark_textstr?>" class="infoTableInput" />
                             
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ˮӡ���ִ�С��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_textsize" type="text" value="<?php echo $pt_mark_textsize?>" class="infoTableInput" />
                <span class="gray">��λpx</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ˮӡ������ɫ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_textcolor" type="text" value="<?php echo $pt_mark_textcolor?>" class="infoTableInput" />
                <span class="gray">��#ff0000��ɫ��</span>
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