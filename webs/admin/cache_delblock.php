<?php
include 'conn.php';
ini_set("max_execution_time", "600");
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
if (isset($_GET['delfile'])){
    $filename=PT_DIR.$_GET['delfile'];    
    if (unlink($filename) or !file_exists($filename)){
        $msg="1|��ϲ�����������ɹ�";
    }else{
        $msg="0|���ź����������ʧ��";
    }
	$url='cache_delblock.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_GET['action'])){
    unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/block.tpl.php');
	unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/blocklist.tpl.php');
	unlink(PT_DIR.'cache/'.PT_RULESDIR.PT_RULE.'/block.list.php');
    $msg="1|��ϲ�����������ɹ�";
	$url='cache_delblock.php';
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
	<p>����ǰλ�ã� ������� &raquo; </p>
</div>
<form method="post" name="list_frm" id="ListFrm">
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>�������黺��</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>�����������������й����в���������Ļ���</li>           
            <li>�������������޸�֮������Ҫ����һ����Ӧ�Ļ�����ܿ���Ч����</li>
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>        		  
        		  <th style="width: 220px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</th>
        		  <th style="width: 250px;">�����ַ</th>
                  <th>����</th>
        		</tr>
        	</thead>
		  <tr>
            <th class="paddingT15">ȫ�ַ��໺��</th>
            <td class="paddingT15 wordSpacing5">cache/<?php echo PT_TPLDIR.PT_TPL?>/nav.tpl.php</td>
            <td class="paddingT15 wordSpacing5"><a href="?delfile=cache/<?php echo PT_TPLDIR.PT_TPL?>/nav.tpl.php">�������</a></td>            
          </tr>
          <tr>
            <th class="paddingT15">��ҳ�������ݻ���</th>
            <td class="paddingT15 wordSpacing5">cache/<?php echo PT_TPLDIR.PT_TPL?>/block.tpl.php</td>
            <td class="paddingT15 wordSpacing5"><a href="?delfile=cache/<?php echo PT_TPLDIR.PT_TPL?>/block.tpl.php">�������</a></td>            
          </tr>
		  <tr>
            <th class="paddingT15">ȫ���������ݻ���</th>
            <td class="paddingT15 wordSpacing5">cache/<?php echo PT_TPLDIR.PT_TPL?>/blocklist.tpl.php</td>
            <td class="paddingT15 wordSpacing5"><a href="?delfile=cache/<?php echo PT_TPLDIR.PT_TPL?>/blocklist.tpl.php">�������</a></td>            
          </tr>
		  <tr>
            <th class="paddingT15">ȫ���������а����ݻ���</th>
            <td class="paddingT15 wordSpacing5">cache/<?php echo PT_RULESDIR.PT_RULE?>/block.list.php</td>
            <td class="paddingT15 wordSpacing5"><a href="?delfile=cache/<?php echo PT_RULESDIR.PT_RULE?>/block.list.php">�������</a></td>            
          </tr>
          <tr>
            <th class="paddingT15">�������黺��</th>
            <td class="paddingT15 wordSpacing5"> </td>
            <td class="paddingT15 wordSpacing5"><a href="?action=delall">�������</a></td>            
          </tr>
        </table>
    </div>
    <div class="info" ></div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>