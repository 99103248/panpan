<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/config.inc.php';
include $setfile;
if (isset($_POST["save"])){
    unset($_POST['save']);
    foreach($_POST as $key => $value){
        $pt_set[strtoupper($key)]=$value;
    }
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="\$pt_set['$key']='$value';\n";
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    $file='../data/config.php';
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="define('$key','$value');\n";
    }
    $str.='?>';
    $result=$pt->writeto($file,$str);
    if ($result){
        $msg="1|��ϲ�����޸Ĳ����ɹ�";
    }else{
        $msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
    }
	$url='config_function.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>����̨ - PTС͵</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<style type="text/css">
td.hover, tr.hover
{
	background-color: #F2F9FD;
}
th.hover, thead td.hover, tfoot td.hover
{
	background-color: ivory;
}
</style>
</head>
<body>
<div id="currentPosition">
	<p>����ǰλ�ã� ϵͳ���� &raquo; ��������</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>���ܿ���</span></li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
			<th class="paddingT15">�Ƿ����վ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_open" value="true" <?php if ($pt_set['PT_OPEN']=='true'){echo 'checked="checked"';}?> />��</label>
                <label><input type="radio" name="pt_open" value="false" <?php if ($pt_set['PT_OPEN']=='false'){echo 'checked="checked"';}?> />�ر�</label>
                 <span class="gray">�Ƿ���⿪����վ�����ѡ��رգ�����������д�ر�ԭ��֧��html��</span>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ��վ�ر����ɣ�</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="pt_closewhy"  style="width:550px;height:45px;" ><?php echo $pt_set['PT_CLOSEWHY'];?></textarea><br /><br />
            </td>
          </tr>
          <tr>
			<th class="paddingT15">����Զ�����:</th> 
            <td class="paddingT15 wordSpacing5">
                <input name="pt_plusbid" type="text" value="<?php echo $pt_set['PT_PLUSBID']?>"  class="infoTableInput" />
                <span class="gray">��ż��Զ�����������ǧƪһ�ɣ�ֻ������������</span>
    		</td>
          </tr>
          <tr>
			<th class="paddingT15">�½ں��Զ�����:</th> 
            <td class="paddingT15 wordSpacing5">
                <input name="pt_plustid" type="text" value="<?php echo $pt_set['PT_PLUSTID']?>"  class="infoTableInput" />
                <span class="gray">�½ںż��Զ�����������ǧƪһ�ɣ�ֻ������������</span>
    		</td>
          </tr>
          <tr> 
			<th class="paddingT15">��ȡ���ݺ���:</th> 
			<td class="paddingT15 wordSpacing5">
                <select name="pt_gettype" style="width: 260px;">
                    <option value="file_get_contents" <?php if ($pt_set['PT_GETTYPE']=='file_get_contents'){echo 'selected="selected"';}?>>file_get_contents����<?php if(!function_exists("file_get_contents")){echo " ��֧��";}?></option>
                    <option value="curl" <?php if ($pt_set['PT_GETTYPE']=='curl'){echo 'selected="selected"';}?>>curl����<?php if(!function_exists("curl_init")){echo " ��֧��";}?></option>
					<option value="fsockopen" <?php if ($pt_set['PT_GETTYPE']=='fsockopen'){echo 'selected="selected"';}?>>fsockopen����<?php if(!function_exists("fsockopen")){echo " ��֧��";}?></option>
                </select>
                <span class="gray">һ����ڿռ�ѡ��file_get_contents������ռ�ѡ��curl��</span>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> ѭ����ȡ������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_getnum" type="text" value="<?php echo $pt_set['PT_GETNUM']?>"  class="infoTableInput" />
                <span class="gray">���ɼ������������ʵ���������ݣ����벻Ҫ̫�����������ѭ����Ĭ��Ϊ1��</span>
    		</td>
          </tr>
		  <tr>
            <th class="paddingT15"><label for="time_zone"> α��֩����ʣ�</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="pt_useragent"  style="width:550px;height:45px;" ><?php echo $pt_set['PT_USERAGENT'];?></textarea><br /><br />
				<span class="gray">��������˹�����Ч</span>
            </td>
          </tr>
          <tr> 
			<th class="paddingT15">�Ƿ���������:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_defend" value="true" <?php if ($pt_set['PT_DEFEND']=='true'){echo 'checked="checked"';}?> />����������</label>
                <label><input type="radio" name="pt_defend" value="false" <?php if ($pt_set['PT_DEFEND']=='false' or !isset($pt_set['PT_DEFEND'])){echo 'checked="checked"';}?> />�رշ�����</label>
				<span class="gray">ͼƬ��ʾ���½ڵ��á�������������ʹ�ñ�վ��ַʱ��Ч��</span>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> ����������������</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_defendurl" type="text" value="<?php echo $pt_set['PT_DEFENDURL']?>"  class="infoTableInput" />
				<span class="gray">�������������ԡ�|���ָ���</span>
    		</td>
          </tr>
          <tr> 
			<th class="paddingT15">�Ƿ���α��̬:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_reurl" value="true" <?php if ($pt_set['PT_REURL']=='true'){echo 'checked="checked"';}?> />����α��̬</label>
                <label><input type="radio" name="pt_reurl" value="false" <?php if ($pt_set['PT_REURL']=='false'){echo 'checked="checked"';}?> />�ر�α��̬</label>
            </td> 
		  </tr>
          <tr>
			<th class="paddingT15">�Ƿ�����ͼƬ��ַ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_imgurl" value="true" <?php if ($pt_set['PT_IMGURL']=='true'){echo 'checked="checked"';}?> />���ص�ַ</label>
                <label><input type="radio" name="pt_imgurl" value="false" <?php if ($pt_set['PT_IMGURL']=='false'){echo 'checked="checked"';}?> />��ʵ��ַ</label>
            </td> 
		  </tr>
		  <tr> 
			<th class="paddingT15">ͼƬ���ݻ�ȡ��ʽ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_imggettype" value="1" <?php if ($pt_set['PT_IMGGETTYPE']=='1' or !isset($pt_set['PT_IMGGETTYPE'])){echo 'checked="checked"';}?> />headerת��</label>
                <label><input type="radio" name="pt_imggettype" value="2" <?php if ($pt_set['PT_IMGGETTYPE']=='2'){echo 'checked="checked"';}?> />referer��ȡ</label>
				<label><input type="radio" name="pt_imggettype" value="3" <?php if ($pt_set['PT_IMGGETTYPE']=='3'){echo 'checked="checked"';}?> />readfile��ȡ</label>
				<span class="gray">��һ����ʡ��Դ�������ֿ����ƽ��������</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">����ͼƬ����:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_bookimg" value="true" <?php if ($pt_set['PT_CACHE_BOOKIMG']=='true'){echo 'checked="checked"';}?> />��������</label>
                <label><input type="radio" name="pt_cache_bookimg" value="false" <?php if ($pt_set['PT_CACHE_BOOKIMG']=='false'){echo 'checked="checked"';}?> />�رջ���</label>
                <span class="gray">ע�⣺�˹��ܺķ�һ���ռ䡣</span>
            </td> 
		  </tr>
		  <tr> 
			<th class="paddingT15">����ͼƬ��ַ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_bookimgurl" value="true" <?php if ($pt_set['PT_CACHE_BOOKIMGURL']=='true'){echo 'checked="checked"';}?> />ʹ�ñ�վ��ַ</label>
                <label><input type="radio" name="pt_cache_bookimgurl" value="false" <?php if ($pt_set['PT_CACHE_BOOKIMGURL']=='false'){echo 'checked="checked"';}?> />ʹ�����ص�ͼƬ��ַ</label>
                <span class="gray">����������ͼƬ�������ֱ����ʾ����ͼƬ�ڱ�վ�ĵ�ַ��</span>
            </td> 
		  </tr>
          <tr>
			<th class="paddingT15">�½�ͼƬ����:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_chapterimg" value="true" <?php if ($pt_set['PT_CACHE_CHAPTERIMG']=='true'){echo 'checked="checked"';}?> />��������</label>
                <label><input type="radio" name="pt_cache_chapterimg" value="false" <?php if ($pt_set['PT_CACHE_CHAPTERIMG']=='false'){echo 'checked="checked"';}?> />�رջ���</label>
                <span class="gray">ע�⣺�˹��ܺķѴ����ռ䡣</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">��̬����:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_html" value="true" <?php if ($pt_set['PT_CACHE_HTML']=='true'){echo 'checked="checked"';}?> />��������</label>
                <label><input type="radio" name="pt_cache_html" value="false" <?php if ($pt_set['PT_CACHE_HTML']=='false'){echo 'checked="checked"';}?> />�رջ���</label>
                <span class="gray">�Կռ������ٶȡ�ע�⣺�˹��ܺķ�һ���ռ䡣</span>
            </td> 
		  </tr>
           <tr> 
			<th class="paddingT15">��ҳ������̬:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_index" value="true" <?php if ($pt_set['PT_CACHE_INDEX']=='true'){echo 'checked="checked"';}?> />������̬</label>
                <label><input type="radio" name="pt_cache_index" value="false" <?php if ($pt_set['PT_CACHE_INDEX']=='false'){echo 'checked="checked"';}?> />������</label>
                 <span class="gray">�����ڲ�������̬�������¶���ҳ���о�̬���洦��(6�����Զ�����һ��)</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">�鼮���ݻ���:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_data" value="true" <?php if ($pt_set['PT_CACHE_DATA']=='true' or !isset($pt_set['PT_CACHE_DATA'])){echo 'checked="checked"';}?> />ǿ�ƴ�</label>
                <label><input type="radio" name="pt_cache_data" value="false" <?php if ($pt_set['PT_CACHE_DATA']=='false'){echo 'checked="checked"';}?> />�رջ���</label>
                <span class="gray"><font color=red>ǿ���Ƽ�����������</font>ע�⣺�˹��ܺķ�һ���ռ䡣</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">�����������:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_search" value="true" <?php if ($pt_set['PT_CACHE_SEARCH']=='true' or !isset($pt_set['PT_CACHE_SEARCH'])){echo 'checked="checked"';}?> />��������</label>
                <label><input type="radio" name="pt_cache_search" value="false" <?php if ($pt_set['PT_CACHE_SEARCH']=='false'){echo 'checked="checked"';}?> />�رջ���</label>
                <span class="gray">������WEB��WAP˫ģʽ���Ƽ�������ע�⣺�˹��ܺķ�һ���ռ䡣</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">�½����ݻ���:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_chapter" value="true" <?php if ($pt_set['PT_CACHE_CHAPTER']=='true' or !isset($pt_set['PT_CACHE_CHAPTER'])){echo 'checked="checked"';}?> />��������</label>
                <label><input type="radio" name="pt_cache_chapter" value="false" <?php if ($pt_set['PT_CACHE_CHAPTER']=='false'){echo 'checked="checked"';}?> />�رջ���</label>
                <span class="gray"><font color=red>�ռ��㹻ʱ��ǿ���Ƽ�����������</font>ע�⣺�˹��ܺķ�һ���ռ䡣</span>
            </td> 
		  </tr>
          <tr>
			<th class="paddingT15">�Ƿ��������ص�ַ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_downurl" value="true" <?php if ($pt_set['PT_DOWNURL']=='true'){echo 'checked="checked"';}?> />���ص�ַ</label>
                <label><input type="radio" name="pt_downurl" value="false" <?php if ($pt_set['PT_DOWNURL']=='false'){echo 'checked="checked"';}?> />��ʵ��ַ</label>
                <span class="gray">���ص�ַ�ſ���֤��¼����ʵ��ַ����Լ��Դ��</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">�����Ƿ���Ҫ��¼:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_downlogin" value="true" <?php if ($pt_set['PT_DOWNLOGIN']=='true'){echo 'checked="checked"';}?> />��֤��¼</label>
                <label><input type="radio" name="pt_downlogin" value="false" <?php if ($pt_set['PT_DOWNLOGIN']=='false'){echo 'checked="checked"';}?> />����֤��¼</label>
                <span class="gray">������֤��ֻ�е�¼��Ա�������أ����뿪���������ص�ַ��</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">�������Ψһ��ʾ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_searchjump" value="true" <?php if ($pt_set['PT_SEARCHJUMP']=='true'){echo 'checked="checked"';}?> />��ת��ҳ</label>
                <label><input type="radio" name="pt_searchjump" value="false" <?php if ($pt_set['PT_SEARCHJUMP']=='false'){echo 'checked="checked"';}?> />��ʾ�б�</label>
                <span class="gray">���������Ψһʱ������ѡ����ת��ҳ����ʾ�б�</span>
            </td> 
		  </tr>
		  <tr> 
			<th class="paddingT15">�½�������ʾ��ʽ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_chaptertype" value="1" <?php if ($pt_set['PT_CHAPTERTYPE']=='1' or !isset($pt_set['PT_CHAPTERTYPE'])){echo 'checked="checked"';}?> />�����б�</label>
                <label><input type="radio" name="pt_chaptertype" value="2" <?php if ($pt_set['PT_CHAPTERTYPE']=='2'){echo 'checked="checked"';}?> />ֱ����ʾ</label>
				<label><input type="radio" name="pt_chaptertype" value="3" <?php if ($pt_set['PT_CHAPTERTYPE']=='3'){echo 'checked="checked"';}?> />JS����</label>
				<span class="gray">�����б�ֻ���״��޻���ʱʹ��JS���ã��Ժ�ֱ����ʾ���ݣ�ǿ�ҽ���ѡ��</span>
            </td> 
		  </tr>
		  <tr> 
			<th class="paddingT15">�½�����JS��ַ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_chapterjsurl" value="true" <?php if ($pt_set['PT_CHAPTERJSURL']=='true'){echo 'checked="checked"';}?> />��̬��ַ</label>
                <label><input type="radio" name="pt_chapterjsurl" value="false" <?php if ($pt_set['PT_CHAPTERJSURL']=='false' or !isset($pt_set['PT_CHAPTERJSURL'])){echo 'checked="checked"';}?> />��̬��ַ</label>
                <span class="gray">��̬��ַռ����Դ�٣����ǲ����ں�̨�����÷�������</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">�½������滻:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_chapterreplace" value="true" <?php if ($pt_set['PT_CHAPTERREPLACE']=='true'){echo 'checked="checked"';}?> />�����滻</label>
                <label><input type="radio" name="pt_chapterreplace" value="false" <?php if ($pt_set['PT_CHAPTERREPLACE']=='false'){echo 'checked="checked"';}?> />�ر��滻</label>
                <span class="gray">�½������滻�������ڡ�<a href="config_chapterreplace.php" style="color:fuchsia;text-decoration:none;">�½������滻</a>���������á�ע��: �����ܻ���ط�����������</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">�Ƿ���ˮӡ:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_markpower" value="true" <?php if ($pt_set['PT_MARKPOWER']=='true'){echo 'checked="checked"';}?> />����ˮӡ</label>
                <label><input type="radio" name="pt_markpower" value="false" <?php if ($pt_set['PT_MARKPOWER']=='false'){echo 'checked="checked"';}?> />�ر�ˮӡ</label>
                <span class="gray">������ˮӡ���뵽�˵���<a href="config_mark.php" style="color:fuchsia;text-decoration:none;">ˮӡ����</a>��������ϸ�������á�</span>
            </td> 
		  </tr>
          <tr>
			<th class="paddingT15">�Ƿ���������:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_randstrpower" value="true" <?php if ($pt_set['PT_RANDSTRPOWER']=='true'){echo 'checked="checked"';}?> />����������</label>
                <label><input type="radio" name="pt_randstrpower" value="false" <?php if ($pt_set['PT_RANDSTRPOWER']=='false'){echo 'checked="checked"';}?> />�رջ�����</label>
                <span class="gray">������ˮӡ���뵽�˵���<a href="config_randstr.php" style="color:fuchsia;text-decoration:none;">����������</a>��������ϸ�������á�</span>
            </td> 
		  </tr>
		  <tr>
			<th class="paddingT15">Gzipѹ������:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_gzip_power" value="true" <?php if ($pt_set['PT_GZIP_POWER']=='true'){echo 'checked="checked"';}?> />��������</label>
                <label><input type="radio" name="pt_gzip_power" value="false" <?php if ($pt_set['PT_GZIP_POWER']=='false'){echo 'checked="checked"';}?> />�رչ���</label>
                <span class="gray">����GZIP������ļӿ���վ�����ٶȣ������˹��ܻ���ɷ�����һ��������<br /><font color=red>����������Ѿ�����GZIP���ܣ������ﲻ��Ҫ�ظ�����������������ҳ��հף���رմ˹��ܣ�</font></span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">Gzipѹ������:</th> 
			<td class="paddingT15 wordSpacing5">
                <input name="pt_gzip_value" type="text" value="<?php echo $pt_set['PT_GZIP_VALUE']?>"  class="infoTableInput" />
                <span class="gray">����д1-9֮������֣�����Խ��ѹ������Խ�ߡ�</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">����������:</th> 
			<td class="paddingT15 wordSpacing5">
                <input name="pt_link_defaulttext" type="text" value="<?php echo $pt_set['PT_LINK_DEFAULTTEXT']?>"  class="infoTableInput" />
                <span class="gray">��û���㹻�������������ӵ�ʱ����ʾ�����֡�</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">��������:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_banbook" value="true" <?php if ($pt_set['PT_BANBOOK']=='true'){echo 'checked="checked"';}?> />��������</label>
                <label><input type="radio" name="pt_banbook" value="false" <?php if ($pt_set['PT_BANBOOK']=='false'){echo 'checked="checked"';}?> />�ر�����</label>
                <span class="gray">���������������ڡ�<a href="config_banbook.php" style="color:fuchsia;text-decoration:none;">ͼ�����ι���</a>���������á�</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">����������ʾ:</th> 
			<td class="paddingT15 wordSpacing5">
                <input name="pt_banbookinfo" type="text" value="<?php echo $pt_set['PT_BANBOOKINFO']?>"  class="infoTableInput" />
                <span class="gray">���鱻���ε�ʱ����ʾ�����֡�</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">֩�����ü�¼:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_bot_power" value="true" <?php if ($pt_set['PT_BOT_POWER']=='true'){echo 'checked="checked"';}?> />��¼����</label>
                <label><input type="radio" name="pt_bot_power" value="false" <?php if ($pt_set['PT_BOT_POWER']=='false'){echo 'checked="checked"';}?> />����¼</label>
                 <span class="gray">ע��: �����ܻ���ط���������</span>
            </td> 
		  </tr>
        </table>
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="save" value="�ύ" />
                <input class="formbtn" type="reset" name="reset" value="����" />
            </td>
          </tr>
        </table>
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>