<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/config.inc.php';
include $setfile;
if (isset($_POST["save"])){
    unset($_POST['save']);
    foreach($_POST as $key => $value){
        $pt_set[strtoupper($key)]=$value;
    }
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="\$pt_set['$key']='$value';\n";
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    $file='../data/config.php';
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="define('$key','$value');\n";
    }
    $str.='?>';
    $result=$pt->writeto($file,$str);
    if ($result){
        $msg="1|��ϲ�����޸Ĳ����ɹ�";
    }else{
        $msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
    }
	$url='config_prox.php';
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
	<p>����ǰλ�ã� ϵͳ���� &raquo; ����������</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>��������</span></li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr> 
			<th class="paddingT15">�Ƿ�ʹ�ô���:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_prox" value="true" <?php if ($pt_set['PT_PROX']=='true'){echo 'checked="checked"';}?> />ʹ�ô���</label>
                <label><input type="radio" name="pt_prox" value="false" <?php if ($pt_set['PT_PROX']=='false'){echo 'checked="checked"';}?>/>ֱ�ӷ���</label>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> ����ip��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_proxip" type="text" value="<?php echo $pt_set['PT_PROXIP']?>"  class="infoTableInput" />
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> ����˿ڣ�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_proxport" type="text" value="<?php echo $pt_set['PT_PROXPORT']?>"  class="infoTableInput" />
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