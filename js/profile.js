
function doubleEmail(){ //������� � ������� �����
    loader = false;
    $.post(url+"/Ajax/AjaxCheckEmail",{email:$("#email").val(),edit:1},function(data){
        if(parseInt(data)) { $(".error_email").html("������������ � ����� email ��� ���������������"); $("#email").focus(); }
        else {
            if($(".error_email").html()!='�� ������ ������ Email')  $(".error_email").html("");
        }
    });
}

function checkmail(value){
    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    if(pattern.test(value))
        $(".error_email").html("");
    else {
        $("#email").focus();
        if($(".email_error").html()!='������������ � ����� email �� ���������������') $(".error_email").html('�� ������ ������ Email');
        return false;
    }
    return true;
}


$(document).ready(function(){

    function validationFormEdit(){

        if($("#name").val().length==0) { $(".error_name").html("���� ��� ����������� ��� ����������"); return false; }

        if($("#login").val().length==0) { $(".error_login").html("���� ����� ����������� ��� ����������"); return false;}

        if($("#email").val().length==0) { $(".error_email").html("���� Email ����������� ��� ����������"); return false; }

        if($("#passwordForm").val().length<5 && $("#passwordForm").val().length>0) { $(".error_password").html("���� ������ ������ ���� ������ 4 ��������"); return false; }

        if($("#passwordForm").val()!=$("#passwordFormRepeat").val()) {$(".error_repeat").html("������ �� ���������"); return false; }

        return true;

        }

    $("#login").mask("+7 (999) 999-9999");

    $("#submitProfile").click(function(){

        $(".error_edit").html("");

       if(!validationFormEdit()) return true;

        $("#editProfile").submit();

    });

    $("#email").blur(function(){
        if($(this).val().length>0){
            checkmail($(this).val());
            doubleEmail();
        }
    });
});