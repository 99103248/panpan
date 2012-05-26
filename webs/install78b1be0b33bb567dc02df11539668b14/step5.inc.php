<?php 
include 'header.share.php';
function tree($directory,$check){
    global $pt_set;
    $mydir=dir($directory);
    while($file=$mydir->read()){
    if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")){
        if (file_exists("$directory/$file/rules.set.php") and strpos($directory,'rules')){
            include "$directory/$file/rules.set.php";
            $name=$pt_rules_name.'('.$pt_rules_copyurl.')';
        }elseif (file_exists("$directory/$file/templets.set.php") and strpos($directory,'templets')){
            include "$directory/$file/templets.set.php";
            $name=$pt_templets_name;
        }else{
            $name=$file.'(�����ã�ȱ�������ļ�)';
        }
    	if ($file==$check)
    	{
    		echo "<option value=$file selected='true'>$name</option>";
    	}else
    	{
    		print_r($pt_set);
            echo "<option value=$file>$name</option>";
    	}
    }
    }
    $mydir->close();
}
?>

<div class="content">
<form id="install" action="install.php?step=6" method="post">


<table width="100%" cellpadding="0" cellspacing="0">
<caption>��������վ�Ļ�������</caption>
<tr>
<th>��վ���� : </th>
<td><input name="pt_sitename" type="text" id="sitename" value="PTС˵����" style="width: 200px;" /><span> ������վ��ʹ�õ�����</span></td>
</tr>

<tr>
<th>��վ��ַ : </th>
<td><input name="pt_siteurl" type="text" id="siteurl" value="<?php echo $siteurl;?>" style="width: 200px;" /><span> ��վ�ķ���URL��һ�㱣��Ĭ�ϼ���</span></td>
</tr>
<tr>
<th>վ������ : </th>
<td><input name="pt_zzname" type="text" id="siteurl" value="Ptcms" style="width: 200px;" /><span> </span></td>
</tr>
<tr>
<th>E-mail : </th>
<td><input name="pt_zzemail" type="text" id="siteurl" value="administrator@yourdomain.com" style="width: 200px;" /><span> </span></td>
</tr>
<tr>
<th>������� : </th>
<td><input name="pt_beian" type="text" id="siteurl" value="��ICP֤030173��" style="width: 200px;" /><span> �������ڹ��Ų��ı���</span></td>
</tr>
<tr>
<th>���ù��� : </th>
<td>
    <select name="pt_rule" style="width: 205px;">
		<?php  tree("../rules",'zaidudu'); ?>
    </select>
    <span> zaiduduΪ�¹���</span>
</td>
</tr>
<tr>
<th>����ģ�� : </th>
<td><select name="pt_tpl" style="width: 205px;">
		<?php  tree("../templets",'default'); ?>
    </select>
    <span> �ݺ�ģ��ΪPTvipģ��</span>
</td>
</tr>
<tr>
            <th class="paddingT15"><label for="time_zone"> ����Ŀ¼��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_dir" type="text" value="<?php echo str_replace('\\','/',str_replace('install','',dirname(__FILE__)))?>" style="width:200px" />
                <span class="gray">�������ھ���·���������Զ���⡣<a href="../plus/check/dircheck.php" target="_blank" style="color: #FFFF00;font-weight: bold;">����˴���Ŀ¼����У��</a></span>
            </td>
          </tr>
</table>
</form>
</div>

<input type="button" onclick="javascript:history.go(-1);" value="������һ�� : �ļ�Ȩ�޼��" class="btn" />
<input type="button" onclick="$('#install').submit();$('#btn_installnow').attr('disabled',true);" id="btn_installnow" class="btn" value="��һ�� : ����Ա����" />

</div>
</div>
</body>
</html>