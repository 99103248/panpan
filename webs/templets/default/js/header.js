//��Ϊ��ҳ
function SetHome(obj){
var url=window.location.href;
try{
obj.style.behavior='url(#default#homepage)';obj.setHomePage(url);
}
catch(e){
if(window.netscape) {
try {
netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
}
catch (e) {
alert("�˲�����������ܾ���\n�����������ַ�����롰about:config�����س�\nȻ�� [signed.applets.codebase_principal_support]��ֵ����Ϊ'true',˫�����ɡ�");
}
var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
prefs.setCharPref('browser.startup.homepage',url);
}
}
}
//��ӵ��ղؼ�
function AddFavorite()
{
var url=window.location.href;
try
{
window.external.addFavorite(url, "****");
}
catch (e)
{
try
{
window.sidebar.addPanel("****", url, "");
}
catch (e)
{
alert("�����ղ�ʧ�ܣ���ʹ��Ctrl+D�������");
}
}
}

function addfavor(url,title) {
if(confirm("��վ���ƣ�"+title+"\n��ַ��"+url+"\nȷ������ղ�?")){
var ua = navigator.userAgent.toLowerCase();
if(ua.indexOf("msie 8")>-1){
external.AddToFavoritesBar(url,title,'IT�е�');//IE8
}else{
try {
window.external.addFavorite(url, title);
} catch(e) {
try {
window.sidebar.addPanel(title, url, "");//firefox
} catch(e) {
alert("�����ղ�ʧ�ܣ���ʹ��Ctrl+D�������");
}
}
}
}
return false;
}
