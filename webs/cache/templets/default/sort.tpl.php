<!DOCTYPE html PUBliC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title><?php echo $title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<meta name="author" content="<?php echo PT_SITENAME?>,<?php echo PT_SITEURL?>"/> 
<meta name="copyright" content="��վС˵����������ת�������磬�뱾վ�����޹�,��ת��С˵�ַ�������Ȩ�棬����ϵ"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/basic.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/header.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/book.css" type="text/css" rel="stylesheet"/>

<script language='javascript'>
    function copyToClipBoard(){
        var clipBoardContent=''; 
        var thisurl=window.location;
        clipBoardContent+='�����С˵�ܲ�����Ҳ��������\r\n��ַ:';
        clipBoardContent+=window.location;
        window.clipboardData.setData("Text",clipBoardContent);
        alert("���Ѹ������Ӽ�����,������ͨ��QQ���ʼ�����̳�ȷ�ʽ���͸����ĺ���!��ͬ�����Ķ��Ŀ��֣�");
    }


    var back_page = "<?php echo $backurl?>"; 
    var next_page = "<?php echo $nexturl?>"; 
    document.onkeydown = function(evt){
    	var e = window.event || evt; 
    	if (e.keyCode == 37) location.href = back_page; 
    	if (e.keyCode == 39) location.href = next_page; 
    }
</script>
</head>

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

<div class="listmain">

<div class="main">


<div class="spline"></div>
<!-- λ�� -->

<div class="loca">
    <div>
		<span class="rhome">		 
		<a onclick="copyToClipBoard()" style="cursor:pointer">���Ʊ�ҳ��ַ��������Ƽ�</a></span>
        <strong>����λ�ã�</strong>
        <a href="<?php echo PT_SITEURL?>"><?php echo PT_SITENAME?></a> ��
        <a href="<?php echo $sorturl?>"><?php echo $sortname?></a>  �� С˵�б� 
    </div>
</div>
<!-- λ�� ���� -->
<div class="spline"></div>
<!-- ��һ�� -->
<div class="wrap">
<!-- �Ҳ�� -->
<div class="sidearea" style="float:right">
    <div class="sother flside">
    	<div id="bjtbtj">
    		<div class="qbqt">
                <div >
                    <ul>
                        <?php echo $pt_block_list['11']?>
                    </ul>                  
                </div>
            </div>		
    	</div>	
    </div>
           
    <div class="spline"></div>
    
    <div class="ph" id="favoritesbook">
    	<div class="title">
    		<h3>
    			����Ǳ����
    		</h3>
    	</div>
    	<div class="con">
    		<ul style="OVERFLOW: hidden; HEIGHT: 359px">
                <?php echo $pt_block_list['7']?>
            </ul>
    	</div>
    </div>    
       
    <div class="spline"></div>
		
</div>
    <!-- �Ҳ�� ���� -->

<div class="mainarea">
    <div id="update" class="btable update">
        <div class="title">
            <div class="ment">        
                <dt class="active">
                    <a class="store"><?php echo $sortname?>  �� С˵�б�</a>
                </dt>      
            </div>
        </div>
    
    <!-- ���ѡ�� -->
        <div class="select">
            <form name="__aspnetForm" method="post" class="LoginCss" id="__aspnetForm">  
            <div class="px">
                <div class="fl">�ҳĬ�ϰ�<span class="forg">���¸���</span>����</div>
                <div class="fr">
                        <select name="selectchag" onchange="location.href=this.value;">
                            <option value="#">----ѡ�����з�ʽ----</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=0">Ĭ������</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=1">���Ƽ�����</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=2">�ܵ������</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=3">�µ������</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=4">�ܵ������</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=5">�յ������</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=6">���ղ�����</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=7">���������</option>
                            <option value="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&page=<?php echo $page?>&orderbyid=8">������ʱ��</option>
                        </select>
                 </div>
            </div>
            </form>
        </div>
    <!-- ���ѡ�� ���� -->
        <div class="con">
            <ul class="column">
                <li class="ro1">������� </li>
                <li class="ro2">Ŀ¼/����/�½�</li>
                <li class="ro3">���� </li>
                <li class="ro4">����ʱ�� </li>
            </ul>
            <div class="listad"><script src="http://www.59book.net/files/friend/centerbanner.js" type="text/javascript" language="javascript"></script></div>
            <div id="update_Content0">
<?php
for($i=1;$i<=$count_list;$i++){
?>
<ul>
                    <li class="ro1"><a href="<?php echo $pt_list[$i]['sorturl']?>" target="_blank">[<?php echo $pt_list[$i]['sortname']?>]</a> </li>
                    <li class="ro2">
                        <a class="f141" href="<?php echo $pt_list[$i]['readurl']?>" target="_blank">[Ŀ¼]</a>&#160;&#160;
                        <a class="f14"  href="<?php echo $pt_list[$i]['bookurl']?>" target="_blank"><?php echo $pt_list[$i]['bookname']?></a>&#160;&#160;&#160;
                        <a href="<?php echo $pt_list[$i]['chapterurl']?>" target="_blank" title="<?php echo $pt_list[$i]['bookname']?> /<?php echo $pt_list[$i]['chaptername']?>"><?php echo $pt_list[$i]['chaptername']?></a>
                    </li>
                    <li class="ro3"><a href="<?php echo $pt_list[$i]['authorurl']?>" target="_blank"><?php echo $pt_list[$i]['author']?></a></li>
                    <li class="ro4"><?php echo $pt_list[$i]['update']?></li>
                </ul>
<?php
}
?>
                    
                   	
                <div class="bookpage">
                    <span class="fl">��ǰ��<span class="fred"><?php echo $page?></span>ҳ&#160;����<span class="fred"><?php echo $pagec?></span>ҳ&#160;<span class="fred"><?php echo $numc?></span>ƪ</span> 
                    <div class="page" >                        
                        <a title="��ҳ" href="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&orderbyid=<?php echo $orderbyid?>&page=1">��ҳ</a>
<?php
if($page > 1){
?>
<a title="��һҳ" href="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&orderbyid=<?php echo $orderbyid?>&page=<?php echo $page-1?>">��һҳ</a>
<?php } ?>
<?php
for($i=1;$i<=$pageend;$i++){
?>
<?php
if($i==$page-$pagestart){
?>
<a class="current"><?php echo $pagestart+$i?></a>
<?php }else{ ?>
                        <a href="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&orderbyid=<?php echo $orderbyid?>&page=<?php echo $pagestart+$i?>"><?php echo $pagestart+$i?></a>
<?php } ?>
<?php
}
?>
<?php
if($page < $pagec){
?>
<a title="��һҳ" href="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&orderbyid=<?php echo $orderbyid?>&page=<?php echo $page+1?>">��һҳ</a>
<?php } ?>
                        <a title="���һҳ" href="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SORT?>?sortid=<?php echo $sortid?>&orderbyid=<?php echo $orderbyid?>&page=<?php echo $pagec?>">ĩҳ</a> 
                        <span class="jump"></span>
                    </div>						
                </div>
            </div>
        </div>
    </div>
</div>


</div></div></div>

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