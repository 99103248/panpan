<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/user.php';
include $setfile;

$lvnum['1']="һ";
$lvnum['2']="��";
$lvnum['3']="��";
$lvnum['4']="��";
$lvnum['5']="��";
$lvnum['6']="��";
$lvnum['7']="��";
$lvnum['8']="��";
$lvnum['9']="��";
$lvnum['10']="ʮ";

if (isset($_POST["save"])){
    unset($_POST["save"]);
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){            
            foreach($_POST[$key] as $akey => $avalue){
                if (is_array($_POST[$key][$akey])){
                    foreach($_POST[$key][$akey] as $bkey => $bvalue){
                        $str.="\$".$key."['".$akey."']['".$bkey."']='".$bvalue."';\n";
                    }
                }else{
                    $str.="\$".$key."['".$akey."']='".$avalue."';\n";
                }
                
            }
        }else{
            $str.="\$$key='".valuedo($value)."';\n";
        }
        
    }
    
    $str.="?>";    
    $result=$pt->writeto($setfile,$str);    
    if ($result){
        $msg="1|��ϲ�����޸Ĳ����ɹ�";
    }else{
        $msg="0|��ʧ�ܣ��ļ������ڻ򲻿���";
    }
	$url='config_user.php';
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
	<p>����ǰλ�ã� ϵͳ���� &raquo; �û�����</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>�û����Ĳ�������</span></li>
		<li class="btn1" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title1" ><a href="javascript:void(0);">��������</a></li>
		<li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title2" ><a href="javascript:void(0);">���ּ���</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title3" ><a href="javascript:void(0);">����ƺ�</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title4" ><a href="javascript:void(0);">�������</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title5" ><a href="javascript:void(0);">��ܸ���</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title6" ><a href="javascript:void(0);">��������</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title7" ><a href="javascript:void(0);">�Ƽ�Ʊ��</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title8" ><a href="javascript:void(0);">���Ѹ���</a></li>
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>ϵͳ�������10���û����������������ô�ֻ࣬�轫��Ӧ�Ļ��ּ�������Ϊ�ϴ����Ŀ����</li>
        <li>ϵͳΪÿ���û��������10����ܣ�ÿ����ܽ������ÿ��Ա���50��֮����</li>        
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> ��ʼ���֣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_user_regpoint" type="text" value="<?php echo $pt_user_regpoint?>" class="infoTableInput" />
                <span class="gray">ע��ʱ���͵Ļ���</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> ��½���֣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_user_loginpoint" type="text" value="<?php echo $pt_user_loginpoint?>" class="infoTableInput" />
                <span class="gray">ÿ��½һ�λ�ö��ٻ���</span>
    		</td>
          </tr> 
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> ���ػ��֣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_user_downpoint" type="text" value="<?php echo $pt_user_downpoint?>" class="infoTableInput" />
                <span class="gray">ÿ����һ����������Ҫ���Ѷ��ٻ���</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> �ƹ���֣�</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_user_comepoint" type="text" value="<?php echo $pt_user_comepoint?>" class="infoTableInput" />
                <span class="gray">ÿ�ƹ�һ��������վ���Ի�ö��ٻ���</span>
    		</td>
          </tr>         
        </table>
        
        <table class="infoTable" id="rightTop_Content2"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >�����ȼ�<?php echo $lvnum[$i]?>������� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_lvpoint[$i]"?>" type="text" value="<?php echo $pt_user_lvpoint[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >���� VIP ������� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_lvpoint[vip]"?>" type="text" value="<?php echo $pt_user_lvpoint['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content3"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >�ȼ�<?php echo $lvnum[$i]?> �ƺ� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_lvname[$i]"?>" type="text" value="<?php echo $pt_user_lvname[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP �ƺ� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_lvname[vip]"?>" type="text" value="<?php echo $pt_user_lvname['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content4"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >�ȼ�<?php echo $lvnum[$i]?>��ܲ����� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_marknum[$i]"?>" type="text" value="<?php echo $pt_user_marknum[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP ��ܲ����� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_marknum[vip]"?>" type="text" value="<?php echo $pt_user_marknum['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content5"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >�ȼ�<?php echo $lvnum[$i]?> ��ܸ��� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_markc[$i]"?>" type="text" value="<?php echo $pt_user_markc[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP ��ܸ��� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_markc[vip]"?>" type="text" value="<?php echo $pt_user_markc['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content6"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >�ȼ�<?php echo $lvnum[$i]?> ����Ϣ���� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_pmnum[$i]"?>" type="text" value="<?php echo $pt_user_pmnum[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP ����Ϣ���� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_pmnum[vip]"?>" type="text" value="<?php echo $pt_user_pmnum['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content7"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >�ȼ�<?php echo $lvnum[$i]?> �Ƽ�Ʊ�� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_votenum[$i]"?>" type="text" value="<?php echo $pt_user_votenum[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP �Ƽ�Ʊ�� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_votenum[vip]"?>" type="text" value="<?php echo $pt_user_votenum['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        <table class="infoTable" id="rightTop_Content8"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >�ȼ�<?php echo $lvnum[$i]?> ���Ѹ��� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_friendnum[$i]"?>" type="text" value="<?php echo $pt_user_friendnum[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP ���Ѹ��� ��</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_friendnum[vip]"?>" type="text" value="<?php echo $pt_user_friendnum['vip']?>" class="infoTableInput" />
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