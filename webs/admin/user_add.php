<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname'] == $adminname and $_SESSION['adminpwd'] ==
    $adminpwd) {

} else {
    echo "<script>location.href='login.php';</script>";
    exit();
}
if (isset($_POST["save"])) {
    unset($_POST['save']);
    $username=$_POST['username'];
    $_POST['password']=md5($_POST['password']);
    //д��������Ϣ
    if (file_exists('../data/user/'.$username.'/info.php')){
        $msg = "0|�û��Ѿ�����";
        $url = 'user_add.php';
        echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
        exit();
    }else{            
        $str='<?php'."\n";
        foreach($_POST as $key => $value){
            $str.="\$$key='$value';\n";
        }
        $str.="\$regdate='".date("Y-m-d",time())."';\n";
        $str.="?>";
        $file='../data/user/'.$username.'/info.php';
        $result=$pt->writeto($file,$str);
        //������½��־
        $str='<?php'."\n";
        $str.="\$logtime='".date("Y-m-d H:i:s")."';\n";
        $str.="\$logip='".$_SERVER["REMOTE_ADDR"]."';\n";
        $str.="?>";
        $file='../data/user/'.$username.'/log.php';
        $result=$pt->writeto($file,$str);
        //���������ĵ�
        $str="<?php\n";
        $str.='$userlv="1"'.";\r\n";
        $str.='$userpoint="'.$pt_user_regpoint.'"'.";\r\n";
        $str.='$comepoint="0"'.";\r\n";
        $str.='$comenum="0"'.";\r\n";
        $str.='?>';
        $file='../data/user/'.$username.'/point.php';
        $result=$pt->writeto($file,$str);
        //����pm�ĵ�
        $file='../data/user/'.$username.'/pm.php';
        $result=$pt->writeto($file,"");
        //���������ĵ�
        $file='../data/user/'.$username.'/friend.php';
        $result=$pt->writeto($file,"");
        //��������ĵ�
        $str="<?php\n";
        for ($i=1;$i<=10;$i++){
            $str.="\$markname['$i']='�ҵ����$i';\n";
            $str.="\$markbook['$i']='';\n";
        }
        $str.='?>';
        $file='../data/user/'.$username.'/mark.php';
        $result=$pt->writeto($file,$str);
    
        $msg = "1|��ϲ��������û��ɹ�";
        $url = 'user_add.php';
        echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
        exit();
    }
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
		<li><span>����û�</span></li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">          
            <tr>
                <th class="paddingT15"><label for="time_zone"> �û�����</label></th>
                <td class="paddingT15 wordSpacing5">
                    <input name="username" type="text" value="" class="infoTableInput" />
                </td>
            </tr>          
            <tr>
              <th class="paddingT15">���룺</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="password" type="text"   value="123456" />
              <span>Ĭ������Ϊ123456</span>
            </tr>
            <tr>
              <th class="paddingT15">E-mail��</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="email" type="text"   value="" />
              </td>
            </tr>
            <tr>
              <th class="paddingT15">QQ���룺</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="qq" type="text"    value="" />
              </td>
            </tr>
            <tr>
                <th class="paddingT15">������</th>
                <td class="paddingT15 wordSpacing5"><input class="infoTableInput" type="text" name="turename" value=""  class=""  /> </td>
            </tr>
            <tr>
                <th class="paddingT15">�Ա�</th>
                <td class="paddingT15 wordSpacing5"><span style="width:80px"><label><input type="radio" name="sex"  value="��" style="border:0px"   checked="checked" /> ��</label></span> <span style="width:80px"><label><input type="radio" name="sex" value="Ů" style="border:0px"   /> Ů</label></span> </td>
            </tr>
            <tr>
                <th class="paddingT15">���գ�</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" type="text" name="birthday" id="birthday" value="" />
					<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL;?>templets/user/css/calendar.css"/>
					<script type="text/javascript" src="<?php echo PT_SITEURL;?>templets/user/js/calendar.js"></script>
               </td>
            </tr>
            <tr>
                <th class="paddingT15">ͷ��</th>
                <td class="paddingT15 wordSpacing5"><input class="infoTableInput"  type="text" name="userimg" value="../images/face/01.gif" /> <a href='javascript:///' onclick="window.open('<?php echo PT_SITEURL;?>user/face.html','chooseface','left=190px,top=110px,Width=537px,Height=425px,resizable=no,scrolls=no')">ѡ��ͷ��</a></td>
            </tr>
            <tr>
            <th class="paddingT15">���ԣ�</th>
                    <td class="paddingT15 wordSpacing5">
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
            <tr>
            <th class="paddingT15">�绰��</th><td class="paddingT15 wordSpacing5"><input type="text" name="telephone" value="" size="20" class="infoTableInput" /> </td>
            </tr>
            <tr>
            <th class="paddingT15">MSN��</th><td class="paddingT15 wordSpacing5"><input type="text" name="msn" value="" class="infoTableInput" /> </td>
            </tr>
            <tr>
            <th class="paddingT15">������ҳ��</th><td class="paddingT15 wordSpacing5"><input type="text" name="myurl"  value="" class="infoTableInput" /> </td>
            </tr>
        </table>
        <table class="infoTable">
          <tr>
            <th class="paddingT15"></th>
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