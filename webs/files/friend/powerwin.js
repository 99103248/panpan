//��ȡcookies����  �˴���
function getCookie(name){ 
var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)")); 
if(arr != null) 
return unescape(arr[2]); 
return null; 
} 
//����������

// �ж��Ƿ��Ѿ���¼
if(getCookie("pt_username")){//�ж��Ƿ��¼ ��¼������ û�е�¼ת������
var sodu_keyword=["baidu","booksky","sodu"]; //��·�жϣ���������·�а�������ؼ���
var sodu_refer=document.referrer;
var sodu_tan="0";  //�жϳ�ʼֵ

for (var i = 0; i < sodu_keyword.length; i++) {
if (sodu_refer.indexOf(sodu_keyword[i]) > -1) {sodu_tan="1";break;}   //�����·�д�������ؼ��� ��ı��ʼֵ
}
//�����ʼֵû�иı� ������
if (sodu_tan=="0")
{
var expDays_265 = 1;
var exp_265 = new Date();
exp_265.setTime(exp_265.getTime() + (expDays_265*5*60*1000)); //����ʱ�� 5*60*1000 ��Ϊ5����  ÿ����60�� ÿ��1000����
document.cookie = "is_use_cookie=yes" + "; expires=" + exp_265.toGMTString() +  "; path=/";
if(document.cookie.indexOf('ttt') == -1)
{

//������ʼ
r = 5;//������ķ�Χ  ��ѭ����ʾ���ٹ��
var seed = Math.random();
rnd = Math.ceil(seed * r); //��5�в��������

switch (rnd) {

case 1:
//������
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;

case 2:
//������
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;

case 3:

document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;

case 4:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;

case 5:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;
  
} 

document.cookie = "ttt" + "; expires=" + exp_265.toGMTString() +  "; path=/; ";
}else{
document.writeln(" ");
}



}

}else{
//����Ϊû�е�¼�� ע����
var sodu_keyword=["baidu","booksky","sodu"];
var sodu_refer=document.referrer;
var sodu_tan="0";

for (var i = 0; i < sodu_keyword.length; i++) {
if (sodu_refer.indexOf(sodu_keyword[i]) > -1) {sodu_tan="1";break;}
}
if (sodu_tan=="0")
{

r = 5;//������ķ�Χ
var seed = Math.random();
rnd = Math.ceil(seed * r); //��5�в��������

switch (rnd) {

case 1:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;
case 2:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;
case 3:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;
case 4:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;
case 5:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;  
} 
}

}