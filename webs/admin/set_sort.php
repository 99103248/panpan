<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
$setfile= PT_DIR . PT_RULESDIR. PT_RULE .'/rules.sort.php';;
include $setfile;
if (isset($_POST["save"])){
    unset($_POST["save"]);
    unset($_POST["inputnum"]);
    $arrnum=0;
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){
            foreach($_POST[$key] as $akey => $avalue){
                if ($_POST[$key][$akey]['name']!=''){
                    $arrnum++;
                    $str.="\$".$key."['".$arrnum."']['name']='".$_POST[$key][$akey]['name']."';\n";
                    $str.="\$".$key."['".$arrnum."']['id']='".$_POST[$key][$akey]['id']."';\n";
                }
            }
        }else{
            $str.="\$$key='".valuedo($value)."';\n";
        }
    }    
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    if ($result){
        $msg="1|��ϲ�����޸ĳɹ�";
    }else{
        $msg="0|���ź����޸�ʧ��";
    }
	unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/nav.tpl.php');
	$url='set_sort.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
$num=count($pt_templets_sortnav);

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
<script language="javascript">
<!--
var startNum = <?php echo $num+1?>;
function MakeUpload()
{
	var upfield = document.getElementById("uploadfield");
	var endNum =  parseInt(document.list_frm.inputnum.value) + startNum;
	for(startNum; startNum<endNum; startNum++){
		upfield.innerHTML += "<table width='100%' cellspacing='0' class='dataTable'><tbody ><tr><th class='paddingT15' width='200px'>                <label for='time_zone'>                    <input name='pt_templets_sortnav["+startNum+"][name]' type='text' value='' style='width: 200px;' />                </label>            </th>            <td class='paddingT15 wordSpacing5' width='400px'>                <input name='pt_templets_sortnav["+startNum+"][id]' type='text' value='' style='width: 400px;' />                           </td>            </tr></tbody></table>";
	}
}
-->
</script>
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
	<p>����ǰλ�ã� С˵���� &raquo; </p>
</div>
<form method="post" name="list_frm" id="ListFrm">
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>Ƶ����Ŀ����</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>��������Ϊ��ģ������ʾ����Ŀ���࣬��������������й�</li>
            <li>��ʹ����Ŀ���࣬��ֻд������id���ɣ���̬��ַ�;�̬��ַ�ɳ����Զ�����</li>
            <li>��ʹ�����а�����������ݣ������id����Ϊ�գ���̬��ַ�;�̬��ַ����Ҫ�ֶ���д</li>
            <li>�����Ʋ���д�����Զ�ɾ��������¼</li>
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>        		  
        		  <th style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ŀ����</th>
        		  <th style="width: 400px;">����id</th>
        		</tr>
        	</thead>
          <?php for ($i=1;$i<=$num;$i++) {?>  
          <tr>
            <th class="paddingT15">
                <label for="time_zone">
                    <input name="pt_templets_sortnav[<?php echo $i?>][name]" type="text" value="<?php echo $pt_templets_sortnav[$i]['name']?>" style="width: 200px;" />
                </label>
            </th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_sortnav[<?php echo $i?>][id]" type="text" value="<?php echo $pt_templets_sortnav[$i]['id']?>" style="width: 400px;" />                
            </td>
          </tr>
          <?php } ?>    
        </table>
        <div id='uploadfield'></div>
    </div>
    <div class="info" >        
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input name="inputnum" type="text" id="inputnum" size="15" value="1" />
                <input name='kkkup' type='button' class="formbtn" value='������Ŀ' onclick="MakeUpload();" />            
                <input class="formbtn" type="submit" name="save" value="�ύ" />
                <input class="formbtn" type="reset" name="reset" value="����" />
            </td>
          </tr>
        </table>
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>