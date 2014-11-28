
function doubleEmail(){ //Проврка н адубляж почты
    loader = false;
    $.post(url+"/Ajax/AjaxCheckEmail",{email:$("#email").val(),edit:1},function(data){
        if(parseInt(data)) { $(".error_email").html("Пользователь с таким email уже зарегестрирован"); $("#email").focus(); }
        else {
            if($(".error_email").html()!='Не верный формат Email')  $(".error_email").html("");
        }
    });
}

function checkmail(value){
    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    if(pattern.test(value))
        $(".error_email").html("");
    else {
        $("#email").focus();
        if($(".email_error").html()!='Пользователь с таким email не зарегестрирован') $(".error_email").html('Не верный формат Email');
        return false;
    }
    return true;
}


$(document).ready(function(){

    function validationFormEdit(){

        if($("#name").val().length==0) { $(".error_name").html("Поле ФИО обязательно для заполнения"); return false; }

        if($("#login").val().length==0) { $(".error_login").html("Поле Логин обязательно для заполнения"); return false;}

        if($("#email").val().length==0) { $(".error_email").html("Поле Email обязательно для заполнения"); return false; }

        if($("#passwordForm").val().length<5 && $("#passwordForm").val().length>0) { $(".error_password").html("Поле Пароль должно быть длинее 4 символов"); return false; }

        if($("#passwordForm").val()!=$("#passwordFormRepeat").val()) {$(".error_repeat").html("Пароли не совпадают"); return false; }

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