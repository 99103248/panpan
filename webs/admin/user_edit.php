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

    $username = $_POST['username'];
    $file = '../data/user/' . $username . '/info.php';
    include $file;
    if ($password == $_POST['password_new']) {
        $_POST['password'] = $_POST['password_new'];
        unset($_POST['password_new']);
    } else {
        $_POST['password'] = md5($_POST['password_new']);
        unset($_POST['password_new']);
    }

    //д��������Ϣ
    if (file_exists($file)) {
        $str = '<?php' . "\n";
        foreach ($_POST as $key => $value) {
            $str .= "\$$key='$value';\n";
        }
        $str .= "?>";
        $result = $pt->writeto($file, $str);


        $msg = "1|��ϲ�����༭�û��ɹ�";
        $url = 'user_edit.php';
        echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
        exit();
    }
}

$usernum=0;
$directory=PT_DIR.'data/user';
$mydir = dir($directory);
while ($file = $mydir->read()) {
    if ((is_dir("$directory/$file")) and ($file != ".") and ($file != "..")) {
        $usernum++;
    }
}
$mydir->close();
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
		<li><span>�༭�û�(��ǰ�����û�����<?php echo $usernum?>��)</span></li>
	</ul>
</div>
<div class="info" >
    <?php
if (isset($_GET['username'])) {
    $userfile = PT_DIR . 'data/user/' . $_GET['username'] . '/info.php';
    if (file_exists($userfile)) {
        include $userfile;
    } else {
        $msg = "0|�û�������";
        $url = 'user_edit.php';
        echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
        exit();
    }
?>      
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">          
            <tr>
                <th class="paddingT15"><label for="time_zone"> �û�����</label></th>
                <td class="paddingT15 wordSpacing5">
                    <input name="username" type="text" value="<?php echo $username ?>" class="infoTableInput" readonly='readonly'/>
                </td>
            </tr>          
            <tr>
              <th class="paddingT15">���룺</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="password_new" type="password" value="<?php echo
    $password ?>" />              
            </tr>
            <tr>
              <th class="paddingT15">E-mail��</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="email" type="text"   value="<?php echo
        $email ?>" />
              </td>
            </tr>
            <tr>
              <th class="paddingT15">QQ���룺</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="qq" type="text"    value="<?php echo
        $qq ?>" />
              </td>
            </tr>
            <tr>
                <th class="paddingT15">������</th>
                <td class="paddingT15 wordSpacing5"><input class="infoTableInput" type="text" name="turename" value="<?php echo
        $turename ?>"  class=""  /> </td>
            </tr>
            <tr>
                <th class="paddingT15">�Ա�</th>
                <td class="paddingT15 wordSpacing5"><input class="infoTableInput" type="text" name="sex" value="<?php echo
        $sex ?>"  class=""  /></td>
            </tr>
            <tr>
                <th class="paddingT15">���գ�</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" type="text" name="birthday" id="birthday" value="<?php echo $birthday ?>" />
					<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL;?>templets/user/css/calendar.css"/>
					<script type="text/javascript" src="<?php echo PT_SITEURL;?>templets/user/js/calendar.js"></script>
               </td>
            </tr>
            <tr>
                <th class="paddingT15">ͷ��</th>
                <td class="paddingT15 wordSpacing5"><input class="infoTableInput"  type="text" name="userimg" value="<?php echo
        $userimg ?>" /> <a href='javascript:///' onclick="window.open('<?php echo
        PT_SITEURL; ?>user/face.html','chooseface','left=190px,top=110px,Width=537px,Height=425px,resizable=no,scrolls=no')">ѡ��ͷ��</a></td>
            </tr>
            <tr>
                <th class="paddingT15">���ԣ�</th>
                <td class="paddingT15 wordSpacing5"><input type="text" name="usercity" value="<?php echo
    $usercity ?>" class="infoTableInput" /> </td>
                    
            </tr>
            <tr>
                <th class="paddingT15">�绰��</th>
                <td class="paddingT15 wordSpacing5"><input type="text" name="telephone" value="<?php echo
        $telephone ?>" size="20" class="infoTableInput" /> </td>
            </tr>
            <tr>
                <th class="paddingT15">MSN��</th>
                <td class="paddingT15 wordSpacing5"><input type="text" name="msn" value="<?php echo
        $msn ?>" class="infoTableInput" /> </td>
            </tr>
            <tr>
                <th class="paddingT15">������ҳ��</th>
                <td class="paddingT15 wordSpacing5"><input type="text" name="myurl"  value="<?php echo
        $myurl ?>" class="infoTableInput" /> </td>
            </tr>
             <tr>
                <th class="paddingT15">ע�����ڣ�</th>
                <td class="paddingT15 wordSpacing5"><input type="text" name="regdate"  value="<?php echo
        $regdate ?>" class="infoTableInput" /> </td>
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
   <?php
} else {
?>
   <form method="get" >  
        <table class="infoTable" id="rightTop_Content1">          
            <tr>
                <th class="paddingT15"><label for="time_zone"> �û�����</label></th>
                <td class="paddingT15 wordSpacing5">
                    <input name="username" type="text" value="" class="infoTableInput" />
                </td>
            </tr>                      
        </table>
       
        
        <table class="infoTable">
          <tr>
            <th class="paddingT15"></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" value="�ύ" />
            </td>
          </tr>
        </table>
  </form>
   <?php
}
?>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>