<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo PT_SITENAME?> - ��Ա���� - ��ҳ</title>
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
	<div id=pinfo_banner><h1>�ҵ���Ϣ</h1></div>
	<div id=nav3>
		<a href="index.php" class="here">�û�����</a>
	</div>
	<div class=infoone style="margin: 0px">
		<div class=infotitle2><h2>��¼��ʾ</h2></div>
		<div class=chghob>
			<div class=chgjg>
				<div class=chgp1 style="width: 600px">���ã�<strong><?php echo $username?></strong>���������ϴε�¼���ڣ�<strong><?php echo $logtime?></strong>����¼IP��<strong><?php echo $logip?></strong></div>
				<div class=cl></div>
			</div>
			<div class=cl></div>
		</div>
		<div class=infotitle2><h2>�û���Ϣ</h2></div>
		<div class=chghob>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">��ǰ�ȼ���</div>
				<div class=chgp3 style="width: 500px"><input type="text" value="<?php echo $userlevel?>���ȼ�<?php echo $userlv?>��" size="15" readonly="readonly"/></div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">��ǰ���֣�</div>
				<div class=chgp3 style="width: 500px"><input type="text" value="<?php echo $userpoint?>" size="15" readonly="readonly"/></div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">������Ҫ���֣�</div>
				<div class=chgp3 style="width: 500px"><input type="text" value="<?php echo $usernextlevelpoint?>" size="15" readonly="readonly"/>��<?php echo $levelupmsg?></div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">�ҵ���ܣ�</div>
				<div class=chgp3 style="width: 500px">����ǰ�����������<a href="mark.php"><font color="red"> <b><?php echo $usermarkc?></b> </font></a>����ÿ����ܿɲ���<font color="red"> <b><?php echo $usermarknum?></b> </font>��</div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">�ҵ��Ƽ���</div>
				<div class=chgp3 style="width: 500px">��ÿ��ӵ���Ƽ�Ʊ��<font color="red"> <b><?php echo $uservotenum?></b> </font>�ţ�����ʣ���Ƽ�Ʊ<font color="red"> <b><?php echo $uservotenum-$votenum?></b> </font>��</div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">�ҵ���Ϣ��</div>
				<div class=chgp3 style="width: 500px">����ǰ����δ����Ϣ<a href="pm.php"><font color="red"> <b><?php echo $pmnum?></b> </font></a>����</div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">�ҵĺ��ѣ�</div>
				<div class=chgp3 style="width: 500px">����ǰ���к���<a href="friend.php"><font color="red"> <b>0</b> </font></a>λ</div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">�ҵĹ��ף�</div>
				<div class=chgp3 style="width: 500px">����ǰ����Ϊ<a href="myp.php"><font color="red"> <b><?php echo $comepoint?></b> </font></a>�㣬������<font color="red"> <b><?php echo $comenum?></b> </font>λ��������<?php echo PT_SITENAME?></div>
				<div class=cl></div>
			</div>
			<div class=cl></div>
		</div>
	</div>
</div>
<div class=cl></div>
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. ��<?php echo PT_SITENAME?>�� <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>