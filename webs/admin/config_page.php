<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

$setfile= '../data/page.inc.php';
include $setfile;

$page['1']='��ҳ';
$page['2']='�����б�';
$page['3']='ȫ���б�';
$page['4']='����';
$page['5']='ȫ������';
$page['6']='���ҳ';
$page['7']='Ŀ¼ҳ';
$page['8']='����ҳ';
$page['9']='�½�ҳ';
$page['10']='�Ķ�βҳ';
$page['11']='����ҳ';

$pagekey['1']='index';
$pagekey['2']='sort';
$pagekey['3']='over';
$pagekey['4']='top';
$pagekey['5']='topover';
$pagekey['6']='book';
$pagekey['7']='read';
$pagekey['8']='down';
$pagekey['9']='chapter';
$pagekey['10']='readend';
$pagekey['11']='search';

$help['1']='1��{sitename} ��վ��';
$help['2']='1��{sitename} ��վ��<br>2��{sortname}��Ŀ��';
$help['3']='1��{sitename} ��վ��';
$help['4']='1��{sitename} ��վ��<br>2��{topname} ���������';
$help['5']='1��{sitename} ��վ��<br>2��{topname} ���������';
$help['6']='1��{sitename} ��վ��<br>2��{bookname} ����<br />3��{author} ������';
$help['7']='1��{sitename} ��վ��<br>2��{bookname} ����<br />3��{author} ������';
$help['8']='1��{sitename} ��վ��<br>2��{bookname} ����<br />3��{author} ������';
$help['9']='1��{sitename} ��վ��<br>2��{bookname} ����<br />3��{chaptername} �½���';
$help['10']='1��{sitename} ��վ��<br>2��{bookname} ����<br />3��{author} ������';
$help['11']='1��{sitename} ��վ��<br>2��{key} �����ؼ���';

if (isset($_POST["save"])){
    unset($_POST['save']);
    $str='<?php'."\n";
    for ($i=1;$i<12;$i++){
        $str.="\$title['".$pagekey[$i]."']='".$_POST["title_$pagekey[$i]"]."';\n";
        $str.="\$keywords['".$pagekey[$i]."']='".$_POST["keywords_$pagekey[$i]"]."';\n";
        $str.="\$description['".$pagekey[$i]."']='".$_POST["description_$pagekey[$i]"]."';\n\n";
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    
    for ($i=1;$i<12;$i++){
        $str='<?php'."\n";
        $str.="\$title='".$_POST["title_$pagekey[$i]"]."';\n";
        $str.="\$keywords='".$_POST["keywords_$pagekey[$i]"]."';\n";
        $str.="\$description='".$_POST["description_$pagekey[$i]"]."';\n\n";
        $str.='?>';
        
        $str = str_replace('{sitename}',"'.PT_SITENAME.'",$str);
        $str = str_replace('{',"'.$",$str);
        $str = str_replace('}',".'",$str);
        
        $file='../data/page/'.$pagekey[$i].'.php';
        $pt->writeto($file,$str);                
    }    
    if ($result){
        $msg="1|��ϲ�����޸Ĳ����ɹ�";
    }else{
        $msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
    }
	$url='config_page.php';
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
	<p>����ǰλ�ã� ϵͳ���� &raquo; ҳ����Ϣ����</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>��Ȩ�ļ��޸�</span></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title1" ><a href="javascript:void(0);">��ҳ</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title2" ><a href="javascript:void(0);">�����б�</a></li>
		<li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title3" ><a href="javascript:void(0);">ȫ���б�</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title4" ><a href="javascript:void(0);">����</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title5" ><a href="javascript:void(0);">ȫ������</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title6" ><a href="javascript:void(0);">���ҳ</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title7" ><a href="javascript:void(0);">Ŀ¼ҳ</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title8" ><a href="javascript:void(0);">����ҳ</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title9" ><a href="javascript:void(0);">�½�ҳ</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title10" ><a href="javascript:void(0);">�Ķ�βҳ</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title11" ><a href="javascript:void(0);">����ҳ</a></li>		
	</ul>
</div>
<div class="info" >
    <form method="post" >
        <?php
        for ($i=1;$i<12;$i++){            
        ?>
        <table class="infoTable" id="rightTop_Content<?php echo $i?>">
          <tr>
            <th class="paddingT15"><label for="time_zone"> <?php echo $page[$i];?>ҳ����⣺</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="title_<?php echo $pagekey[$i]?>"  style="width:550px;height:30px;" ><?php echo $title[$pagekey[$i]];?></textarea>            
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"><label for="time_zone"> <?php echo $page[$i];?>ҳ��ؼ��ʣ�</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="keywords_<?php echo $pagekey[$i]?>"  style="width:550px;height:30px;" ><?php echo $keywords[$pagekey[$i]];?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"><label for="time_zone"> <?php echo $page[$i];?>ҳ��������</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="description_<?php echo $pagekey[$i]?>"  style="width:550px;height:48px;" ><?php echo $description[$pagekey[$i]];?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"><label for="time_zone"> ����ʹ�ð�����</label></th>
            <td class="paddingT15 wordSpacing5">                                
                <span class="gray">��<?php echo $page[$i];?>����ʹ�õĲ�����<br />
                <?php echo $help[$i];?></span>
            </td>
          </tr>
          
          </table>
          <?php
            }
          ?>
                  
                
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