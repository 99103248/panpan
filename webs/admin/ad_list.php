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
$dir_name=PT_DIR."data/ad";
$od = opendir($dir_name);
while ($name = readdir($od)){
    $file_path = $dir_name.'/'.$name;
    if (is_file($file_path) and $name!='powerwin.php'){
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
	$url='ad_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}

if (isset($_POST["reset"])){
    foreach ($_POST['id'] as $value){
        $adid = $value;
        include '../data/ad/'.$adid.'.php';
        $jsadcode=htmltojs(addslashes($adcode));
        $result=$pt->writeto(PT_DIR.'files/'.PT_ADDIR.$adid.'.js',$jsadcode); 
    }
    if ($result){
        $msg="1|��ϲ�����ؽ��ɹ�";
    }else{
        $msg="0|���ź����ؽ�ʧ��";
    }
	$url='ad_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}

if (isset($_GET['do']) and $_GET['do']=="del" and $_GET['id']>0){
    $id=$_GET['id'];
    $result=unlink($files[$id]);
    
    if ($result){
        $msg="1|��ϲ����ɾ���ɹ�";
    }else{
        $msg="0|���ź���ɾ��ʧ��";
    }
	$url='ad_list.php';
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
.daima {
	FONT-SIZE: 10px; BACKGROUND: none transparent scroll repeat 0% 0%; OVERFLOW: hidden; WIDTH: 120px; COLOR: blue; BORDER-TOP-STYLE: none; LINE-HEIGHT: 20px; BORDER-BOTTOM: #ccc 1px solid; FONT-FAMILY: Verdana; BORDER-RIGHT-STYLE: none; BORDER-LEFT-STYLE: none; HEIGHT: 18px;text-align:center;
}
</style>
<script type="text/javascript">


function oCopy(obj){
obj.select();
js=obj.createTextRange();
js.execCommand("Copy");
alert("���ô��븴�Ƴɹ�,�뵽���ʵ�λ�ð� Ctrl+V ճ������ O(��_��)O");
}

</script>
</head>
<body>
<div id="currentPosition">
	<p>����ǰλ�ã� ϵͳ���� &raquo; ������</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>����б�</span></li>
        <li><a href="ad_add.php">��ӹ��</a></li>        
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>����ɾ��Ҫ����ǰ�渴ѡ��ѡ���ڵ������ɾ��</li>
        <li>���ô���Ϊ<strong>{pt.getad.����ʶ}</strong></li>
        <li>�ؽ��������Ϊ�ؽ����ľ�̬js�ļ�</li>
	</ul>
</div>

<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>
        		  <th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="ptCheckAll(this,'id[]');" title="ȫѡ/ȫ��ѡ"></th>
        		  <th><label for="idAll">�������</label></th>
        		  <th>����С</th>
        		  <th>������</th>                  
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
        		  <td class="firstCell"><input type="checkbox" name="id[]" value="<?php echo $adid?>" onclick="pbCheckItem(this,'idAll');" id="item_2" title="2" /></td>
        		  <td><label for="item_2"><?php echo $adname?></label></td>
        		  <td><?php echo $adsize?></a></td>
        		  <td><input class="daima" onclick="oCopy(this)" value="{pt.getad.<?php echo $adid;?>}" readonly="readonly"/> <b>(�����ɫ�����Զ�����)</b></td>        		  
                  
        		  <td class="handler">
                    <ul id="handler_icon">
                        <li><a class="btn_browse" href="ad_view.php?id=<?php echo $adid?>" title="Ԥ��">Ԥ��</a></li>
                        <li><a class="btn_edit" href="ad_edit.php?id=<?php echo $adid?>" title="�༭">�༭</a></li>
                        <li><a class="btn_delete" href="?do=del&id=<?php echo $i?>" title="ɾ��">ɾ��</a></li>                        
                    </ul>
                  </td>		
                </tr>
                <?php 
                    }
                    }else{
                        echo '<tr class="tatr2">
                        <td class="firstCell"></td>
                        <td colspan="6">��ʱû�й������</td>
                        </tr>';
                    }
                ?>        		
        	</tbody>
        </table>
    	<div id="dataFuncs" title="������">
            <div class="left paddingT15" id="batchAction">
              <input type="submit" name="del" value="ɾ��ѡ��" class="formbtn batchButton"/>
              <input type="submit" name="reset" value="�ؽ����" class="formbtn batchButton"/>
            </div>
            
            <div class="clear"></div>
        </div>
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>