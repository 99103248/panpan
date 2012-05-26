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
// ˵���� ��������Ŀ¼,��ͳ�ƴ�С
// ��Դ������
function dirsize($dirpath){
    $thisdirstat = array('filesize'=>0,"files"=>0,"dirs"=>0);
    if (false ==($dirhandle = @opendir($dirpath))) return $thisdirstat ;
    while (false !== ($name = readdir($dirhandle))){
        if ($name == "." or $name == "..") continue;
        if (!is_dir($dirpath.DIRECTORY_SEPARATOR.$name)){
            $thisdirstat["filesize"] += filesize($dirpath.DIRECTORY_SEPARATOR.$name);
            ++$thisdirstat["files"];
            }
        else{
            ++$thisdirstat["dirs"];
            $subdirstat = dirsize($dirpath.DIRECTORY_SEPARATOR.$name);
            $thisdirstat["filesize"] += $subdirstat["filesize"]; 
            $thisdirstat["files"] += $subdirstat["files"]; 
            $thisdirstat["dirs"] += $subdirstat["dirs"]; 
        };
    };
    closedir($dirhandle);
    return $thisdirstat;
}
function size($dirpath){
$fsize=(dirsize($dirpath));
$fizeKB="{$fsize[filesize]}"/1024;
if($fizeKB>0)
  {
   list($t1,$t2)=explode(".",$fizeKB);
   $fizeKB=$t1.".".substr($t2,0,2).'KB';
  }else{$fizeKB='0.00KB';}  
return $fizeKB;
}
if (isset($_GET['delfile'])){
    $filename=PT_DIR.$_GET['delfile'];    
    if (unlink($filename) or !file_exists($filename)){
        $msg="1|��ϲ�����������ɹ�";
    }else{
        $msg="0|���ź����������ʧ��";
    }
	$url='cache_size.php';
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
	$url='cache_size.php';
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
    		<li><span>�����С�鿴</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
            <li>�鿴��Ҫ������ռ��С�����ڿ��ƿռ�ռ�á�</li>    		
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>        		  
        		  <th style="width: 220px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</th>
        		  <th style="width: 250px;">�����ַ</th>
                  <th style="width: 250px;">�����С</th>
                  <th>����</th>
        		</tr>
        	</thead>        
          <tr>
            <th class="paddingT15">��ʱ����</th>
            <td class="paddingT15 wordSpacing5">cache</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../cache');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=cache">�������</a></td>
          </tr>
          <tr>
            <th class="paddingT15">С˵������Ϣ����</th>
            <td class="paddingT15 wordSpacing5">files/data</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/data');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/data">�������</a></td>
          </tr>
          <tr>
            <th class="paddingT15">С˵�½����ݻ���</th>
            <td class="paddingT15 wordSpacing5">files/chapter/txt</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/chapter/txt');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/chapter/txt">�������</a></td>
          </tr>
          <tr>
            <th class="paddingT15">С˵�½ڷ�ҳ����</th>
            <td class="paddingT15 wordSpacing5">files/chapter/page</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/chapter/page');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/chapter/page">�������</a></td>
          </tr>
          <tr>
            <th class="paddingT15">С˵�����������</th>
            <td class="paddingT15 wordSpacing5">files/search</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/search');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/search">�������</a></td>
          </tr>
          <tr>
            <th class="paddingT15">С˵����ͼƬ����</th>
            <td class="paddingT15 wordSpacing5">files/cover</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/cover');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/cover">�������</a></td>
          </tr>
          <tr>
            <th class="paddingT15">С˵�½�ͼƬ����</th>
            <td class="paddingT15 wordSpacing5">files/images</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/images');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/images">�������</a></td>
          </tr>
          <tr>
            <th class="paddingT15">�����̬����</th>
            <td class="paddingT15 wordSpacing5">files/static</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/static');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/static">�������</a></td>
          </tr>
        </table>
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>