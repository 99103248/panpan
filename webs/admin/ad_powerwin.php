<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

$id='powerwin';

//�������ݿ�
include '../data/ad/'.$id.'.php';

if (isset($_POST["save"])){    
    unset($_POST["save"]);    
    $str="<?php\n";
    foreach ($_POST as $key=>$value){
        $str.="\$$key=<<<flink\n".stripslashes($value)."\nflink;\n";        
        $key=$value;
    }
    $str.="?>";
    $result=$pt->writeto('../data/ad/'.$id.'.php',$str);
    $jsadcode1=htmltojs($_POST['adcode1']);
    $jsadcode2=htmltojs($_POST['adcode2']);
    $jsadcode3=htmltojs($_POST['adcode3']);
    $jsadcode4=htmltojs($_POST['adcode4']);
    $jsadcode5=htmltojs($_POST['adcode5']);
    $adcon=file_get_contents('../files/powerwin.txt');
    $comekeyarr=explode('|',$comekey);
    $comekey='"'.$comekeyarr['0'].'"';
    for ($i=1;$i<count($comekeyarr);$i++){
        $comekey.=',"'.$comekeyarr[$i].'"';
    }
    if ($islogin=='true'){
        $islogin='1=1';
    }else{
        $islogin='1>2';
    }
    $adcon=str_replace('{adnum}',$adnum,$adcon);
    $adcon=str_replace('{adcode1}',$jsadcode1,$adcon);
    $adcon=str_replace('{adcode2}',$jsadcode2,$adcon);
    $adcon=str_replace('{adcode3}',$jsadcode3,$adcon);
    $adcon=str_replace('{adcode4}',$jsadcode4,$adcon);
    $adcon=str_replace('{adcode5}',$jsadcode5,$adcon);
    $adcon=str_replace('{islogin}',$islogin,$adcon);
    $adcon=str_replace('{adtime}',$adtime,$adcon);
    $adcon=str_replace('{comekey}',$comekey,$adcon);
    $result=$pt->writeto(PT_DIR.'files/'.PT_ADDIR.$id.'.js',$adcon);
    if ($result){
        $msg="1|��ϲ�����޸Ĺ��ɹ�";
    }else{
        $msg="0|���ź����޸Ĺ��ʧ��";
    }
    
	$url='ad_powerwin.php'; 
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
	<p>����ǰλ�ã� ϵͳ���� &raquo; ������</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>��ǿ��������</span></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>��ǿ����Ϊ��ͨ��������ǿ��</li>
        <li>�����ж��û��Ƿ��¼</li>
        <li>�������ø�����·�ж��Ƿ񵯴�</strong></li>
        <li>�������ü��һ��ʱ�䵯��һ��</li>
        <li>�����������5�������ֵ�</li>
        <li><b>���ô���Ϊ{pt.getad.powerwin},���뵽ҳ��ģ�����λ�ô�</b></li>
	</ul>
</div>
<div class="info" >
    <form method="post">        
        <table class="infoTable">
          <!--
          <tr> 
			<th class="paddingT15">��Ա���:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="islogin" value="true" <?php if ($islogin=='true'){echo 'checked="checked"';}?> />�жϵ�¼</label>
                <label><input type="radio" name="islogin" value="false" <?php if ($islogin=='false'){echo 'checked="checked"';}?> />���жϵ�¼</label>
                <span class="gray">�Ƿ�Ե�¼״̬���֣�����½���Ƿ���ʾ��棬���ο���ʾ�Ĺ���Ƿ���ͬ</span>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"> ���������</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="adtime" value="<?php echo $adtime?>" />
                <span class="gray">��λ����</span>                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ��·�жϣ�</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="comekey" value="<?php echo $comekey?>" />
                <span class="gray">������·�����еĹؼ��ʣ�����ٶȿ���Ϊbaidu���Ѷ�����Ϊsodu���á�|������</span>
            </td>
          </tr>               
          <tr>
            <th class="paddingT15"> �ֻ�������</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="adnum" value="<?php echo $adnum?>" />
                <span class="gray">��������Ĺ���ж��ٸ������ַ�</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ������1��</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode1"><?php echo $adcode1?></textarea>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> ������2��</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode2"><?php echo $adcode2?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"> ������3��</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode3"><?php echo $adcode3?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"> ������4��</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode4"><?php echo $adcode4?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"> ������5��</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode5"><?php echo $adcode5?></textarea>
            </td>
          </tr>
          
          <tr>
            <th></th>
            <td class="ptb20">
    			<input class="formbtn" type="submit" name="save" value="���¹��" />
            </td>
          </tr>
          -->
          ��̨���ù�����ʱ�رգ���ǰȥfiles/<?php echo PT_ADDIR;?>Ŀ¼�����޸�powerwin.js�ļ���Ȼ��ʹ��{pt.getad.powerwin}��ҳ���е���
        </table>
        
        
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>