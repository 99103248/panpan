$(document).ready(function(){
����$("input[type='text']").addClass('input_blur');
����$("input[type='password']").addClass('input_blur');
    $("input[type='submit']").addClass('button_style');
    $("input[type='reset']").addClass('button_style');
    $("input[type='button']").addClass('button_style');
    $("input[type='radio']").addClass('radio_style');
    $("input[type='checkbox']").addClass('checkbox_style');
    $("input[type='textarea']").addClass('textarea_style');
    $("input[type='file']").addClass('file_style');
����$("input[type='file']").blur(function () { this.className='input_blur'; } );
����$("input[type='file']").focus(function () { this.className='input_focus'; } );
����$("input[type='password']").blur(function () { this.className='input_blur'; } );
����$("input[type='password']").focus(function () { this.className='input_focus'; } );
����$("input[type='text']").blur(function () { this.className='input_blur'; } );
����$("input[type='text']").focus(function () { this.className='input_focus'; } );
    $("textarea").blur(function () { this.className='textarea_style'; } );
����$("textarea").focus(function () { this.className='textarea_focus'; } )
����$(".table_list tr").mouseover(function () { this.className='mouseover'; } );
����$(".table_list tr").mouseout(function () { this.className=''; } );
����$("#title").focus(function () { this.className='inputtitle'; } );
����$("#title").blur(function () { this.className='inputtitle'; } );

    $('img[tag]').css({cursor:'pointer'}).click(function(){
       var flag=$(this).attr('tag');
       var fck=$('#'+$(this).attr('fck')+'___Frame');

       var fckh=fck.height();
       (flag==1)?fck.height(fckh+120):fck.height(fckh-120) ;
    });

});
function checkform()
{
	if($('#username').val().length<2 || $('#username').val().length>20)
	{
		alert('��������Ա�ʺŲ�������2���ַ����ߴ���20���ַ�');
		return false;
	}
	if($('#password').val().length<3 || $('#username').val().length>20)
	{
		alert('��������Ա���벻������3���ַ����ߴ���20���ַ�');
		return false;
	}
	if($('#password').val()!=$('#pwdconfirm').val())
	{
		alert('�����������벻һ�£�');
		return false;
	}
	if($('#dbname').val()=='')
	{
		alert('���������ݿ����ƣ�');
		$('#dbname').focus();
		return false;
	}
	$('#install').submit();
    return false;
}
function suggestPassword() {
    var pwchars = "abcdefhjmnpqrstuvwxyz23456789ABCDEFGHJKLMNPQRSTUVWYXZ!@#$%^&*()";
    var passwordlength = 8;    // do we want that to be dynamic?  no, keep it simple :)
    var passwd = '';
    for ( i = 0; i < passwordlength; i++ ) {
        passwd += pwchars.charAt( Math.floor( Math.random() * pwchars.length ) )
    }
    return passwd;
}