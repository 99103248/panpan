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
		<h2 class="title">�û�ָ��</h2>
		<div class="helpl_list">
			<h4><a href="login.php">�û���¼</a></h4>
			<h4><a href="reg.php">�û�ע��</a></h4>
			<h4><a href="getpwd.php">�һ�����</a></h4>
			<h4><a href="<?php echo PT_SITEURL?>">������ҳ</a></h4>
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
			<div class="title3"></div>
		</div>
		<div id="reg">
			<div class="regbox">
				<h2 class="tc fred">ѡ������</h2>
				<dl><dd>
					<form name="myform" action="reg4.php" method="post">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr class="tit">
							<td class="tit" valign="top"><strong>�û�����</strong></td>
							<td valign="top">
								<input type="text" name="username" value="<?php echo $username?>" size="15" class="text" readonly="readonly"/>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>���룺</strong></td>
							<td valign="top">
								<input type="password" name="password" value="<?php echo $password?>" size="40" class="text" readonly="readonly"/>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>���䣺</strong></td>
							<td align="center">
								<input type="text" name="email" value="<?php echo $email?>" size="40" class="text" readonly="readonly"/>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>QQ���룺</strong></td>
							<td valign="top">
								<input type="text" name="qq" value="<?php echo $qq?>" size="15" class="text" readonly="readonly"/>
							</td>
						</tr>
						<tr class="bor_01">
							<td class="tit" valign="top"><strong>������</strong></td>
							<td valign="top">
								<input type="text" name="turename" value="" size="15" class="text"/>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>�Ա�</strong></td>
							<td valign="top">
								<input type="radio" name="sex" value="��" style="border:0px" checked="checked"/>����
								<br />
								<input type="radio" name="sex" value="Ů" style="border:0px"/>��Ů
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>���գ�</strong></td>
							<td>
								<input type="text" name="birthday" id="birthday" value="" size="15" readonly="readonly"/>
								<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/calendar.css"/>
								<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/calendar.js"></script>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>ͷ��</strong></td>
							<td>
								<input type="text" name="userimg" value="" size="20"/>��<a href='javascript:///' onclick="window.open('face.html','chooseface','left=190px,top=110px,Width=537px,Height=425px,resizable=no,scrolls=no')">ѡ��ͷ��</a>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>���ԣ�</strong></td>
							<td>
								<select id="usercity" name="usercity">
									<option value="����">����</option>
									<option value="�Ϻ�">�Ϻ�</option>
									<option value="���">���</option>
									<option value="����">����</option>
									<option value="�ӱ�">�ӱ�</option>
									<option value="ɽ��">ɽ��</option>
									<option value="���ɹ�">���ɹ�</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="������">������</option>
									<option value="����">����</option>
									<option value="�㽭">�㽭</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="ɽ��">ɽ��</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="�㶫">�㶫</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="�Ĵ�">�Ĵ�</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="�ຣ">�ຣ</option>
									<option value="����">����</option>
									<option value="����">����</option>
									<option value="�½�">�½�</option>
									<option value="���">���</option>
									<option value="����">����</option>
									<option value="̨��">̨��</option>
									<option value="����">����</option>
								</select>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>�绰��</strong></td>
							<td valign="top">
								<input type="text" name="telephone" value="" size="20" class="text" require="false" regexp="^[0-9-]{6,13}$" datatype="custom" msg='�绰��ʽ����' />
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>MSN��</strong></td>
							<td valign="top">
								<input type="text" name="msn" value="" size="40" class="text" require="false" regexp="^[\w\-\.]+@[\w\-\.]+(\.\w+)+$" datatype="custom" msg='MSN��ʽ����' />
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>������ҳ��</strong></td>
							<td valign="top">
								<input type="text" name="myurl" value="" size="50" class="text"/>
							</td>
						</tr>
					</table>
					<table>
						<tr class="bor_01">
							<td class="tc" colspan="3" valign="top">
								<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/check.js"></script>
								<input type="submit" name="dosubmit" value="��һ��" class="submit"/>
								<input type="reset" name="button2" value="�� ��" class="submit"/>
							</td>
						</tr>
					</table>
					</form>
				</dd></dl>
			</div>
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. ��<?php echo PT_SITENAME?>�� <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>