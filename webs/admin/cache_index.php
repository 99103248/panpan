<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
if (isset($_POST["creat_index"])){
	include PT_DIR . 'inc/tpl.class.php';
	$pt_tpl = new pt_tpl;
	$pt_type = 'index';
	include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/nav.tpl.php';
	$cachefile = PT_DIR . 'files/static/update/update.pth';
	include PT_DIR . PT_RULESDIR . PT_RULE . '/' . $pt_type . '.php';
	include PT_DIR . 'inc/rules/' . $pt_type . '.php';
    $file = $pt_tpl->parser($pt_type);
    ob_start();
    include $file;
    $str = ob_get_contents();
    ob_end_clean();
    if (strlen($str) > 1000) {
        $result=$pt->writeto($cachefile, $str);
    }
    if ($result){
        $msg="1|��ϲ����ˢ����ҳ�ɹ�";
    }else{
        $msg="0|���ź���ˢ����ҳʧ��";
    }
	$url='cache_index.php';
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
	<p>����ǰλ�ã� С˵���� &raquo; �������</p>
</div>
<form method="post" >
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>ˢ�¾�̬��ҳ</span></li>
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>�����������������½�����̬������ҳ����Ȼ��Ҫˢ�µ��ļ������ã�����Ҫ�������湦�ܣ�</li>
            <li>�˹��ܻḲ��ԭ���Ļ����ļ�����һ���������ɵ�ʱ��ӱ���ˢ�¿�ʼ</li>
    	</ul>
    </div>
    <div class="info" >        
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="creat_index" value="ˢ����ҳ" />
            </td>
          </tr>
        </table>
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>