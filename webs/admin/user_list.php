<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname'] == $adminname and $_SESSION['adminpwd'] ==
    $adminpwd) {

} else {
    echo "<script>location.href='login.php';</script>";
    exit();
}

if (isset($_POST["delall"])){
    foreach ($_POST['id'] as $value){           
        removedir(PT_DIR.'data/user/'.$value);
    }
    $msg="1|��ϲ����ɾ���ɹ�";
	$url='user_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}

if (isset($_GET['do']) and $_GET['do']=="del" and $_GET['username']!=''){
    removedir(PT_DIR.'data/user/'.$_GET['username']);
    $msg="1|��ϲ����ɾ���ɹ�";
	$url='user_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}

$usernum=0;
$directory=PT_DIR.'data/user';
$mydir = dir($directory);
while ($file = $mydir->read()) {
    if ((is_dir("$directory/$file")) and ($file != ".") and ($file != "..")) {
		$usernamelist[]=$file;
    }
}
$mydir->close();
$usernum=count($usernamelist);

//ҳ����ʾ����
if (isset($_GET['pagenum'])){
    $pagenum=$_GET['pagenum'];
}else{
    $pagenum=20;
}
//�ڵڼ�ҳ
if (isset($_GET['page'])){
    $page=$_GET['page'];   
}else{    
    $page=1;
}
$num=$usernum;
$pagesize=floor($num/$pagenum)+1;
if (($pagesize-1)*$pagenum>=$num){
	$pagesize=$pagesize-1;
}
//�б���ֹ
$pagestart=$page-2;
if ($pagestart<1){
    $pagestart=1;
}
$pageend=$pagestart+4;
if ($pageend>$pagesize){
    $pageend=$pagesize;
    $pagestart=$pageend-4;
    if ($pagestart<1){
        $pagestart=1;
    }
}

//�ӵڼ�����ʼ
$pagenumstart=($page-1)*$pagenum;



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
		<li><span>�û��б�</span></li>                
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>Ĭ��ÿҳ��ʾ20������</li>
        <li>����û���ֱ�ӱ༭�û�����</li>
        <li>����û�����ֱ�ӱ༭�û�����</li>        
	</ul>
</div>
<div class="mrightTop"> 
    <div class="fontr"> 
        <form name="search_frm" id="SearchFrm" method="get"> 
            <input type="hidden" name="page" value="<?php echo $page?>" />
             <div>                
			    <select class="querySelect" name="pagenum">
				<option value="5">ÿҳ��ʾ����</option>
				<option value="10" >ÿҳ��ʾ10</option>
				<option value="20" >ÿҳ��ʾ20</option>
				<option value="30" >ÿҳ��ʾ30</option>
				</select>
                <input type="submit" class="formbtn" value="��ѯ" /> 
            </div> 
        </form> 
    </div> 
    <div class="fontr"></div> 
</div> 
<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>
        		  <th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="ptCheckAll(this,'id[]');" title="ȫѡ/ȫ��ѡ"></th>
        		  <th><label for="idAll">�û���</label></th>
        		  <th>��ϵQQ</th>
        		  <th>�û�����</th>        		  
                  <th>����¼ʱ��</th>
        		  <th>����</th>
        		</tr>
        	</thead>
            <tfoot>
        		<tr>
      		        <th colspan="6">
                        <div class="pageLinks">
                            <div class="pagination2">
                                ���� <?php echo $usernum;?> λ��Ա��ÿҳ <?php echo $pagenum;?> λ����ǰ�� <?php echo $page;?> ҳ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='?page=1&pagenum=<?php echo $pagenum?>'>��ҳ</a>
                                <?php
                                    for($i=$pagestart;$i<=$pageend;$i++){
                                        if ($i==$page){
                                            echo "<span class='current'>$i</span>\n";
                                        }else{
                                            echo "<a href='?page=$i&pagenum=$pagenum'>$i</a>\n";
                                        }
                                    }
                                ?>
                                <a href='?page=<?php echo $pagesize;?>&pagenum=<?php echo $pagenum?>'>βҳ</a>
                            </div>
                        </div>
                    </th>        		  
        		</tr>
        	</tfoot>
            <tbody>
                <?php 
                    if ($pagenum>$num){
						$fornum=$num;
					}else{
						$fornum=$pagenum;
					}
                    if (isset($usernamelist)){
                    for ($i=0;$i<$fornum;$i++){
                        $userfilenum=$i+$pagenumstart;
                        
                        $userfile = PT_DIR . 'data/user/' . $usernamelist[$userfilenum] . '/info.php';
                        if (file_exists($userfile)) {
                            include $userfile;
                            include PT_DIR . 'data/user/' . $usernamelist[$userfilenum] . '/point.php';
                            include PT_DIR . 'data/user/' . $usernamelist[$userfilenum] . '/log.php';
                        }else{
                            continue;
                        } 
                ?>
        		<tr class="tatr2">
        		  <td class="firstCell"><input type="checkbox" name="id[]" value="<?php echo $usernamelist[$userfilenum]?>" onclick="pbCheckItem(this,'idAll');" id="item_2" title="2" /></td>
        		  <td><a href="user_edit.php?username=<?php echo $usernamelist[$userfilenum]?>"><?php echo $usernamelist[$userfilenum]?></a></td>
        		  <td><?php echo $qq?></a></td>
        		  <td><a href="user_point.php?username=<?php echo $usernamelist[$userfilenum]?>"><?php echo $userpoint ?></a></td>        		  
                  <td><?php echo $logtime?></td>
        		  <td class="handler">
                    <ul id="handler_icon">
                        <li><a class="btn_edit" href="user_edit.php?username=<?php echo $usernamelist[$userfilenum]?>" title="�༭">�༭</a></li>
                        <li><a class="btn_delete" href="?do=del&username=<?php echo $usernamelist[$userfilenum]?>" title="ɾ��">ɾ��</a></li>
                    </ul>
                  </td>		
                </tr>
                <?php 
                    }   
                    }else{
                         echo '<tr class="tatr2">
                        <td class="firstCell"></td>
                        <td colspan="6">��ʱû���û�����</td>
                        </tr>';
                    }                 
                ?>        		
        	</tbody>
        </table>
    	<div id="dataFuncs" title="������">
            <div class="left paddingT15" id="batchAction">
               <input type="submit" name="delall" value="ɾ��ѡ��" class="formbtn batchButton"/>
            </div>            
            <div class="clear"></div>
        </div>
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>