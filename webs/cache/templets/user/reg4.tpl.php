<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo PT_SITENAME?> - ��Ա���� - ע��</title>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/pphelp.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/common.js"></script>
</head>
<body>
<div id="topnav">
	<a href="<?php echo PT_SITEURL?>" id="logo" title="<?php echo PT_SITENAME?>"></a>
	<a href="<?php echo PT_SITEURL?>user/">��Ա����</a>|<a href="<?php echo PT_SITEURL?>">������ҳ</a>
</div>
<div class="main">
	<div class="mainleft">
		<h2 class="title"><?php echo $username?></h2>
		<div class="loginbox1">
			<dl>
				<dt>
					<img src="
<?php
if(($userimg=='')){
?><?php echo PT_SITEURL?>templets/user/images/face.gif
<?php }else{ ?><?php echo $userimg?>
<?php } ?>
" border="0" height="120" width="120">
				</dt>
				<dd><a href="edit.php">�޸�����</a><a href="editpwd.php">�޸�����</a></dd>
				<dd><a href="editlevel.php">��������</a><a href="logout.php">�˳���¼</a></dd>
			</dl>
		</div>
		<div class="spline"></div>
		<h2 class="title">�û�����</h2>
		<ul class="question">
			<li><a href="index.php">��Ա��ҳ</a></li>
			<li><a href="info.php">�˻���Ϣ</a></li>
			<li><a href="edit.php">��������</a></li>
			<li><a href="mark.php">��ܹ���</a></li>
			<li><a href="automark.php">�����ʷ</a></li>
			<li><a href="pm.php">վ����Ϣ</a></li>
		</ul>
	</div>
	<div class="mainright">
		<div class="tinfo">
			<div class="title1"></div>
		</div>
		<div class="swbg"> 
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td rowspan="2" valign="top">
						<div class="swicos"></div>
					</td>
					<td style="height: 80px;" class="fred" valign="bottom" width="100%">��ϲ��ע��<?php echo PT_SITENAME?>�ɹ���</td>
				</tr>
				<tr>
					<td class="blue" valign="top" width="100%">
						<div class="reg_nav">
							<p>10����Զ�ת�����û����ġ�</p>
							<script language="javascript">setTimeout("redirect('<?php echo PT_SITEURL?>user/');",10000);</script>
							<p>&nbsp;</p>
							<p>
								<a href="<?php echo PT_SITEURL?>" title="��վ��ҳ">����վ��ҳ��</a>
								<a href="<?php echo PT_SITEURL?>user/" title="��Ա����">����Ա���ġ�</a>
							</p>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div style="height:100px">
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. ��<?php echo PT_SITENAME?>�� <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>