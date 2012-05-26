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
if (isset($_POST['book'])){
    $bookid=$_POST['bookid'];
    $dirid=floor($bookid/1000);
    $dirname=PT_DIR."files/data/$dirid/$bookid";
    $pagedir=PT_DIR."files/chapter/page/$dirid/$bookid";
    if((is_dir($dirname) or is_dir($pagedir)) and !empty($bookid)){
		removedir($dirname);
		removedir($pagedir);
		$msg="1|��ϲ�����������ɹ�";
    }else{
		$msg="0|ע�⣬Ҫ����Ļ����ļ�������";
    }
    $url='cache_delbook.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['read'])){
    $bookid=$_POST['bookid'];
    $dirid=floor($bookid/1000);
    $readfile=PT_DIR."files/static/read/$dirid/$bookid.pth";
    if(is_file($readfile)){
		@unlink($readfile);
		$msg="1|��ϲ�����������ɹ�";
    }else{
		$msg="0|ע�⣬Ҫ����Ļ����ļ�������";
    }
    $url='cache_delbook.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['chapter'])){
    $bookid=$_POST['bookid'];
    $dirid=floor($bookid/1000);
    $dirname=PT_DIR."files/chapter/txt/$dirid/$bookid";
    $pagedir=PT_DIR."files/chapter/page/$dirid/$bookid";
    if((is_dir($dirname) or is_dir($pagedir)) and !empty($bookid)){
		removedir($dirname);
		removedir($pagedir);
		$msg="1|��ϲ�����������ɹ�";
    }else{
		$msg="0|ע�⣬Ҫ����Ļ����ļ�������";
    }
    $url='cache_delbook.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['singlechapter'])){
    $bookid=$_POST['bookid'];
    $dirid=floor($bookid/1000);
    $chapterid=$_POST['chapterid'];
	$txtfile=PT_DIR."files/chapter/txt/$dirid/$bookid/$chapterid.txt";
	$ptcfile=PT_DIR."files/chapter/txt/$dirid/$bookid/$chapterid.ptc";
	$pagefile=PT_DIR."files/chapter/page/$dirid/$bookid/$chapterid.ptc";
    if(is_file($txtfile) or is_file($ptcfile) or is_file($pagefile)){
		@unlink($txtfile);
		@unlink($ptcfile);
		@unlink($pagefile);
		$msg="1|��ϲ�����������ɹ�";
    }else{
		$msg="0|ע�⣬Ҫ����Ļ����ļ�������";
    }
	$url='cache_delbook.php';
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
    		<li><span>�����鼮����</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>��������������С˵���ݡ�Ŀ¼���½����ݵĻ���ȡ�</li>
            <li>���Ŀ¼̫�����ǻ��ǽ�����ʹ��ftp���������취��</li>
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>        		  
        		  <th style="width: 150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</th>
        		  <th style="width: 150px;">����˵��</th>
        		  <th style="width: 400px;">��д����</th>
                  <th>����</th>
        		</tr>
        	</thead>
          <tr><form method="POST" name="list_frm" id="ListFrm" action="?">
            <th class="paddingT15">�鼮������Ϣ����</th>
            <td class="paddingT15 wordSpacing5">������С˵����</td>
            <td class="paddingT15 wordSpacing5">���: <input name="bookid" type="text" value="" class="infoTableInput2" /></td>
            <td class="paddingT15 wordSpacing5"><input type="submit" name="book" value="�������" /></td>            
          </form></tr>  
           <tr><form method="POST" name="list_frm" id="ListFrm" action="?">
            <th class="paddingT15">С˵Ŀ¼��̬����</th>
            <td class="paddingT15 wordSpacing5">������С˵Ŀ¼</td>
            <td class="paddingT15 wordSpacing5">���: <input name="bookid" type="text" value="" class="infoTableInput2" /></td>
            <td class="paddingT15 wordSpacing5"><input type="submit" name="read" value="�������" /></td>            
          </form></tr>
          <tr><form method="POST" name="list_frm" id="ListFrm" action="?">
            <th class="paddingT15">С˵�½����ݻ���</th>
            <td class="paddingT15 wordSpacing5">�����������½�</td>
            <td class="paddingT15 wordSpacing5">���: <input name="bookid" type="text" value="" class="infoTableInput2" /></td>
            <td class="paddingT15 wordSpacing5"><input type="submit" name="chapter" value="�������" /></td>
          </form></tr>          
           <tr><form method="POST" name="list_frm" id="ListFrm" action="?">
            <th class="paddingT15">С˵�½����ݻ���</th>
            <td class="paddingT15 wordSpacing5">������ָ���½�</td>
            <td class="paddingT15 wordSpacing5">���: <input name="bookid" type="text" value="" class="infoTableInput2" />&nbsp;�½ں�: <input name="chapterid" type="text" value="" class="infoTableInput2" /></td>
            <td class="paddingT15 wordSpacing5"><input type="submit" name="singlechapter" value="�������" /></td>
          </form></tr>
        </table>
    </div>
    <div class="info" >
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>