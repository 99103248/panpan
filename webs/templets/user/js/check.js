$().ready(function() {
$('form').checkForm(1);
});


function CharMode(iN)
{
if (iN>=65 && iN <= 90)
return 2;
if (iN>=97 && iN <= 122)
return 4;
else
return 1;
}

function bitTotal(num)
{
modes = 0;
for(i=0; i<3; i++)
{
if (num & 1) modes++;
num >>>= 1;
}
return modes;
}

function checkStrong(sPW){
Modes=0;

for (i=0;i<sPW.length;i++){
Modes|=CharMode(sPW.charCodeAt(i));
}
var btotal = bitTotal(Modes);
if (sPW.length >= 10) btotal++;
switch(btotal) {
case 1:
return "pw_check_1";
break;
case 2:
return "pw_check_2";
break;
case 3:
return "pw_check_3";
break;
default:
return "pw_check_1";
}
}

function ShowStrong(){
data = checkStrong($('#new_password').val());
pw_id = '#' + data;
$(".pw_check").hide();
$(pw_id).show();
}

$('#new_password').blur(function(){
 ShowStrong();
});