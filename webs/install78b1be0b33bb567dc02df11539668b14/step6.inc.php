<?php include 'header.share.php';?>
<div class="content">
<form id="install" name="myform" action="install.php?step=7" method="post">
<input type="hidden" name="step" value="7" />

<table width="100%" cellspacing="1" cellpadding="0">
<caption>��д����Ա��Ϣ</caption>
  <tr>
	<th width="30%" align="right">����Ա�ʺ� : </th>
	<td><input name="username" type="text" id="username" value="admin" style="width:120px" /> 2��20���ַ��������Ƿ��ַ���<font color="FFFF00">(Ĭ��Ϊ admin)</font></td>
  </tr>
  <tr>
	<th align="right">���� : </th>
	<td><input name="password" type="text" id="password" value="" style="width:120px" /> 3��20���ַ�<font color="FFFF00">(Ĭ��Ϊ admin&nbsp;<a href="javascript:;" onclick="$('#password').val(suggestPassword());"><img src="images/auth.gif" border="0" /></a>)</font></td>
  </tr>
  <tr>
	<th align="right">ȷ������ : </th>
	<td><input name="pwdconfirm" type="text" id="pwdconfirm" value="" style="width:120px"/></td>
  </tr>
</table>
</form>
<a href="javascript:history.go(-1);" class="btn">������һ�� : ��д��վ������Ϣ</a>
<input type="button" name="completeInstall" onclick="checkform()" class="btn" value="��һ�� : ��װ���" /></div>
</div>
</div>
</body>
</html>