<?php include 'header.share.php';?>
<div class="content">
Ŀ¼�ļ����Լ���� :  <br />
<?php if($no_writablefile !='') { ?>
<span class="error">
<?php echo $no_writablefile;?>
</span>
	<input type="button" onclick="javascript:history.go(-1);" value="������һ��: ���л������" class="btn" />
	<input type="button" onclick="window.location.reload()" value="���¼��" class="btn" />
	<input type="button" onclick="if(confirm('��װ����վ�����޷���������,�Ƿ����?')) $('#install').submit();" value="ǿ�ư�װ" class="btn" title="ǿ�ư�װ" />
<?php
}
else
{
?>
<span class="no_error">

<?php echo $writablefile;?>

</span>
<a href="javascript:history.go(-1);" class="btn">������һ�� : ���л������</a> 
<a onclick="$('#install').submit();" class="btn">���ͨ������һ��</a>
<?php
}
?>
<form id="install" action="install.php" method="get">
<input type="hidden" name="step" value="5" />
 </form>
</div>
</div>
</div>
</body>
</html>