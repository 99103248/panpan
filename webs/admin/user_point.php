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
    unset($_POST['username']);
    $file='../data/user/'.$username.'/point.php';
    
    
    //д��������Ϣ
    if (file_exists($file)){                   
        $str='<?php'."\n";
        foreach($_POST as $key => $value){
            $str.="\$$key='$value';\n";
        }
        $str.="?>";        
        $result=$pt->writeto($file,$str);      
    
        $msg = "1|��ϲ�����༭�û����ֳɹ�";
        $url = 'user_point.php';
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
		<li><span>�༭����(��ǰ�����û�����<?php echo $usernum?>��)</span></li>
	</ul>
</div>
<div class="info" >
    <?php
        if (isset($_GET['username'])){
            $userfile=PT_DIR.'data/user/'.$_GET['username'].'/point.php';
            if (file_exists($userfile)){
                include $userfile;
            }else{
                $msg = "0|�û�������";
                $url = 'user_point.php';
                echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
                exit();
            }
    ?>      
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">          
            <tr>
                <th class="paddingT15"><label for="time_zone"> �û�����</label></th>
                <td class="paddingT15 wordSpacing5">
                    <input name="username" type="text" value="<?php echo $_GET['username']?>" class="infoTableInput" readonly='readonly'/>
                </td>
            </tr>          
            <tr>
              <th class="paddingT15">���л��֣�</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="userpoint" type="text" value="<?php echo $userpoint?>" />              
            </tr>            
        </table>
       <input class="infoTableInput" name="userlv" type="hidden" value="<?php echo $userlv?>" />
       <input class="infoTableInput" name="comepoint" type="hidden" value="<?php echo $comepoint?>" />
       <input class="infoTableInput" name="comenum" type="hidden" value="<?php echo $comenum?>" /> 
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
       }else{
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