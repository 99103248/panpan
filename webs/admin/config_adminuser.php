<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/adminuser.php';
include $setfile;
if (isset($_POST["save"])){
    unset($_POST['save']);
    if ($adminpwd==md5($_POST['old_pwd']) and $_POST['new_pwd']==$_POST['new_pwda']){
        $str='<?php'."\n";    
        $str.="\$adminname='".$_POST['adminname']."';\n";
        $str.="\$adminpwd='".md5($_POST['new_pwd'])."';\n";
        $str.="\$logtime='$logtime';\n";
        $str.="\$logip='$logip';\n";    
        $str.='?>';
        $result=$pt->writeto($setfile,$str);
        
        if ($result){
            $msg="1|��ϲ���������޸ĳɹ�";
        }else{
            $msg="0|�޸�ʧ�ܣ��ļ������ڻ򲻿���";
        }
    	$url='logout.php';
    	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
        exit();
     }else{
        $msg="0|�޸�ʧ�ܣ����������������벻һ�£�";
        $url='config_adminuser.php';
    	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
        exit(); 
     }
    
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
	<p>����ǰλ�ã� ϵͳ���� &raquo;</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>����Ա�˺�����</span></li>
	</ul>
</div>
<div class="info" >
    <form method="post" name="form1">  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> �˺����ƣ�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="adminname" type="text" value="<?php echo $adminname?>" class="infoTableInput" />
                <span class="gray">�˺����ƿ���ֱ���޸ġ�</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> �����룺</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="old_pwd" value="" class="infoTableInput" type="password"/>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> �����룺</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="new_pwd" type="text" value="" class="infoTableInput" />
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> �ظ������룺</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="new_pwda" type="text" value="" class="infoTableInput" />
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