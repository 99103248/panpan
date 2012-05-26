<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include_once '../data/config.php';
include_once PT_DIR.'inc/array.sort.php';
$dir_name=PT_DIR."data/ann";
$od = opendir($dir_name);
while ($name = readdir($od)){
    $file_path = $dir_name.'/'.$name;
    if (is_file($file_path)){
        $files[] = $file_path;
    }
}
if (isset($_POST["del"])){
    foreach ($_POST['id'] as $value){
        $id = $value;
        $result=unlink($files[$id]);
        
    }
    if ($result){
        $msg="1|��ϲ����ɾ���ɹ�";
    }else{
        $msg="0|���ź���ɾ��ʧ��";
    }
    
    include '../inc/ann.reset.php';
	$url='ann_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}
if (isset($_GET['do']) and $_GET['do']=="del" and $_GET['id']>=0){
    $id=$_GET['id'];
    $result=unlink($files[$id]);
    
    if ($result){
        $msg="1|��ϲ����ɾ���ɹ�";
    }else{
        $msg="0|���ź���ɾ��ʧ��";
    }
    
    include '../inc/ann.reset.php';
	$url='ann_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
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
	<p>����ǰλ�ã� ϵͳ���� &raquo; �������</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>�����б�</span></li>
        <li><a href="ann_add.php">��ӹ���</a></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>����ɾ��Ҫ����ǰ�渴ѡ��ѡ���ڵ������ɾ��</li>
	</ul>
</div>

<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>
        		  <th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="ptCheckAll(this,'id[]');" title="ȫѡ/ȫ��ѡ"></th>
        		  <th><label for="idAll">��������</label></th>
        		  <th>�����</th>
        		  <th>���ʱ��</th>        		  
        		  <th>����</th>
        		</tr>
        	</thead>
            <tbody>
                <?php
                    if (isset($files)){ 
                    for($i=0;$i<count($files);$i++){ 
                        include $files[$i];
                ?>
        		<tr class="tatr2">
        		  <td class="firstCell"><input type="checkbox" name="id[]" value="<?php echo $i?>" onclick="pbCheckItem(this,'idAll');" id="item_<?php echo $i?>" title="<?php echo $i?>" /></td>
        		  <td><label for="item_2"><a href="ann_edit.php?id=<?php echo $i?>"><?php echo $annname?></a></label></td>
        		  <td><?php echo $annwriter?></td>
        		  <td><?php echo $anndate?></td>        		  
        		  <td class="handler">
                    <ul id="handler_icon">
                        <li><a class="btn_delete" href="?do=del&id=<?php echo $i?>" title="ɾ��">ɾ��</a></li>
                        <li><a class="btn_edit" href="ann_edit.php?id=<?php echo $i?>" title="�༭">�༭</a></li>
                    </ul>
                  </td>		
                </tr>
                <?php 
                    }
                    }else{
                        echo '<tr class="tatr2">
                        <td class="firstCell"></td>
                        <td colspan="6">��ʱû�й�������</td>
                        </tr>';
                    }
                ?>        		
        	</tbody>
        </table>
    	<div id="dataFuncs" title="������">
            <div class="left paddingT15" id="batchAction">
              <input type="submit" name="del" value="ɾ��ѡ��" class="formbtn batchButton"/>
            </div>
            
            <div class="clear"></div>
        </div>
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>