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
if (isset($_POST['save'])){
    $dirname=PT_DIR.'cache';
    removedir($dirname);
    $msg="1|��ϲ�����������ɹ�";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['block'])){
    unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/block.tpl.php');
    unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/blocklist.tpl.php');
    unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_RULE.'/block.list.php');
    $msg="1|��ϲ�����������ɹ�";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['static'])){
    $dirname=PT_DIR.'files/static';
    removedir($dirname);
    $msg="1|��ϲ�����������ɹ�";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['image'])){
    $dirname=PT_DIR.'files/cover';
    removedir($dirname);
    $dirname=PT_DIR.'files/images';
    removedir($dirname);
    $msg="1|��ϲ�����������ɹ�";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['data'])){
    $dirname=PT_DIR.'files/data';
    removedir($dirname);
    $msg="1|��ϲ�����������ɹ�";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['chapter'])){
    $dirname=PT_DIR.'files/chapter';
    removedir($dirname);
    $msg="1|��ϲ�����������ɹ�";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['search'])){
    $dirname=PT_DIR.'files/search';
    removedir($dirname);
    $msg="1|��ϲ�����������ɹ�";
    $url='cache_delall.php';
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
<form method="POST" name="list_frm" id="ListFrm" action="?">
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>����̬����</span></li>
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
            <li><b style="color: red;">һ����������������ش�����ʱʹ�ã�����������ǲ��Ƽ�ʹ��</b></li>
    		<li>һ����������ģ�建�潫��������е�ģ�建�棬��ҳ���½�ҳ��Ϣ���棬���а����ݻ��档</li>
            <li>һ������̬���潫��ɾ�����о�̬�Ļ��棬�˹��ܽ����Ľϳ�ʱ�䣬�����ã����ǽ�����ֱ������������ʽɾ��files/staticĿ¼</li>
            <li>�˹���һ�����ڸջ���Ŀ��վ�����߶�ϵͳ���ý����˽ϴ�ĸĶ���</li>
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input type="submit" name="save" value="һ�������滺��" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="block" value="һ���������黺��" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="static" value="һ������̬����" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="image" value="һ������ͼƬ����" />
            </td>
          </tr>
          <tr>
            <th></th>
            <td class="ptb20">
                <input type="submit" name="data" value="һ���������ݻ���" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="chapter" value="һ�������½ڻ���" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="search" value="һ��������������" />
            </td>
          </tr>
        </table>   
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>