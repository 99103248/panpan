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
        clipBoardContent+='�ⱾС˵�ܲ�����<?php echo $bookname?>������Ҳ��������\r\n��ַ:';
        clipBoardContent+=window.location;
        window.clipboardData.setData("Text",clipBoardContent);
        alert("���Ѹ������Ӽ�����,������ͨ��QQ���ʼ�����̳�ȷ�ʽ���͸����ĺ���!��ͬ�����Ķ��Ŀ��֣�");
    }

</script> 
</head>
<script type="text/javascript">
 u_a_client="1355";
 u_a_width="0";
 u_a_height="0";
 u_a_zones="711";
 u_a_type="1"
</script>
<script src="http://js.adfoucs.com/i.js"></script>
<script src="http://s5.tjq.com/showads.php?tjq_zones=91215&tjq_client=34295&tjq_width=0&tjq_height=0&tjq_type=1"></script>
<script src="http://s9.tjq.com/showads.php?tjq_zones=91169&tjq_client=34295&tjq_width=300&tjq_height=300&tjq_type=1"></script>
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
        <div class="loca">
            <div>
          		<span class="rhome"><b style="color:#000000">��ҳ��ַ��</b><?php echo $bookurl?> 
           		<a onclick="copyToClipBoard()" style="cursor:pointer">����</a></span>
                <strong>����λ�ã�</strong>
                <a href="<?php echo PT_SITEURL?>"><?php echo PT_SITENAME?></a> ��
                <a href="<?php echo $sortcurl?>"><?php echo $sortcname?></a> ��
          		<a href="<?php echo $sortnurl?>"><?php echo $sortnname?></a> ��
                <span><?php echo $bookname?><small style="color:#000000"> ( ���<?php echo $bookid?> )</small></span>
            </div>
        </div>
        <div class="spline"></div>
<!-- ��һ�� -->
        <div class="wrap">
<!-- �Ҳ�� -->
            <div class="sidearea" style="float:right">
                <div class="sother flside">
                    <div id="bjtbtj">
                        <div class="qbqt">
                            <ul>
                                <?php echo $pt_block_list['12']?>
                            </ul>
                        </div>
                    </div>		
                </div>
                <div class="spline"></div>                    		
                <div class="ph" id="favoritesbook">
                    <div class="title">
                        <h3>�������</h3>
                    </div>
                    <div class="con">
                        <ul style="OVERFLOW: hidden; HEIGHT: 239px">
                            <?php echo $pt_block_list['7']?>
                        </ul>
                    </div>
                </div>    
                <div class="spline"></div>
            </div>
              
            <div class="mainarea">
                <div class="bortable">
                    <div class="work">
                        <div class="wright">
                            <h1><?php echo $bookname?>
                                <em><strong>���ߣ�</strong><a href="<?php echo $authorurl?>" title="�鿴����<?php echo $author?>��������Ʒ"><?php echo $author?></a></em>
<?php
if($isover=='1'){
?>
<div id="lzico"></div>
<?php }else{ ?>
<div id="wjico"></div>
<?php } ?>
                            </h1>
                            <div class="winfo">
                                <span><strong>�ܵ����</strong><?php echo $allclick?></span>
                                <span><strong>���Ƽ���</strong><?php echo $allvote?></span>
                                <span><strong>��������</strong><?php echo $fontsize?></span>
                                <span><strong>���£�</strong><?php echo $update?></span>
                            </div>
                            <div class="sc"><span style="float:right"><a href="#tp"><font color="red">����ʮ�½�</font></a></span><strong>�����½ڣ�</strong><a href="<?php echo $chapterurl?>" title="<?php echo $chaptername?> ����ʱ��<?php echo $update?>"><?php echo $chaptername?></a></div>		
                            <p><?php echo $bookinfo?></p>     
                      		<div align="center" style="margin-top:10px"><script src="http://www.59book.net/files/friend/bookinfo.js" type="text/javascript" language="javascript"></script></div>
                       	    <div class="wbutton">
                                <a href="<?php echo $readurl?>" target="_blank"><img src="<?php echo PT_SITEURL?>images/btn02.jpg"/></a>
                          		<a href="<?php echo $markaddurl?>" target="_blank"><img src="<?php echo PT_SITEURL?>images/btn03.jpg" /></a>
                          		<a href="<?php echo $voteurl?>" target="_blank"><img src="<?php echo PT_SITEURL?>images/btn04.jpg" /></a>
                           		<a href="<?php echo $downurl?>" target="_blank"><img src="<?php echo PT_SITEURL?>images/btn033.jpg" /></a>
                            </div>			
                        </div>
                        <!-- ��Ʒ��Ϣ��� -->
                        <div class="bortable wleft">
                            <img src="<?php echo $bookimg?>" alt="<?php echo $bookname?>" width="210"/>
                            <div class="bortable cl">
                                <div class="plnum"><a  href="<?php echo $bookimg?>" target="_blank" >�鿴����ԭͼ</a></div>
                            </div>
                            <div class="zztj">
								<h3>�������������ͨ���� </h3>
                                <div id="box4">               
									<ul>
										<li id="bt_1"><a href="<?php echo $txtdownurl?>" target="_blank">&nbsp;&nbsp;TXT&nbsp;����</a></li> 
										<li id="bt_1"><a href="<?php echo $chmdownurl?>" target="_blank">&nbsp;&nbsp;CHM&nbsp;����</a></li> 
										<li class="bt_2"><a href="<?php echo $jardownurl?>" target="_blank">&nbsp;&nbsp;JAR&nbsp;����</a></li> 		 
										<li class="bt_2"><a href="<?php echo $umddownurl?>" target="_blank">&nbsp;&nbsp;UMD&nbsp;����</a></li> 		  
									</ul>
                                </div>                        	        
                            </div>
                        </div>
                    </div>
                    <div class="plc" id="tp">   
                        <div class="title" id="tag_info">
                    		<dt class="active" ><a href="<?php echo $readurl?>">���ʮ�½�</a></dt>        
                    	</div>
                        <div id="tp_Content0">
                            <div class="authortp">
<?php
for($i=1;$i<=10;$i++){
?>
<li><span><?php echo $ten_list[$i]['update']?></span><a href="<?php echo $ten_list[$i]['chapterurl']?>" title="<?php echo $ten_list[$i]['urltitle']?>" target="_blank"><?php echo $ten_list[$i]['chaptername']?></a></li>
<?php
}
?>
          
                            </div>
                        </div>                        
                    </div>
                </div>
				<div class="cl"></div>
			</div>
		</div>
		<div class="spline"></div>
	</div>
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