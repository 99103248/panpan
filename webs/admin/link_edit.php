<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include_once '../data/config.php';
include PT_DIR.'inc/array.sort.php';
$dir_name=PT_DIR."data/link";
$od = opendir($dir_name);
while ($name = readdir($od)){
    $file_path = $dir_name.'/'.$name;
    if (is_file($file_path)){
        $files[] = $file_path;
    }
}
if (isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    $msg="0|�༭ʧ�ܣ��޷���ȡ����id";
    $url='link_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
}
//�������ݿ�
//��ȡ����������
include $files[$id];
if (isset($_POST["save"])){
    unset($_POST["save"]);
    $str="<?php\n";
    foreach ($_POST as $key=>$value){
        $str.="\$$key=<<<flink\n$value\nflink;\n";
    }
    $str.="?>";
    $result=$pt->writeto($files[$id],$str);
    include '../inc/link.reset.php';
    $msg="1|��ϲ�����޸����ӳɹ�";
	$url='link_list.php';
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
	<p>����ǰλ�ã� ϵͳ���� &raquo; ��������</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>�༭��������</span></li>
        <li><a href="link_add.php">�������</a></li>
        <li><a href="link_list.php">�����б�</a></li>
        <li><a href="link_num.php">��������</a></li>
    </ul>
</div>

<div class="tipsblock">
	<ul id="tipslis">
        <li>��������֧��html,���硰 &lt;font color=red>&lt;b>PT�ٷ���̳&lt;/b>&lt;/font> �� ��Ч��Ϊ <font color=red><b>PT�ٷ���̳</b></font></li>
	</ul>
</div>

<div class="info" >
    <form method="post" >
        <table class="infoTable">
          <tr>
            <th class="paddingT15"> �������ƣ�</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="sitename" value="<?php echo $sitename?>" />
                <label class="field_notice">����������վ�����ƣ�<b>����</b></label>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ���ӵ�ַ��</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="siteurl" value="<?php echo $siteurl?>" />
                <label class="field_notice">����������վ�ĵ�ַ��<b>����</b></label>
            </td>
          </tr>      
          <tr>
            <th class="paddingT15">LogoͼƬ��ַ��</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="sitelogo" value="<?php echo $sitelogo?>" />
                <label class="field_notice">logoͼƬ�ߴ�Ϊ88*31</label>
            </td>
          </tr>
          <tr>
            <th class="paddingT15">��վ��飺</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:60px;" name="sitetitle"><?php echo $sitetitle?></textarea>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ����</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput2" name="sitenum" value="<?php echo $sitenum?>" />
            </td>
          </tr>        
          <tr>
            <th></th>
            <td class="ptb20">
    			<input class="formbtn" type="submit" name="save" value="��������" />
            </td>
          </tr>
        </table>
        
        
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>