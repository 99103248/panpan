<?php
include 'conn.php';
include_once '../data/config.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

if (isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    $msg="0|�༭ʧ�ܣ��޷���ȡ����id";
    $url='ad_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
}
//�������ݿ�
include '../data/ad/'.$id.'.php';



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
	<p>����ǰλ�ã� ϵͳ���� &raquo; ��������</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>���༭</span></li>
        <li><a href="ad_add.php">��ӹ��</a></li>
        <li><a href="ad_list.php">����б�</a></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">		
        <li>���ô���Ϊ<strong>{pt.getad.�����}</strong></li>
		<li>���޸����ҳ����λԤ��û�б仯���������ϵġ�ˢ��ҳ�桱��ťǿ��ˢ��һ�£�</li>
	</ul>
</div>
<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <table width="100%" cellspacing="0" class="dataTable" summary="������ʾ��">
            <thead>
        		<tr>
				  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        		  <th>�����</th>
        		  <th><label for="idAll">�������</label></th>
        		  <th>����С</th>
        		  <th>������</th>       		  
                  
        		  <th>����</th>
        		</tr>
        	</thead>
			<tfoot>
        		<tr>
      		        <th colspan="7">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </th>        		  
        		</tr>
        	</tfoot>
            <tbody>
        		<tr class="tatr2">
        		  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				  <td><?php echo $adid?></a></td>
        		  <td><label for="item_2"><?php echo $adname?></label></td>
        		  <td><?php echo $adsize?></a></td>
        		  <td><input class="daima" onclick="oCopy(this)" value="{pt.getad.<?php echo $adid;?>}" readonly="readonly"/> <b>(�����ɫ�����Զ�����)</b></td>        		  
                  
        		  <td class="handler">
                    <ul id="handler_icon">
						<li><a class="btn_browse" href="ad_view.php?id=<?php echo $adid?>" title="Ԥ��">Ԥ��</a></li>
                        <li><a class="btn_edit" href="ad_edit.php?id=<?php echo $adid?>" title="�༭">�༭</a></li>
						<li><a class="btn_delete" href="?do=del&id=<?php echo $adid?>" title="ɾ��">ɾ��</a></li>                        
                    </ul>
                  </td>		
                </tr>
                <tr class="tatr2" height="110">
				  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				  <td>���Ԥ��</td>
				  <td colspan="5">
						<script src="<?php  echo PT_SITEURL.'files/'.PT_ADDIR.$adid.'.js' ;?>" type="text/javascript" language="javascript"></script>
				  </td>
				</tr>
        	</tbody>
        </table>
		<div id="dataFuncs" title="������">
            <div class="left paddingT15" id="batchAction">
              <input type="submit" name="save" value="�����б�" class="formbtn batchButton"/>
            </div>            
            <div class="clear"></div>
        </div>    	
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PTС͵ (PTcms.COM) </a> . All Rights Reserved . ԥICP��10008179�� . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>