<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
$setfile= '../'.PT_RULESDIR.PT_RULE.'/rules.set.php';
include $setfile;
if (isset($_POST["save"])){
    unset($_POST["save"]);
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){            
            foreach($_POST[$key] as $akey => $avalue){
                $str.="\$".$key."['".$akey."']='".$avalue."';\n";
            }
        }else{
            $str.="\$$key='".valuedo($value)."';\n";
        }
    }    
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    if ($result){
        $msg="1|��ϲ�����޸Ĺ���ɹ�";
    }else{
        $msg="0|���ź����޸�ʧ��";
    }
	$url='set_rule.php';
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
	<p>����ǰλ�ã� ������� &raquo; ��������</p>
</div>
<form method="post" > 
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>���������Ϣ</span></li>		
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> �������ƣ�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rules_name" type="text" value="<?php echo $pt_rules_name?>" class="infoTableInput" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �������ߣ�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rules_author" type="text" value="<?php echo $pt_rules_author?>" class="infoTableInput" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ������Դ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rules_copyurl" type="text" value="<?php echo $pt_rules_copyurl?>" class="infoTableInput" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ������ʾ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rules_demourl" type="text" value="<?php echo $pt_rules_demourl?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
    </div>
    
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>���������</span></li>		
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> �ܵ���񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[allclick]" type="text" value="<?php echo $pt_top_list['allclick']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �µ���񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[monthclick]" type="text" value="<?php echo $pt_top_list['monthclick']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �ܵ���񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[weekclick]" type="text" value="<?php echo $pt_top_list['weekclick']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ���Ƽ��񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[allvote]" type="text" value="<?php echo $pt_top_list['allvote']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ���Ƽ��񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[monthvote]" type="text" value="<?php echo $pt_top_list['monthvote']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ���Ƽ��񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[weekvote]" type="text" value="<?php echo $pt_top_list['weekvote']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �ղ����а񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[goodnum]" type="text" value="<?php echo $pt_top_list['goodnum']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �������а񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[fontsize]" type="text" value="<?php echo $pt_top_list['fontsize']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ����񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[newbook]" type="text" value="<?php echo $pt_top_list['newbook']?>" style="width: 450px;" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ȫ���񵥣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[overbook]" type="text" value="<?php echo $pt_top_list['overbook']?>" style="width: 450px;" />                
            </td>
          </tr>
        </table>
    </div>
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>��͵ȡ����</span></li>		
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> �б�鿪ʼλ�ã�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_start" type="text" value="<?php echo valuetoinput($pt_top_list_start)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �б�����λ�ã�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_end" type="text" value="<?php echo valuetoinput($pt_top_list_end)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> �б��ָ�����</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_split" type="text" value="<?php echo valuetoinput($pt_top_list_split)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ͼ��id��ʼλ�ã�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_bookid_start" type="text" value="<?php echo valuetoinput($pt_top_list_bookid_start)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ͼ��id����λ�ã�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_bookid_end" type="text" value="<?php echo valuetoinput($pt_top_list_bookid_end)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ͼ��������ʼλ�ã�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_bookname_start" type="text" value="<?php echo valuetoinput($pt_top_list_bookname_start)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> ͼ����������λ�ã�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_bookname_end" type="text" value="<?php echo valuetoinput($pt_top_list_bookname_end)?>" class="infoTableInput" />                
            </td>
          </tr>
        </table>
    </div>
    <div class="info" >        
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
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