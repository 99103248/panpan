<?php
include 'conn.php';
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<{$Charset}>" />
<title>��ӭҳ��</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/facebox.js" type="text/javascript"></script>
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script>
function setUpdateAlert(d)
{
$.ajax({
    url: 'conn.php?do=set_update_alert&type='+d,
    type: 'GET',
    dataType: 'html',
    timeout: 1000,
    error: function(){
        alert('Error loading XML document');
    },
    success: function(data){
        $.facebox.close();
    }
});
}
</script>
<?php
include "./info.php";
$time=$_SERVER['REQUEST_TIME'];
if(is_file("./msg.php")){
	$uptime = filemtime("./msg.php");
}else{
	$needupdate = true;
}
if($needupdate or $time-$uptime>3600){
	$update = file_get_contents($ptbook['updateurl']);
	if(!empty($update)){
		$str = "<?php\n";
		$str .= $update;
		$str .= "\n?>";
		$pt->writeto("./msg.php", $str);
	}
}
include "./msg.php";
if($time>$ptbook['warn_time'] and $release>$ptbook['warn_release'] and $release>$ptbook['release']){
?>
<script>
jQuery(document).ready(function($) {
	$.facebox.settings.loadingImage = 'images/loading.gif'; 
	$.facebox('<div style="background-color:transparent ;"><span style="font-weight: bold;"><center><h1><?php echo $infotitle?></h1></center></span><br><span><?php echo $infocon?></span></div>'+"<div align='center'><input type='button' id='NoUpdateAlert' value='��������' onclick='setUpdateAlert(1);'>&nbsp;&nbsp;<input type='button' id='AlertAfterWeek' value='������˵' onclick='setUpdateAlert(2);'>&nbsp;&nbsp;<input type='button' id='AlertAfterWeek' value='�ر�' onclick='$.facebox.close();'></div>");
})
</script>
<?php
}
?>
</head>
<body style="overflow-x:hidden">
<div id="rightWelcome">
	<p>
		<strong>���ã�<?php echo $_SESSION['adminname'];?>����ӭ���� PTС˵ϵͳ ����̨</strong>
		�ϴε�¼ʱ��: <?php echo $_SESSION['logtime'];?>���ϴε�¼ip: <?php echo $_SESSION['logip'];?>
	</p>
</div>
<dl id="rightCon">
<dt>��ȫ��ʾ</dt>
<dd>
    <ul>
		<li><font color="red"><b>Ϊ��ӭ��PTС˵����3.0����������2.Xϵ������ȫ����ѣ�Ϊ��ֹ�����˼��Ϻ��ţ��������ٷ���վ����Ȩ���ص����أ�</b></font></li>
		<?php
        if (strpos(dirname(__FILE__),'admin')){
            echo '<li>���ĺ�̨����Ŀ¼Ϊ<span class="red">Ĭ��Ŀ¼</span>������ʹ��ftp����������ʽ<span class="blue">����̨Ŀ¼������</span></li>';   
        }
		if (file_exists('../install')){
		    echo '<li>����<span class="red">��װ����Ŀ¼��Ȼ����</span>������ʹ��ftp����������ʽ<span class="blue">����װ����Ŀ¼ɾ������������</span></li>';    
		}
		if ($_SESSION['adminname']=='admin'){
		    echo '<li>���Ĺ���Ա�˺�Ϊ<span class="red">Ĭ���˺�</span>�������ڡ�<a href="config_adminuser.php" class="bold">����Ա����</a>��ҳ���������ù����˺�</li>';  
		}
        ?>
    </ul>
</dd>
<dt>ϵͳ��Ϣ</dt>
<dd>
    <table border="1">
        <tr>
            <th>����������ϵͳ:</th>
            <td width="35%"><?php echo php_uname();?></td>
            <th>WEB ������:</th>
            <td width="35%"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
        </tr>
        <tr>
            <th>PHP �汾:</th>
            <td><?php echo phpversion();?></td>
            <th>MYSQL �汾:</th>
            <td><?php if(extension_loaded('mysql')){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
        </tr>
		<tr>
            <th>PT �������:</th>
            <td><?php echo $ptbook['version'];?></td>
            <th>PT ����汾:</th>
            <td><?php echo $ptbook['build'];?></td>
        </tr>
    </table>
</dd>
<dt>ʹ������</dt>
<dd>
	<ul>
		<li>һ��PTС͵ϵ�������<a href="http://pakey.net" title="Pakey blog">Pakey</a>����,Mobile�����޸����ƣ��Ͻ�ʹ���κηǷ��ֶ��ƽⱾ���򣬽����޸ķ�������Ϊ��    
		<li>��������ʹ�ñ��������Υ���ҹ����з��ɷ�����κ���Ϊ���紫����ľ�����������������ɫ��ȣ�  
		<li>�����Ͻ�ʹ�ñ��������ˢ������ˢ���˵���Ϊ���羭���֣�������Ȩ׷�س���ʹ��Ȩ�������˻��κν�    
		<li>�ġ���������ΪС͵���򣬽�����������վ����������Ӷ���Ŀ��վ���һ����Ӱ�죬���뱣��Ŀ��վ�����ӣ�           
		<li>�塢�����û�Υ������ʹ����������վ��Ȩ��ֹ�Ը��û��ļ���֧�֡��������������ݲɼ��ȷ��񲢱���׷������Ӧ�ķ������Σ�
	</ul>
</dd>
<dt>����PT</dt>
<dd>
    <table>
        <tr>
            <th>�ٷ���վ��</th>
            <td width="35%"><a href="http://www.ptcms.com/" target="_blank">http://WwW.PTcms.CoM/</a></td>
            <th>�ٷ���̳��</th>
            <td><a href="http://bbs.ptcms.com/" target="_blank">http://BBS.PTcms.CoM/</a></td>
		</tr>
    </table>
</dd>
</dl>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>