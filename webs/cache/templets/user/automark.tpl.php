<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo PT_SITENAME?> - ��Ա���� - �㼣</title>
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
<div id="pt_mainw">
	<div id="pspoor_banner"><h1>�ҵ��㼣</h1></div>
	<div id="nav3">
		<a href="mark.php">��ܹ���</a>
		<a href="usermark.php">��Ա���</a>
		<a href="automark.php" class="here">�����ʷ</a>
	</div>
	<div id="bookcase">
		<div class="bksel">
			<ul>
				<li class="fred fb">��<a href="usermark.php" class="fred fb">ʹ�û�Ա��ܹ�����ǩ</a>��</li>
<?php
if(($username=='')){
?>
<li class="inmark"><a href="reg.php" title="ע���Ա ʹ�ø��๦��">ע���Ա��ʹ�ø��๦��</a></li>
<?php } ?>
</ul>
		</div>
		<form name="myform" action="" method="post">
		<table id="marklist" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<th scope="col" width="10">&nbsp;</th>
				<th scope="col" width="40"><input name="" type="checkbox" onclick="ptCheckAll(this,'delid[]');"/></th>
				<th class="tleft" scope="col" width="150">����</th>
				<th scope="col" width="350">�����½�</th>
				<th scope="col" width="80">����ʱ��</th>
				<th scope="col" width="100">��ǩ��¼</th>
				<th scope="col" width="60">����</th>
			</tr><tr>
				<td colspan="7" scope="col">
					<table border="0" cellpadding="0" cellspacing="0">
<?php
for($i=1;$i<=$marknum;$i++){
?>
<tr>
							<td scope="col" nowrap="nowrap" width="10">&nbsp;</td>
							<td class="tcenter" scope="col" width="40"><input name="delid[]" type="checkbox" value="<?php echo $marklist[$i]['bookid']?>" /></td>
							<td class="tleft" scope="col" width="150"><a href="<?php echo $marklist[$i]['bookurl']?>" title="<?php echo $marklist[$i]['bookname']?>" target="_blank" class="f14"><?php echo $marklist[$i]['bookname']?></a></td>
							<td scope="col" width="350"><a href="<?php echo $marklist[$i]['chapterurl']?>" title="��<?php echo $marklist[$i]['bookname']?>�������½ڣ�<?php echo $marklist[$i]['chaptername']?>" target="_blank"><?php echo $marklist[$i]['chaptername']?></a></td>
							<td class="tcenter" scope="col" width="80"><?php echo $marklist[$i]['update']?></td>
							<td class="tcenter" scope="col" width="100"><a href="#" title="�����ʷ�����ô˹��ܣ���ʹ�����Ļ�Ա���"><?php echo $marklist[$i]['markchapter']?></a></td>
							<td class="tcenter fblue2" scope="col" width="60"><a href="automark.php?action=del&delid=<?php echo $marklist[$i]['bookid']?>">�Ƴ�</a></td>
						</tr>
<?php
}
?>
</table>
				</td>
			</tr>
		</table>
		<div class="bksbtn">
			<label for="Submit1"></label>
			<input name="checkall" type="button" class="submit" value="ȫ ѡ" onclick="selectall('marklist','delid[]')">
			<label for="Submit2"></label>
			<input name="del" type="submit" class="submit" value="�� ��">
			<label for="Submit3"></label>
		</div>
		</form>
	</div>
</div>
<div class="cl"></div>
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. ��<?php echo PT_SITENAME?>�� <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>