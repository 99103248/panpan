<?php
include 'conn.php';
include '../data/config.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    $name=$_SESSION['adminname'];
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<{$Charset}>" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>PTС˵��̨���� </title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="js/prototype.lite.js" type="text/javascript"></script>
<script src="js/moo.fx.js" type="text/javascript"></script>
<script src="js/moo.fx.pack.js" type="text/javascript"></script>
<style>
	html { overflow-y:hidden; }
</style>
<script type="text/javascript">
window.onresize=function(){
	setWorkspace();
}
function showsrc(q){		
	var dllist=document.getElementById("container").getElementsByTagName("dl");
	var lilist=document.getElementById("nav").getElementsByTagName("li");
	for(i=0;i<lilist.length;i++){
		if(i==q){ 
			lilist[i].className="link actived";
		}else lilist[i].className="link";
	}
	for(j=0;j<dllist.length;j++){
		if(j==q){ 
			dllist[j].className="jx";
		}else dllist[j].className="hid";
	}
	var contents = document.getElementsByClassName('content');
	var toggles = document.getElementsByClassName('type');
	var myAccordion = new fx.Accordion(
		toggles, contents, {opacity: true, duration: 400}
	);
	var shownum=new Array()
	shownum[0]="0"
	shownum[1]="4"
	shownum[2]="7"
	shownum[3]="9"
	shownum[4]="10"
	shownum[5]="12"
	shownum[6]="14"
	shownum[7]="17"
	myAccordion.showThisHideOpen(contents[shownum[q]]);
}
</script>
</head>
<body style="background: url(images/content.gif) repeat-y;">
<div id="head">
	<div id="logo">
		<a href="http://www.ptcms.com/" target="_blank"><img src="images/logo.gif" alt="ptcms" border="0" /></a>
	</div>
    <div id="menu">
		<span>���ã�<strong><?php echo $name;?></strong> 
		[ <a href="config_adminuser.php" title="�˺�����" target="workspace">�˺�����</a>��<a href="logout.php">�˳�</a> ]</span>
		<a href="javascript:workspace.location.reload();" class="menu_btn1" >ˢ��ҳ��</a>
		<a href="welcome.php" class="menu_btn1" title="��̨��ҳ" target="workspace">��̨��ҳ</a>
		<a href="../" class="menu_btn1" title="�鿴վ��" target="_blank">�鿴վ��</a>
		<a href="http://www.ptcms.com" class="menu_btn1" title="�ٷ���վ" target="_blank">�ٷ���վ</a>
		<a href="http://bbs.ptcms.com/" class="menu_btn1" title="�ٷ���̳" target="_blank">�ٷ���̳</a>
		<a href="javascript:void(0);" id="back_btn"><img src="images/tiring_room_nav.gif" /></a>
    </div>
    <ul id="nav">
		<li class="link actived" onclick="javascript:showsrc(0)">��̨��ҳ</li>
		<li class="link" onclick="javascript:showsrc(1)">ϵͳ����</li>
		<li class="link" onclick="javascript:showsrc(2)">�������</li>
		<li class="link" onclick="javascript:showsrc(3)">�û�����</li>
		<li class="link" onclick="javascript:showsrc(4)">�������</li>
		<li class="link" onclick="javascript:showsrc(5)">ģ�����</li>
		<li class="link" onclick="javascript:showsrc(6)">ϵͳ����</li>
		<li class="link" onclick="javascript:showsrc(7)">վ������</li>
	</ul>
    <div id="headBg"></div>
</div>
<div id="content">
    <div id="left">
		<table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
			<tr>
				<td width="182" valign="top">
					<div id="container">
						<dl id="0" class="jx">
							<h1 class="type" name="type"><a href="javascript:void(0)">��������</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_base.php" target="workspace">��������</a></li>
									<li><a href="config_function.php" target="workspace">���ܿ���</a></li>
									<li><a href="set_tpl.php" target="workspace">ģ������</a></li>
									<li><a href="set_rule.php" target="workspace">��������</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">���ù���</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="ad_list.php" target="workspace">������</a></li>
									<li><a href="link_list.php" target="workspace">���ӹ���</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">��������</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
									</table>
								<ul class="MM">
                                    <li><a href="cache_delblock.php" target="workspace">�������黺��</a></li>
                                    <li><a href="cache_deldata.php" target="workspace">�������ݻ���</a></li>
									<li><a href="cache_deltpl.php" target="workspace">����ģ�建��</a></li>
									<li><a href="cache_delstatic.php" target="workspace">����̬����</a></li>
                                    <li><a href="cache_delimg.php" target="workspace">����ͼƬ����</a></li>
                                    <li><a href="cache_delbook.php" target="workspace">�����鼮����</a></li>
                                    <li><a href="cache_delall.php" target="workspace">�������л���</a></li>
                                    <li><a href="cache_size.php" target="workspace">�����Сͳ��</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">ʹ�ð���</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
									<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="http://www.ptcms.com/" target="workspace">Ŀ¼�ṹ</a></li>
									<li><a href="http://www.ptcms.com/" target="workspace">ģ���ǩ</a></li>
									<li><a href="http://www.ptcms.com/" target="workspace">�ٷ���վ</a></li>
									<li><a href="http://bbs.ptcms.com/" target="workspace">�ٷ���̳</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="1">
							<h1 class="type" name="type"><a href="javascript:void(0)">��������</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_base.php" target="workspace">��������</a></li>
									<li><a href="config_dir.php" target="workspace">Ŀ¼����</a></li>
                                    <li><a href="config_wap.php" target="workspace">WAP�Ƽ�����</a></li>
                                    <li><a href="config_adminuser.php" target="workspace">����Ա�˺�</a></li>
									<li><a href="config_key.php" target="workspace">��Ȩ��¼��</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">��������</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_function.php" target="workspace">���ܿ���</a></li>
									<li><a href="config_filename.php" target="workspace">��̬������</a></li>
									<li><a href="config_reurl.php" target="workspace">α��̬����</a></li>
									<li><a href="config_page.php" target="workspace">ҳ����Ϣ����</a></li>
									<li><a href="config_mark.php" target="workspace">ˮӡ����</a></li>
                                    <li><a href="config_randstr.php" target="workspace">����������</a></li>
                                    <li><a href="config_banbook.php" target="workspace">ͼ�����ι���</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">�����滻</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_chapterreplace.php" target="workspace">�½�ҳ�����滻</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="2">
							<h1 class="type" name="type"><a href="javascript:void(0)">���������</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="ad_add.php" target="workspace">��ӹ��</a></li>
									<li><a href="ad_list.php" target="workspace">����б�</a></li>
                                    <li><a href="ad_powerwin.php" target="workspace">��������</a></li>									
								</ul>
							</div>
                            <h1 class="type" name="type"><a href="javascript:void(0)">��������</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="link_add.php" target="workspace">��������</a></li>
									<li><a href="link_list.php" target="workspace">�����б�</a></li>
                                    <li><a href="link_num.php" target="workspace">��������</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="3">
							<h1 class="type" name="type"><a href="javascript:void(0)">�û�����</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_user.php" target="workspace">��������</a></li>
									<li><a href="user_add.php" target="workspace">����û�</a></li>
									<li><a href="user_list.php" target="workspace">�û��б�</a></li>
									<li><a href="user_edit.php" target="workspace">�༭�û�</a></li>
									<li><a href="user_point.php" target="workspace">���ֹ���</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="4">
							<h1 class="type" name="type"><a href="javascript:void(0)">�������</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="cache_time.php" target="workspace">����������</a></li>
                                    <li><a href="cache_index.php" target="workspace">ˢ����ҳ</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">��������</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="cache_delblock.php" target="workspace">�������黺��</a></li>
									<li><a href="cache_deldata.php" target="workspace">�������ݻ���</a></li>
									<li><a href="cache_deltpl.php" target="workspace">����ģ�建��</a></li>
									<li><a href="cache_delstatic.php" target="workspace">����̬����</a></li>
									<li><a href="cache_delimg.php" target="workspace">����ͼƬ����</a></li>
									<li><a href="cache_delbook.php" target="workspace">�����鼮����</a></li>
									<li><a href="cache_delall.php" target="workspace">�������л���</a></li>
									<li><a href="cache_size.php" target="workspace">�����Сͳ��</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="5">
							<h1 class="type"><a href="javascript:void(0)">ģ�����</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="set_tpl.php" target="workspace">ģ������</a></li>
									<li><a href="filemanage.php?action=open&filename=../<?php echo PT_TPLDIR.PT_TPL?>" target="workspace">ģ��༭</a></li>
									<li><a href="set_block.php" target="workspace">��ҳ����</a></li>                                    
                                    <li><a href="set_blocklist.php" target="workspace">ȫ������</a></li>
                                    <li><a href="set_blockreplace.php" target="workspace">��������</a></li>
									<li><a href="filemanage.php?action=open&filename=../cache/<?php echo PT_TPLDIR.PT_TPL?>" target="workspace">ģ�建��</a></li>
								</ul>
							</div>
							<h1 class="type"><a href="javascript:void(0)">�������</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="set_rule.php" target="workspace">��������</a></li>
									<li><a href="filemanage.php?action=open&filename=../<?php echo PT_RULESDIR.PT_RULE?>" target="workspace">����༭</a></li>
									<li><a href="set_sort.php" target="workspace">�������</a></li>
								</ul>
							</div>
						</dl>
						<dl  class="hid" id="6">
							<h1 class="type"><a href="javascript:void(0)">�ļ�����</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="filemanage.php?action=open&filename=.." target="workspace">�ļ�������</a></li>
									<li><a href="filemanage.php?action=open&filename=../<?php echo PT_TPLDIR.PT_TPL?>" target="workspace">ģ�����߹���</a></li>
									<li><a href="filemanage.php?action=open&filename=../<?php echo PT_RULESDIR.PT_RULE?>" target="workspace">�������߹���</a></li>
								</ul>
							</div>
							<h1 class="type"><a href="javascript:void(0)">��վ����</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="ann_add.php" target="workspace">��ӹ���</a></li>
									<li><a href="ann_list.php" target="workspace">�����б�</a></li>
								</ul>
							</div>
							<h1 class="type"><a href="javascript:void(0)">֩���¼</a></h1>
								<div class="content">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
									<ul class="MM">
										<li><a href="bot_set.php" target="workspace">֩�빦������</a></li>
										<li><a href="bot_last.php" target="workspace">�������֩��</a></li>
                                        <li><a href="bot_day.php" target="workspace">�������ü�¼</a></li>
                                        <li><a href="bot_date.php" target="workspace">��ʱ��μ�¼</a></li>
                                        <li><a href="bot_reset.php" target="workspace">���ݳ�ʼ��</a></li>
									</ul>
							</div>
						</dl>
						<dl class="hid" id="7">
							<h1 class="type"><a href="javascript:void(0)">��ѯ����</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="../plus/check/dircheck.php" target="workspace">Ŀ¼���</a></li>
									<li><a href="../plus/check/phpcheck.php" target="workspace">�������</a></li>
									<li><a href="phpinfo.php" target="workspace">PHP̽��</a></li>
								</ul>
							</div>
							<h1 class="type"><a href="javascript:void(0)">��Ӫ����</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="http://www.ptcms.com/" target="workspace">�ȴ�����</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">ʹ�ð���</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="http://www.ptcms.com/" target="workspace">Ŀ¼�ṹ</a></li>
									<li><a href="http://www.ptcms.com/" target="workspace">ģ���ǩ</a></li>
									<li><a href="http://www.ptcms.com/" target="workspace">�ٷ���վ</a></li>
									<li><a href="http://bbs.ptcms.com/" target="workspace">�ٷ���̳</a></li>
								</ul>
							</div>
						</dl>
						<script type="text/javascript">
						var contents = document.getElementsByClassName('content');
						var toggles = document.getElementsByClassName('type');
						var myAccordion = new fx.Accordion(
							toggles, contents, {opacity: true, duration: 400}
						);
						myAccordion.showThisHideOpen(contents[0]);
						</script>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div id="right">
		<iframe frameborder="0"src="welcome.php" id="workspace" name="workspace" style="margin-left:5px"></iframe>
		<script type="text/javascript">
		setWorkspace(); 
		function setWorkspace(){
		var Height=document.documentElement.clientHeight;
		var Width=document.body.clientWidth;
		document.getElementById("workspace").style.height=(Height-100)+"px";
		document.getElementById("workspace").style.width=(Width-190)+"px";
		}
		</script>
	</div>
</div>
<div class="back_nav">
	<div class="back_nav_list">
		<dl>
			<dt>PTcms</dt>
			<dd><a href="http://www.ptcms.com/" target="_blank">PTС͵</a></dd>
			<dd><a href="http://bbs.ptcms.com/" target="_blank">�������</a></dd>
			<dd><a href="http://bbs.ptcms.com/" target="_blank">�ٷ���̳</a></dd>
			<dd><a href="javascript:void(0);" onclick="window.open('http://www.ptcms.com/', 'Error', 'width=520,height=320,resizable=0,scrollbars=no');">���򱨴�</a></dd>
		</dl>
		<dl>
			<dt>����</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('base_setting','setting');none_fn();">վ������</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('base_config','setting');none_fn();">��̨����</a></dd>
		</dl>
		<dl>
			<dt>���</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('ads_list','ads');none_fn();">����б�</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('ads_add','ads');none_fn();">��ӹ��</a></dd>
		</dl>
		<dl>
			<dt>����</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('links_list','links');none_fn();">�����б�</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('links_add','links');none_fn();">��������</a></dd>
		</dl>
		<dl>
			<dt>ģ��</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('template_list','templates');none_fn();">ҳ��ģ�����</a></dd>
		</dl>
		<dl>
			<dt>�ʺ�</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('admin_list','admin');none_fn();">����Ա����</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('admin_add','admin');none_fn();">��ӹ���Ա</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('log_list','admin');none_fn();">������־����</a></dd>
		</dl>
	</div>
	<div class="shadow"></div>
	<div class="close_float"><img src="images/close2.gif" /></div>
</div>
</body>
</html>