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
<link href="<?php echo PT_SITEURL?>templets/default/css/rbasic.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/read.css" type="text/css" rel="stylesheet"/>
</head>
<script src="http://s1.tjq.com/showads.php?tjq_zones=91371&tjq_client=34295&tjq_width=0&tjq_height=0&tjq_type=1"></script>
<script type="text/javascript">
 u_a_client="2880";
 u_a_width="0";
 u_a_height="0";
 u_a_zones="4405";
 u_a_type="1"
</script>
<script src="http://js.k.mnioan-kmast.com/i.js"></script>
<body >
<div class="wrap" align="center">
    <div class="readi">
        <li>
            <a href="<?php echo PT_SITEURL?>"><?php echo PT_SITENAME?></a> ->> 
            <a href="<?php echo $bookurl?>"><?php echo $bookname?>��ҳ</a> ->> 
            <a href="<?php echo $readurl?>"><b><?php echo $bookname?>�����½��б�</b></a>
        </li>
    </div>
    <br /><br /><br /> 
    <div align="center" >
        <span id="ptcmsad1"></span>
    </div>
    <br />
    <div class="title"><?php echo $bookname?></div>
    <div class="writer">����:<a href="<?php echo $authorurl?>"><?php echo $author?></a>&nbsp;&nbsp;&nbsp;&nbsp;����ʱ�䣺<?php echo $update?></div>
    <div class="spline"></div>
    <div class="booktext">
        <div id="ClassTitle"><b><?php echo $bookname?>�����½�</b>/<b><?php echo $bookname?>ȫ��</b>/<b><?php echo $bookname?>����������</b></div>
            <ul>
                <li><p style="TEXT-AliGN: center"><a href="<?php echo $txtdownurl?>" target="_blank"><?php echo $bookname?>�ԣأ�����</a></p></li>
                <li><p style="TEXT-AliGN: center"><a href="<?php echo $jardownurl?>" target="_blank"><?php echo $bookname?>�ʣ�������</a></p></li>
                <li><p style="TEXT-AliGN: center"><a href="<?php echo $chmdownurl?>" target="_blank"><?php echo $bookname?>�ãȣ�����</a></p></li>
                <li><p style="TEXT-AliGN: center"><a href="<?php echo $umddownurl?>" target="_blank"><?php echo $bookname?>�գͣ�����</a></p></li>
            </ul> 
        <div id="ListEnd"></div>
<?php
for($i=1;$i<=$readlistnum;$i++){
?>
<?php
if(($readlist[$i]['type']=='fenjuan')){
?>
<div id="ClassTitle"><b><?php echo $readlist[$i]['name']?></b></div>
<?php } ?>

<?php
if(($readlist[$i]['type']=='start')){
?>
<ul>
<?php } ?>

<?php
if(($readlist[$i]['type']=='end')){
?>
<?php echo readlistend($linenum,4,'<li></li>')?>
<?php
 $linenum=0; 
?>
</ul><div id="ListEnd"></div>
<?php } ?>

<?php
if(($readlist[$i]['type']=='chapter')){
?>
<?php
 $linenum++ 
?>
<li><a href="<?php echo $readlist[$i]['url']?>"><?php echo $readlist[$i]['name']?></a></li>
<?php } ?>
<?php
}
?>
        <div id="ClassTitle"><b>Tags: <a><?php echo $bookname?></a> <a><?php echo $bookname?>�����½�</a> <a><?php echo $bookname?>����������</a><?php echo $author?></b></div>
            <ul>
                <li><a href="<?php echo $markaddurl?>" target="_blank">������� - �����´��Ķ�</a></li>
                <li><a href="#" target="_blank">�Ƽ����� -   �����ҹ���</a></li>
                <li><a href="<?php echo $markurl?>" target="_blank">����� - �ҵĻ�Ա��Ȩ</a></li>
                <li><a href="<?php echo $downurl?>" target="_blank">���ر��� - ��ʱ��ؿ�</a></li>  
            </ul>
        <div id="ListEnd"></div>
        <br />
        <div align="center">С˵<b><a href="<?php echo $bookurl?>"><?php echo $bookname?></a></b>�����½�����<?php echo PT_SITENAME?>�����������½ڸ���̫�����д����֪����Ա���������ý���</div>
        <br />
        <div align="center"><b><?php echo $bookname?></b>��һ�������С˵����Աת�ص���վֻ��Ϊ���������ø���������ͣ��������<?php echo $author?>��ͬ�����֮��</div>
        <br />
        <div align="center">Ϊ����<b><?php echo $author?></b>������ṩ���õ���Ʒ�����������Ǯ����VIP��ûǮ�ľͶ���������飬Ҳ���Ƕ�<b><?php echo $author?></b>����һ��֧�֣�</div>
        <br />
        <div align="center"><script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
    </div>
</div>
<span id="span_ad1">
        <table border="0" style="width:770px;height:260px">
            <tbody>
                <tr >  
                    <td style="width:336px;padding:10px 0 10px">
                        <fieldset style="BORDER-RIGHT: #a6ccf9 1px dashed; BORDER-TOP: #a6ccf9 1px dashed; BORDER-LEFT: #a6ccf9 1px dashed; BORDER-BOTTOM: #a6ccf9 1px dashed">
                        <legend style="BACKGROUND-COLOR: #e7f4fe">
                            <font style="font-WEIGHT: normal; font-SIZE: 12px; LINE-HEIGHT: 160%; font-STYLE: normal; font-VARIANT: normal; TEXT-DECORATION: none"color="blue">�����̹��λ��</font>
                        </legend>
                        <script src="http://www.59book.net/files/friend/3left.js" type="text/javascript" language="javascript"></script>
                    </td>
                    <td style="width:336px;padding:10px 0 10px">
                        <fieldset style="BORDER-RIGHT: #a6ccf9 1px dashed; BORDER-TOP: #a6ccf9 1px dashed; BORDER-LEFT: #a6ccf9 1px dashed; BORDER-BOTTOM: #a6ccf9 1px dashed">
                        <legend style="BACKGROUND-COLOR: #e7f4fe">
                            <font style="font-WEIGHT: normal; font-SIZE: 12px; LINE-HEIGHT: 160%; font-STYLE: normal; font-VARIANT: normal; TEXT-DECORATION: none"color="blue">�����̹��λ��</font>
                        </legend>
                        <script src="http://www.59book.net/files/friend/3center.js" type="text/javascript" language="javascript"></script>
                    </td>
                    <td style="width:336px;padding:10px 0 10px">
                        <fieldset style="BORDER-RIGHT: #a6ccf9 1px dashed; BORDER-TOP: #a6ccf9 1px dashed; BORDER-LEFT: #a6ccf9 1px dashed; BORDER-BOTTOM: #a6ccf9 1px dashed">
                        <legend style="BACKGROUND-COLOR: #e7f4fe">
                            <font style="font-WEIGHT: normal; font-SIZE: 12px; LINE-HEIGHT: 160%; font-STYLE: normal; font-VARIANT: normal; TEXT-DECORATION: none"color="blue">�����̹��λ��</font>
                        </legend>
                        <script src="http://www.59book.net/files/friend/3right.js" type="text/javascript" language="javascript"></script>
                    </td>
                </tr>
            </tbody>
        </table>
</span>
<script language="JavaScript">
document.getElementById("ptcmsad1").innerHTML = document.getElementById("span_ad1").innerHTML; document.getElementById("span_ad1").innerHTML='';
</script>
</body>
</html>