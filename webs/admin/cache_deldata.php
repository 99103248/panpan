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
	$url='cache_deldata.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_GET['deldir'])){
    $dirname=PT_DIR.$_GET['deldir'];
    if (removedir($dirname) or !file_exists($dirname)){
        $msg="1|��ϲ�����������ɹ�";
    }else{
        $msg="0|���ź����������ʧ��";
    }
	$url='cache_deldata.php';
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
    		<li><span>�������ݻ���</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>�����������������й����в��������ݵĻ��棬��ǻ�Ŀ��վһ�㲻����Դ˽��д���</li>           
            <li>���Ŀ¼̫�����ǻ��ǽ�����ʹ��ftp���������취��</li>
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
            <th class="paddingT15">�ٶ����а����ݻ���</th>
            <td class="paddingT15 wordSpacing5">cache/cache_baidutop.ptv</td>
            <td class="paddingT15 wordSpacing5"><a href="?delfile=cache/cache_baidutop.ptv">�������</a></td>
          </tr>
          <tr>
            <th class="paddingT15">С˵���а����ݻ���</th>
            <td class="paddingT15 wordSpacing5">cache/<?php echo PT_RULESDIR?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=cache/<?php echo PT_RULESDIR?>">�������</a></td>            
          </tr>
          <tr>
            <th class="paddingT15">С˵��Ϣ����</th>
            <td class="paddingT15 wordSpacing5">files/data</td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/data">�������</a></td>            
          </tr>
          <tr>
            <th class="paddingT15">С˵�½����ݻ���</th>
            <td class="paddingT15 wordSpacing5">files/chapter/txt</td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/chapter/txt">�������</a></td>            
          </tr>
          <tr>
            <th class="paddingT15">С˵�½ڷ�ҳ����</th>
            <td class="paddingT15 wordSpacing5">files/chapter/page</td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/chapter/page">�������</a></td>            
          </tr>
          <tr>
            <th class="paddingT15">С˵�����������</th>
            <td class="paddingT15 wordSpacing5">files/search</td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/search">�������</a></td>            
          </tr>
          <tr>
            <th class="paddingT15">�ƽ�AspNetPager��ҳ����</th>
            <td class="paddingT15 wordSpacing5">cache/viewstate.<?php echo PT_RULE?>.over.ptv</td>
            <td class="paddingT15 wordSpacing5"><a href="?delfile=cache/viewstate.<?php echo PT_RULE?>.over.ptv">�������</a></td>            
          </tr>
        </table>
    </div>
    <div class="info" ></div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>