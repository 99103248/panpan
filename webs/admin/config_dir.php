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
	$url='config_dir.php';
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
	<p>����ǰλ�ã� ϵͳ���� &raquo; Ŀ¼����</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>Ŀ¼��������</span></li>		
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> ����Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_dir" type="text" value="<?php echo $pt_set['PT_DIR']?>" class="infoTableInput" />
                <span class="gray">�������ھ���·����<a href="../plus/check/dircheck.php" target="_blank">����˴���Ŀ¼����У��</a></span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> ���Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_addir" type="text" value="<?php echo $pt_set['PT_ADDIR']?>" class="infoTableInput" />
                <span class="gray">�����Ŀ¼���������Ҫ�޸ġ�</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> ģ��Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_tpldir" type="text" value="<?php echo $pt_set['PT_TPLDIR']?>" class="infoTableInput" />
                <span class="gray">ģ����Ŀ¼���������޸ġ�</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_complete"> ����Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rulesdir" type="text" value="<?php echo $pt_set['PT_RULESDIR']?>" class="infoTableInput" />
                <span class="gray">Ŀ��վ������Ŀ¼���������޸ġ�</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_complete"> ����Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_cachedir" type="text" value="<?php echo $pt_set['PT_CACHEDIR']?>" class="infoTableInput" readonly="readonly"/>
                <span class="gray">�����ļ����Ŀ¼��ϵͳ���б���Ŀ¼����ֹ�޸ģ�</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> ����Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_datadir" type="text" value="<?php echo $pt_set['PT_DATADIR']?>"  class="infoTableInput" readonly="readonly"/>
                <span class="gray">���������ļ����Ŀ¼��ϵͳ���б���Ŀ¼����ֹ�޸ģ�</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> ����Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_incdir" type="text" value="<?php echo $pt_set['PT_INCDIR']?>"  class="infoTableInput" readonly="readonly"/>
                <span class="gray">���������ļ����Ŀ¼��ϵͳ���б���Ŀ¼����ֹ�޸ģ�</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> �ļ�Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filesdir" type="text" value="<?php echo $pt_set['PT_FILESDIR']?>"  class="infoTableInput"  readonly="readonly"/>
                <span class="gray">�����ļ����Ŀ¼��ϵͳ���б���Ŀ¼����ֹ�޸ģ�</span>
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