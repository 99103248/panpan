<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo PT_SITENAME?> - ��Ա���� - ��Ϣ</title>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/portal.css">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/pphelp.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/common.js"></script>
</head>
<body>
<div id="topnav">
	<a href="<?php echo PT_SITEURL?>" id="logo" title="<?php echo PT_SITENAME?>"></a>
	<a href="<?php echo PT_SITEURL?>user/">��Ա����</a>|<a href="<?php echo PT_SITEURL?>">������ҳ</a>
</div>
<div class="bodycon">
	<div class="spline"></div>
	<div class="wrap">
		<div id="pt_boxidx">
			<div id="pt_title">
				<ul>
					<li id="phome"><a href="index.php">��ҳ</a></li>
					<li id="pinfo">
						<a id="infobtn" href="info.php">�˻�</a>
						<ul id="pinfopdm" style="visibility: hidden;" class="pdmenu">
							<li><a href="info.php">�˻���Ϣ</a></li>
							<li><a href="edit.php">�޸�����</a></li>
							<li><a href="editpwd.php">�޸�����</a></li>
							<li><a href="editlevel.php">��������</a></li>
						</ul>
					</li>
					<li id="pmark">
						<a id="markbtn" href="mark.php">���</a>
						<ul id="pmarkpdm" style="visibility: hidden;" class="pdmenu">
							<li><a href="mark.php">��ܹ���</a></li>
							<li><a href="usermark.php">��Ա���</a></li>
							<li><a href="automark.php">�����ʷ</a></li>
						</ul>
					</li>
					<li id="pmsg">
						<a id="msgbtn" href="pm.php">��Ϣ</a>
						<ul id="pmsgpdm" style="visibility: hidden;" class="pdmenu">
							<li><a href="pm.php">�ռ���</a></li>
							<li><a href="pmsend.php">������</a></li>
							<li><a href="pmnew.php">������Ϣ</a></li>
						</ul>
					</li>
<?php
if(($username == '')){
?>
<li id="plogin"><a href="login.php">��Ա��¼</a></li>
<?php }else{ ?>
<li id="plogout"><a href="logout.php">�˳���¼</a></li>
<?php } ?>
</ul>
				<span><a href="<?php echo PT_SITEURL?>">��<?php echo PT_SITENAME?>��</a></span>
			</div>
			<div id="pt_side">
				<div id="pt_face">
<?php
if(($username == '')){
?>
<dl><dt><a href="login.php"><img id="user_face_img" src="<?php echo PT_SITEURL?>templets/user/images/face.gif" alt="��¼" border="0" height="120" width="120"></a></dt><dd><a href="login.php">��¼</a></dd></dl>
<?php }else{ ?>
<dl><dt><a href="index.php"><img id="user_face_img" src="
<?php
if(($userimg=='')){
?><?php echo PT_SITEURL?>templets/user/images/face.gif
<?php }else{ ?><?php echo $userimg?>
<?php } ?>
" alt="<?php echo $username?>" border="0" height="120" width="120"></a></dt><dd><a href="index.php"><?php echo $username?></a></dd></dl>
<?php } ?>
</div>
				<div id="ptmenu">
					<ul>
						<li id="myinvite"><a href="index.php" title="��ҳ">��ҳ</a><span class="new"></span></li>
						<li id="myaccount"><a href="info.php" title="�˻�">�˻�</a></li>
						<li id="mycomic"><a href="edit.php" title="����">����</a></li>
						<li id="mybookcase"><a href="mark.php" title="���">���</a></li>
						<li id="myfootmark"><a href="automark.php" title="�㼣">�㼣</a></li>
						<li id="mymsg"><a href="pm.php" title="��Ϣ">��Ϣ</a></li>
						<li id="myfrd"><a href="javascript:;" onclick="novalue()" title="����">����</a></li>
						<li id="myguest"><a href="javascript:;" onclick="novalue()" title="����">����</a></li>
						<li id="myfav"><a href="javascript:;" onclick="addfavor('<?php echo PT_SITEURL?>','<?php echo PT_SITENAME?>')" title="�ղ�">�ղ�</a></li>
						<li id="myhelp"><a href="logout.php" title="�˳�">�˳�</a></li>
					</ul>
				</div>
			</div>
<div id=pt_mainw>
	<div id=pmsg_banner><h1>�ҵ���Ϣ</h1></div>
	<div id=nav3>
		<a href="pm.php">�ռ���</a>
		<a href="pmsend.php">������</a>
		<a href="pmnew.php" class="here">������Ϣ</a>
	</div>
	<div id=message_box>
		<div class=message></div>
		<div class=newsmsg>
			<form name="myform" action="pmsend.php" method="post" onsubmit="return pmCheck(this);">
			<div class=newsmsgtt>������Ϣ<span class=f88>��д����Ϣ��</span></div>
			<div class=sendbox>
				<input type="hidden" name="pmid" value="<?php echo $pmid?>" />
				<label for=textfield><span>�ռ��ˣ�</span></label>
				<input type="text" name="username" value="" class=iptsend size="40"/>
				<div class=spline></div>
				<label for=label2><span>���⣺</span></label>
				<input type="text" name="title" value="" class=iptsend size="70"/>
				<div class=spline></div>
				<label for=textarea><span>���ݣ�</span></label>
				<textarea name="content" rows="10" cols="100"></textarea>
				<div class=spline></div>
				<div class=hobbtn>
					<label for=label3></label>
					<input type="submit" name="send" value="�� ��" class="submit"/>
					<label for=label4></label>
					<input type="reset" id="button2" value="�� ��" class="submit"/>
				</div>
				<div class=cl></div>
			</div>
			<div class=cl></div>
			</form>
		</div>
	</div>
	<div class=cl></div>
</div>
<div class=cl></div>
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. ��<?php echo PT_SITENAME?>�� <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>