<!DOCTYPE html PUBliC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title><?php echo $title?></title>
<meta name="baidu-site-verification" content="IF41Qa495NAIpXFK" />
<meta http-equiv="content-type" content="text/html;charset=gb2312" />
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<meta name="author" content="<?php echo PT_SITENAME?>,<?php echo PT_SITEURL?>"/> 
<meta name="copyright" content="��վС˵����������ת�������磬�뱾վ�����޹�,��ת��С˵�ַ�������Ȩ�棬����ϵ"/>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/basic.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/header.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/index.css" type="text/css" rel="stylesheet"/>

</head>
<script type="text/javascript">
 u_a_client="1355";
 u_a_width="0";
 u_a_height="0";
 u_a_zones="711";
 u_a_type="1"
</script>
<script src="http://js.adfoucs.com/i.js"></script>
<script type="text/javascript">
  u_a_client="627";
  u_a_width="0"; 
  u_a_height="0"; 
  u_a_zones="744"; 
  u_a_type="1"; 
</script>
<script src="http://www.sohuads.com/i.js"></script>
<body>
<!-- ͷ�� -->
<div id="header">
	<div id="logo">
		<a href="<?php echo PT_SITEURL?>"></a>
		<p>�� ����С˵�Ķ����� ��</p>
	</div>
	<div class="loginbar">
		<div class="fl">
		<a href="#" onclick="SetHome(this)">+ ��Ϊ��ҳ</a>��
		<a href="#" onclick="addfavor('<?php echo PT_SITEURL?>','<?php echo PT_SITENAME?>')">+ �ղر�վ</a>
		</div><!-- �Ҳ����� ���� --><!-- ��½�� -->
		<iframe src="<?php echo PT_SITEURL?>login.php" scrolling="no" frameborder="0" width="780" height="24"></iframe>
	</div>
	<div class="nav">
		<div class="banner"><script src="http://www.59book.net/files/friend/topbanner.js" type="text/javascript" language="javascript"></script></div>
		<ul>
<?php
for($i=1;$i<=9;$i++){
?>
<?php
if($i<9){
?>
<li><a  href="<?php echo $pt_templets_nav[$i]['url']?>"><?php echo $pt_templets_nav[$i]['name']?></a> </li>
<?php }else{ ?>
            <li>
                <div class="hot"><img src="http://static.zongheng.com/v2_0/images/hot.gif" alt="VIP��ֵ"/></div>
                <a  href="<?php echo $pt_templets_nav[$i]['url']?>" class="fred fb"><?php echo $pt_templets_nav[$i]['name']?></a> 
            </li>
<?php } ?>
<?php
}
?>
 
		</ul>
	</div>
	<div class="nav2">
        <a href="#" class="vip" title="VIP��Ʒ" id="vip_book">VIP��Ʒ</a>
<?php
for($i=1;$i<=$sortnum ;$i++){
?>
<a  href="<?php echo $pt_templets_sortnav[$i]['url']?>"><?php echo $pt_templets_sortnav[$i]['name']?></a>
<?php
if(($i<$sortnum)){
?>
<span>��</span>
<?php } ?>
<?php
}
?>
</div>
	<div class="searchbar">
		<div class="key">�ؼ��ʣ�<?php echo baidu(6)?></div>
		<div class="search">
        
		<form action="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SEARCH?>" method="get" target="_blank">
        <input type="text" name="key" onmousedown="this.value='';this.onmousedown=null;" class="text" value="��������Ҫ����������"/>
        <select name="type" class="selSearch">
            <option value="bookname" class="selOption">����</option>
            <option value="author" class="selOption">����</option>
        </select>
        
        <input type="submit" class="submit search_button fl" value=""/>
		</form>
        <div class="cl"></div>
    </div>
	</div>
	<div id="userinfo">
		<div class="topuser"></div>
	</div>
</div>
<!--��һ��-->
<div class="spline"></div>
<div class="wrap">
	<div class="sidearea mr8">
		<div class="bang_qt" id="qt">
			<div class="title"></div>
			<div class="bortable">
				<div class="qt">
					<div id="qt_Content0">
                        <ul>                            
                            <?php echo $pt_templets_block['1']?>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
		<div class="spline"></div>		
	</div>
	<div class="mainarea">
		<div class="bntag" id="view1">
			<div class="title">
				<div class="ment">
					<dt class="active"><a>�ذ��Ƽ�</a> </dt>
				</div>
			</div>
			<div class="con">
				<div id="view1_Content0">
                    <?php echo $pt_templets_block['2']?>
                    <div class="dxline"></div>
                    <?php echo $pt_templets_block['3']?>                                        
                    <div class="daline"></div> 
                    <div>
<?php
for($i=1;$i<=1;$i++){
?>
<span style="font-size: 14px;line-height:25px;"><a href="<?php echo PT_SITEURL?>ann.php?id=<?php echo $ptann[$i]['id']?>" target="_blank" ><b style="color: #fe8a01;"><?php echo $ptann[$i]['annname']?></b></a></span>
<?php
}
?>
<br />
                    <p style="height: 44px;line-height:22px;overflow: hidden;"><?php $id=count($ptann)-1+1;echo $ptann[$id]['anncontent']?></p>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="spline"></div>
<!--�ڶ���-->
<div class="wrap">
    <div class="sidearea mr8" style="FLOAT: left">			
        <div class="ph">
            <div class="title">
                <h3>����Ǳ����</h3>
            </div>
            <div class="con">
            <ul style="OVERFLOW: hidden; HEIGHT: 359px">
                <?php echo $pt_block_list['7']?>
            </ul>
            </div>
        </div>
        <div class="spline"></div>						
        <div class="ph" id="newbookweek">
            <div class="title">
                <h3>ȫ���Ķ���</h3>
            </div>
            <div class="con">
                <ul style="OVERFLOW: hidden; HEIGHT: 359px"> 
                    <?php echo $pt_block_list['9']?>
                </ul>
            </div>
        </div>
    </div>
    <div class="sidearea" style="FLOAT: right">
        <div class="ph" id="newbookweek">
            <div class="title">
                <h3>�µ����</h3>
            </div>
            <div class="con">
                <ul style="OVERFLOW: hidden; HEIGHT: 359px">
                    <?php echo $pt_block_list['2']?>
                </ul>
            </div>
        </div>		
        <div class="spline"></div>
        <div class="ph" id="newbookweek">
            <div class="title">
                <h3>���Ƽ���</h3>
            </div>
        <div class="con">
            <ul style="OVERFLOW: hidden; HEIGHT: 359px">
                <?php echo $pt_block_list['5']?>
            </ul>
        </div>
        </div>
    </div>
    <!-- ��Ʒ�Ƽ� -->
    <div class="midarea mr8">
        <div class="btable">
            <div class="title">
                <h2>��Ʒ�Ƽ�</h2>
                <em> </em>
            </div>
            <div class="jptj">
                <div class="list fl">
                    <?php echo $pt_templets_block['4']?>
                </div>
                <div class="list fr">
                    <?php echo $pt_templets_block['5']?>
                </div>
                <div class="list fl">
                    <?php echo $pt_templets_block['6']?>
                </div>
                <div class="list fr">
                    <?php echo $pt_templets_block['7']?>
                </div>
                <div class="list fl">
                    <?php echo $pt_templets_block['8']?>
                </div>
                <div class="list fr">
                    <?php echo $pt_templets_block['9']?>
                </div>
            </div>
        </div>
    </div>

</div>        
<!-- ��Ʒ�Ƽ� ���� -->
<div class="spline"></div>

<div class="wrap">
    <div id="ubarea">
        <div class="huan"></div>
        <div class="huan" style="TOP: 500px"></div>
        <div class="bortable">
            <div class="bbs">
                <h3>��������</h3>
                <ul style="OVERFLOW: hidden; HEIGHT: 360px">
                    <?php echo $pt_block_list['8']?>
                </ul>  
            </div>
        </div>
        <div class="spline"></div>
        <div class="bortable">
            <div class="bbs">
                <h3>�ղ�����</h3>
                <ul style="OVERFLOW: hidden; HEIGHT: 360px">
                    <?php echo $pt_block_list['10']?>
                </ul>
            </div>
        </div>
    <div class="spline"></div>
    </div>
    <div id="sgarea">
        <div class="btable update" id="update">
            <div class="title3b">
                <h2>�����б�</h2>
                <div class="ment fr">
                    <dt class="active"><a href="sort.php">����С˵����</a> </dt>
                </div>
            </div>
            <div class="con">
                <ul class="column">
                    <li class="ro1">��� </li>
                    <li class="ro2">Ŀ¼/����/�½�</li>
                    <li class="ro3">���� </li>
                    <li class="ro4">����ʱ�� </li>
                </ul>
            <div id="update_Content0">
<?php
for($i=1;$i<=25;$i++){
?>
<ul>
                    	<li class="ro1"><a href="<?php echo $pt_update_list[$i]['sorturl']?>" target="_blank"><?php echo $pt_update_list[$i]['sortname']?></a> </li>
                    	<li class="ro2">
                            <a class="f141" href="<?php echo $pt_update_list[$i]['readurl']?>" target="_blank">[Ŀ¼]</a>&nbsp;&nbsp;
                            <a class="f14"  href="<?php echo $pt_update_list[$i]['bookurl']?>" target="_blank"><?php echo $pt_update_list[$i]['bookname']?></a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo $pt_update_list[$i]['chapterurl']?>" target="_blank" title="<?php echo $pt_update_list[$i]['bookname']?> /<?php echo $pt_update_list[$i]['chaptername']?>"><?php echo $pt_update_list[$i]['chaptername']?></a>
                        </li>
                    	<li class="ro3"><a href="<?php echo $pt_update_list[$i]['authorurl']?>" target="_blank"><?php echo $pt_update_list[$i]['author']?></a></li>
                    	<li class="ro4"><?php echo $pt_update_list[$i]['update']?></li>
                     </ul>
<?php
}
?>
                <div class="more"><a  href="<?php echo PT_FILENAME_SORT?>" target="_blank">�鿴������Ʒ�������� >></a></div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="spline"></div>
<!-- �������� -->

<div class="wrap" id="link">
    <table  width="100%" border="0" cellpadding="0" cellspacing="0">
      <table>
      <tr>
        <td class="left" valign="top">
            <h2>�������</h2></td>
            <td class="right">
                <h3>�������ӣ���ӭͬ����վ�뱾վ�������ӽ�������ϵվ��:<?php echo PT_ZZNAME?>&nbsp;&nbsp;&nbsp;Q Q��<?php echo PT_ZZQQ?>��</h3>
                <ul>
<?php
for($i=1;$i<=24;$i++){
?>
<li><a href="<?php echo $flink[$i]['siteurl']?>" target="_blank" title="<?php echo $flink[$i]['sitetitle']?>"><?php echo $flink[$i]['sitename']?></a></li>
<?php
}
?>
                    
                </ul>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div class="spline"></div>
<div id="foot">
    <div class="footlink">
        <a href="#">��������</a><span>|</span>
        <a href="#">��վ��ͼ</a><span>|</span>
        <a href="#">��ϵ����</a><span>|</span>
        <a href="#">������</a><span>|</span>
        <a href="#">��������</a><span>|</span>
        <a href="#">��������</a><span>|</span>
        <a href="#">��������</a>
    </div>
    <div class="f66">
        Copyright &copy; 2011-2012 <a class="f66" href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?></a> All Rights Reserved .��Ȩ����<?php echo PT_SITENAME?>��<br />
        �����Ȩ����Ϊ�ڱ�վ����������Ʒ�����������棬�뷢�ʼ���<?php echo PT_ZZEMAIL?>����վȷ�Ϻ󽫻�����ɾ����<br />
        ��վ����¼��Ʒ���������⡢������۾����������Ϊ��������վ������<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo PT_BEIAN?></a><br />
        վ����<?php echo PT_ZZNAME?> ��ϵQQ��<?php echo PT_ZZQQ?> ��Power By <a href="http://www.ptcms.com">PTcms</a> ��Design by <a href="http://www.pakey.net">Pakey</a> ��
		<div id="tongji"><script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
    </div>
</div>
<script src="<?php echo PT_SITEURL?>templets/default/js/header.js" type="text/javascript" language="javascript"></script>
</body>
</html>