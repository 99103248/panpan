<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

if (isset($_POST["save"])){
    unset($_POST["save"]);
    
    $str="<?php\n";
    foreach ($_POST as $key=>$value){
        $str.="\$$key=<<<flink\n$value\nflink;\n";
    }
    $str.="?>";
    $result=$pt->writeto(PT_DIR.'data/link/'.$_SERVER['REQUEST_TIME'].'.php',$str);
    if ($result){
        $msg="1|��ϲ����������ӳɹ�";
    }else{
        $msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
    }    
    include '../inc/link.reset.php';
	$url='link_add.php';    
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
<script type="text/javascript">
function loginok(form){
	if (form.sitename.value==""){
		alert("�������Ʋ���Ϊ�գ�");
		form.sitename.focus();
		return (false);
	}
	if (form.siteurl.value==""){
		alert("���ӵ�ַ����Ϊ�գ�");
		form.siteurl.focus();
		return (false);
	}	
	return (true);
}


</script>
</head>
<body>
<div id="currentPosition">
	<p>����ǰλ�ã� ϵͳ���� &raquo; ��������</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>�����������</span></li>
        <li><a href="link_list.php">�����б�</a></li>
        <li><a href="link_num.php">��������</a></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>�������ƺ����ӵ�ַΪ������</li>
        <li>��������֧��html,���� �� &lt;font color=red>&lt;b>PT�ٷ���̳&lt;/b>&lt;/font> ��  ��Ч��Ϊ <font color=red><b>PT�ٷ���̳</b></font></li>
	</ul>
</div>
<div class="info" >
    <form method="post" onsubmit="return loginok(this)">
        <table class="infoTable">
          <tr>
            <th class="paddingT15"> �������ƣ�</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="sitename" value="" />
                <label class="field_notice">����������վ�����ƣ�<b>����</b></label>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ���ӵ�ַ��</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="siteurl" value="" />
                <label class="field_notice">����������վ�ĵ�ַ��<b>����</b></label>
            </td>
          </tr>      
          <tr>
            <th class="paddingT15">LogoͼƬ��ַ��</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="sitelogo" value="" />
                <label class="field_notice">logoͼƬ�ߴ�Ϊ88*31</label>
            </td>
          </tr>
          <tr>
            <th class="paddingT15">��վ��飺</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:60px;" name="sitetitle"></textarea>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ����</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput2" name="sitenum" value="50" />
            </td>
          </tr>        
          <tr>
            <th></th>
            <td class="ptb20">
    			<input class="formbtn" type="submit" name="save" value="�������" />
            </td>
          </tr>
        </table>
        
        
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>