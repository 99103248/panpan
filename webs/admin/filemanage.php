<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    $name=$_SESSION['adminname'];
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="gb2312">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PT�������� �ļ�����</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body >
<?php
//��ȡ����
if(isset($_GET["action"])){$action=$_GET["action"];}else{$action='';}
if(isset($_GET["urlstr"])){$urlStr=$_GET["urlstr"];}else{$urlStr='';}
if(isset($_GET["filename"])){$filename=$_GET["filename"];}else{$filename='';}
if(isset($_GET["file"])){$file=$_GET["file"];}else{$file='';}
ini_set('date.timezone','Asia/Shanghai');
//���ļ����µ��ļ� 
function loadDir($dirname)
{
	if($handle=openDir($dirname))
	{
		echo '
<div id="currentPosition">
	<p>����ǰλ�ã� ϵͳ���� &raquo; ��վ�ļ�����</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>�ļ��б�</span></li>
		<li><a class="btn1" href="?action=open&filename=..">����Ŀ¼</a></li>
		<li><a class="btn1" href="?action=open&filename=../'.PT_TPLDIR.PT_TPL.'">ģ��Ŀ¼</a></li>
		<li><a class="btn1" href="?action=open&filename=../'.PT_RULESDIR.PT_RULE.'">����Ŀ¼</a></li>
		<li><a class="btn1" href="javascript:history.go(-1);">��һ��</a></li>
	</ul>
</div>
<div class="tdare">
	<table width="100%" cellspacing="0" class="dataTable">';
		echo '
		<tr class="tatr1">
			<td>�ļ���</td>
			<td class="table-center">�ļ�����</td>
			<td class="table-center">�ļ���С</td>
			<td class="table-center">�޸�ʱ��</td>
			<td class="handler">����</td>
		</tr>';
		
		if ($dirname!='.' and $dirname!='..' and $dirname!=''){
			$num=strlen($dirname)-strlen(strrchr($dirname,'/'));
			$updir=substr($dirname,0,$num);
			echo '			
		<tr class="tatr2" onMouseOut="this.style.backgroundColor=\'#ffffff\';" onMouseOver="this.style.backgroundColor=\'#eeeeee\'">
			<td colspan="5"><img src="images/dir2.gif"> <a href="filemanage.php?action=open&filename='.$updir.'">�ϼ�Ŀ¼</a></td>
		</tr>';
		}
		while(false!==($files=readDir($handle)))
		{
			if($files!="."&&$files!="..")
			{
				$urlStrs=$dirname."/".$files;
				
				if(is_dir($dirname."/".$files))
				{
					echo '
		<tr class="tatr2" onMouseOut="this.style.backgroundColor=\'#ffffff\';" onMouseOver="this.style.backgroundColor=\'#eeeeee\'">
			<td colspan="5"><img src="images/dir.gif"> <a href="filemanage.php?action=open&filename='.$urlStrs.'">'.$files.'</a></td>
		</tr>'
		;
				}
				else 
				{
					$types="�ļ�";
					$cons="<a href=\"javascript:fillfile('$urlStrs','$files');\">Move</a> | <a href=\"filemanage.php?action=edit&urlstr=$urlStrs\">Edit</a> | <a href='filemanage.php?action=del&urlstr=$urlStrs'>Del</a>";
					$classname="file";
					$fileSize=getSize($dirname."/".$files);
					$fileaTime=date("Y-m-d H:i:s",getEditTime($dirname."/".$files));
					$arrayfile[]='
		<tr class="tatr2" onMouseOut="this.style.backgroundColor=\'#ffffff\';" onMouseOver="this.style.backgroundColor=\'#eeeeee\'">
			<td><img src="images/file.gif">'.$files.'</td>
			<td class="table-center">�ļ�˵��</td>
			<td class="table-center">'.$fileSize.'</td>
			<td class="table-center">'.$fileaTime.'</td>
			<td class="handler"><a href="filemanage.php?action=edit&urlstr='.$urlStrs.'">�༭</a></td>
		</tr>';
		
				}				
			}
		}
        		
		if (isset($arrayfile) and is_array($arrayfile)){
			$arrayfileLen=count($arrayfile);
		}else{
			$arrayfileLen=0;
		}
		for($i=0;$i<$arrayfileLen;$i++) echo $arrayfile[$i];		
		closeDir($handle);
	}
}

//��ȡ�ļ���С
function getSize($a)
{
	if(file_exists($a))
	{
		$fizeKB=fileSize($a)/1024;
		if($fizeKB>0){
			list($t1,$t2)=explode(".",$fizeKB);
			$fizeKB=$t1.".".substr($t2,0,2).'KB';
		}else{
			$fizeKB='0.00KB';
		}  
		return $fizeKB;
	}
}

//��ȡ����޸�ʱ��
function getEditTime($a)
{
	if(file_exists($a))
	{
		return filemTime($a);
	}
}

//��ȡ�ļ�
function readFiles($a)
{
	//$exts=substr($a,-3);
	$exts=explode(".",$a);
	$extsNums=count($exts);
	$exts=$exts[$extsNums-1];
	if($exts=="php"||$exts=="asp"||$exts=="txt" ||$exts=="js"||$exts=="html"||$exts=="aspx"||$exts=="jsp"||$exts=="htm")
	{
		$handle=@fopen($a,"r");
		if($handle)
		{
			echo '
<div id="rightTop">
	<ul class="subnav">
		<li><span>�ļ��޸�</span></li>
		<li><a class="btn1" href="?action=open&filename=..">����Ŀ¼</a></li>
		<li><a class="btn1" href="?">�ļ�Ŀ¼</a></li>
		<li><a class="btn1" href="?">ģ��Ŀ¼</a></li>
		<li><a class="btn1" href="?">����Ŀ¼</a></li>
		<li><a class="btn1" href="javascript:history.go(-1);">��һ��</a></li>
	</ul>
</div>
<div class="info">
	<table class="infoTable">';
			echo '<form action="filemanage.php?action=doedit&urlstr='.$a.'" method="POST">
			<tr>
				<th class="paddingT15"><label for="time">�ļ�����:</label></th>
				<td class="paddingT15 wordSpacing5"><input class="infoTableInput" style="width:500px;" name="filename" type="text" value="'.$a.'" readonly></td>
			</tr>
			<tr>
				<th class="paddingT15" valign="top"><label for="content">ģ�����:</label></th>
				<td class="paddingT15 wordSpacing5"><textarea class="temp_t" name="content" rows="25" style="width:600px;height:320px;">';
			while(!fEof($handle))
			{
				echo ubb(fgets($handle));
			}
			fClose($handle);
			echo '
			</textarea>
			</tr>
			<tr>
				<th></th>
				<td class="ptb20">
					<input class="inputbut" type="submit" name="Submit" value="ȷ���޸�" />
				</td>
			</tr>
         </form>
  ';
			}
		else 
		{
			$num=strlen($a)-strlen(strrchr($a,'/'));
			$updir=substr($a,0,$num);
			$msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
			$url='filemanage.php?action=open%26filename='.$updir;
			echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
		}
	}
	else 
	{
		$num=strlen($a)-strlen(strrchr($a,'/'));
		$updir=substr($a,0,$num);
		$msg="0|��ʧ�ܣ����ܱ༭��׺Ϊ ".$exts." ���ļ�";
		$url='filemanage.php?action=open%26filename='.$updir;
		echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
	}
}

//�޸��ļ�
function editFiles($a)
{
	if(isset($_POST["content"])){
	if(get_magic_quotes_gpc()) $contents=stripslashes($_POST["content"]); else $contents=$_POST["content"];
	}
	if(is_writeable($a))
	{
		$num=strlen($a)-strlen(strrchr($a,'/'));
		$updir=substr($a,0,$num);
		if(!$handle=@fopen($a,"wb"))
		{
			$msg="0|��ʧ�ܣ����ܴ��ļ���$a";
			$url='filemanage.php?action=open%26filename='.$updir;
			echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
			exit;
		}
		if(@fwrite($handle,$contents)===FALSE)
		{
			$msg= "0|д�����٣�����д�뵽�ļ���$a";
			$url='filemanage.php?action=open%26filename='.$updir;
			echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
		}
		else 
		{
			$msg="Y|��ϲ�����޸��ļ��ɹ�";
			$url='filemanage.php?action=open%26filename='.$updir;
			echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
		}
		@fclose($handle);
	}
	else 
	{
		echo "0|���ź����������ļ�û��д��Ȩ��";
		$url='filemanage.php?action=open%26filename='.$updir;
		echo"<script>location.href='go.php?msg=$msg&url=$url';</script>";
	}
	
}

//�ַ�ת��
function ubb($str)
{
	$str=str_replace("<","&lt;",$str);
	$str=str_replace(">","&gt;",$str);
	return $str;
}



//�������
if($action=="")
{
	loadDir(".");
}
elseIf ($action=="edit")
{
	readFiles($urlStr);
}
elseif ($action=="doedit")
{
	editFiles($urlStr);
}
else
{
	loadDir($filename);
}
?>
</table>

</div>
<div id=page_footer>Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>