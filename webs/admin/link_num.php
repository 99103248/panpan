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
$dir_name=PT_DIR."data/link";
$od = opendir($dir_name);
while ($name = readdir($od)){
    $file_path = $dir_name.'/'.$name;
    if (is_file($file_path)){
        $files[] = $file_path;
    }
}

if (isset($_POST["num"])){
    foreach ($_POST['id'] as $value){
        $id = $value;
        include $files[$id];
        $sitenum=$_POST['sitenum'.$id];
        $str="<?php\n";
        $str.="\$sitename=<<<flink\n$sitename\nflink;\n";
        $str.="\$siteurl=<<<flink\n$siteurl\nflink;\n";
        $str.="\$sitelogo=<<<flink\n$sitelogo\nflink;\n";
        $str.="\$sitetitle=<<<flink\n$sitetitle\nflink;\n";
        $str.="\$sitenum=<<<flink\n$sitenum\nflink;\n";        
        $str.="?>";
        $result=$pt->writeto($files[$id],$str);
    }
    if ($result){
        $msg="1|��ϲ�����޸ĳɹ�";
    }else{
        $msg="0|���ź���ɾ��ʧ��";
    }
    
    include '../inc/link.reset.php';
	$url='link_num.php';
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
    
    include '../inc/link.reset.php';
	$url='link_list.php';
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
/*CSS pagination2 style pagination*/

DIV.pagination2 {
	PADDING-RIGHT: 3px; PADDING-LEFT: 3px; FONT-SIZE: 12px; PADDING-BOTTOM: 3px; MARGIN: 3px; PADDING-TOP: 3px; FONT-FAMILY: Verdana,Helvetica,sans-serif; TEXT-ALIGN: center;
}
DIV.pagination2 A {
	BORDER-RIGHT: #ccdbe4 1px solid; PADDING-RIGHT: 8px; BACKGROUND-POSITION: 50% bottom; BORDER-TOP: #ccdbe4 1px solid; PADDING-LEFT: 8px; PADDING-BOTTOM: 2px; BORDER-LEFT: #ccdbe4 1px solid; COLOR: #0061de; MARGIN-RIGHT: 3px; PADDING-TOP: 2px; BORDER-BOTTOM: #ccdbe4 1px solid; TEXT-DECORATION: none
}
DIV.pagination2 A:hover {
	BORDER-RIGHT: #2b55af 1px solid; BORDER-TOP: #2b55af 1px solid; BACKGROUND-IMAGE: none; BORDER-LEFT: #2b55af 1px solid; COLOR: #fff; BORDER-BOTTOM: #2b55af 1px solid; BACKGROUND-COLOR: #3666d4; 
}
DIV.pagination2 A:active {
	BORDER-RIGHT: #2b55af 1px solid; BORDER-TOP: #2b55af 1px solid; BACKGROUND-IMAGE: none; BORDER-LEFT: #2b55af 1px solid; COLOR: #fff; BORDER-BOTTOM: #2b55af 1px solid; BACKGROUND-COLOR: #3666d4
}
DIV.pagination2 SPAN.current {
	PADDING-RIGHT: 6px; PADDING-LEFT: 6px; FONT-WEIGHT: bold; PADDING-BOTTOM: 2px; COLOR: #000; MARGIN-RIGHT: 3px; PADDING-TOP: 2px
}
DIV.pagination2 SPAN.disabled {
	DISPLAY: none
}
DIV.pagination2 A.next {
	BORDER-RIGHT: #ccdbe4 2px solid; BORDER-TOP: #ccdbe4 2px solid; MARGIN: 0px 0px 0px 10px; BORDER-LEFT: #ccdbe4 2px solid; BORDER-BOTTOM: #ccdbe4 2px solid
}
DIV.pagination2 A.next:hover {
	BORDER-RIGHT: #2b55af 2px solid; BORDER-TOP: #2b55af 2px solid; BORDER-LEFT: #2b55af 2px solid; BORDER-BOTTOM: #2b55af 2px solid
}
DIV.pagination2 A.prev {
	BORDER-RIGHT: #ccdbe4 2px solid; BORDER-TOP: #ccdbe4 2px solid; MARGIN: 0px 10px 0px 0px; BORDER-LEFT: #ccdbe4 2px solid; BORDER-BOTTOM: #ccdbe4 2px solid
}
DIV.pagination2 A.prev:hover {
	BORDER-RIGHT: #2b55af 2px solid; BORDER-TOP: #2b55af 2px solid; BORDER-LEFT: #2b55af 2px solid; BORDER-BOTTOM: #2b55af 2px solid
}
</style>

</head>
<body>
<div id="currentPosition">
	<p>����ǰλ�ã� ϵͳ���� &raquo; ��������</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>������������</span></li>
        <li><a href="link_add.php">�������</a></li>
        <li><a href="link_list.php">�������</a></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>������ʾ��������������У�������ԽС����Խ��ǰ</li>
        <li>�����޸�˳��ÿһ����Ҫ�޸�����Ҫ�ڵ�����ǰ��ѡ����</li>
        <li>ֻ�޸�һ������ֱ�ӵ�����Ӻ���ı༭��ť�����޸�</li>
	</ul>
</div>

<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>
        		  <th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="ptCheckAll(this,'id[]');" title="ȫѡ/ȫ��ѡ"></th>
        		  <th><label for="idAll">��������</label></th>
        		  <th>���ӵ�ַ</th>
        		  <th>LogoͼƬ</th>
        		  <th>��ʾ˳��</th>                  
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
        		  <td><label for="item_2"><?php echo $sitename?></label></td>
        		  <td><a href="<?php echo $siteurl?>" target="_blank" title="<?php echo $sitetitle?>"><?php echo $siteurl?></a></td>
        		  <td><?php if ($sitelogo!=""){echo '<img src="'.$sitelogo.'" width="88" height="31"/>';} ?></td>
        		  <td><input name="sitenum<?php echo $i?>" value="<?php echo $sitenum?>" size="4"/></td>                  
        		  <td class="handler">
                    <ul id="handler_icon">
                        <li><a class="btn_delete" href="?do=del&id=<?php echo $i?>" title="ɾ��">ɾ��</a></li>
                        <li><a class="btn_edit" href="link_edit.php?id=<?php echo $i?>" title="�༭">�༭</a></li>
                    </ul>
                  </td>		
                </tr>
                <?php 
                    }
                    }else{
                        echo '<tr class="tatr2">
                        <td class="firstCell"></td>
                        <td colspan="6">��ʱû����������</td>
                        </tr>';
                    }
                ?> 
                     		
        	</tbody>
        </table>
    	<div id="dataFuncs" title="������">
            <div class="left paddingT15" id="batchAction">
              <input type="submit" name="num" value="��������" class="formbtn batchButton"/>
            </div>
            
            <div class="clear"></div>
        </div>
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>