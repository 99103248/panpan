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
        $str.="\$$key=<<<ptann\n$value\nptann;\n";
    }
    $str.="?>";
    $result=$pt->writeto('../data/ann/'.$_SERVER['REQUEST_TIME'].'.php',$str);
    if ($result){
        $msg="1|��ϲ����������ӳɹ�";
    }else{
        $msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
    }    
    include '../inc/ann.reset.php';
	$url='ann_add.php';    
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
	if (form.annname.value==""){
		alert("�������Ʋ���Ϊ�գ�");
		form.annname.focus();
		return (false);
	}
	if (form.anncontent.value==""){
		alert("�������ݲ���Ϊ�գ�");
		form.anncontent.focus();
		return (false);
	}	
	return (true);
}


</script>
</head>
<body>
<div id="currentPosition">
	<p>����ǰλ�ã� ϵͳ���� &raquo; �������</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>��ӹ���</span></li>
        <li><a href="ann_list.php">�����б�</a></li>        
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>�������ƺ����ӵ�ַΪ������</li>
	</ul>
</div>
<div class="info" >
    <form method="post">
        <table class="infoTable">
          <tr>
            <th class="paddingT15"> �������ƣ�</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="annname" value="" />
                <label class="field_notice">����վ����ʾ�Ĺ�������ƣ�<b>����</b></label>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> �������ݣ�</th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="anncontent" style="width: 400px;height:200px;"></textarea>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ����ˣ�</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="annwriter" value="<?php echo $_SESSION['adminname']?>" />
                <span class="gray"><b>ǿ�ҽ������޸Ĵ��ͬʱ��̨��¼����Ҫ�����ǳ���ͬ��</b></span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ���ʱ�䣺</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="anndate" value="<?php echo date('Y-m-d H:i:s');?>" />
            </td>
          </tr>         
          <tr>
            <th></th>
            <td class="ptb20">
    			<input class="formbtn" type="submit" name="save" value="��ӹ���" />
            </td>
          </tr>
        </table>
        
        
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>