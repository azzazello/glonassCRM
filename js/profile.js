$(document).ready(function(){

    $("#login").mask("+7 (999) 999-9999");

    $("#submitProfile").click(function(){

        $(".error_edit").html("");


        if($("#passwordForm").val().length<5 && $("#passwordForm").val().length>0) { $(".error_password").html("Поле Пароль должно быть длинее 4 символов"); return false; }
        if($("#passwordForm").val()!=$("#passwordFormRepeat").val()) {$(".error_repeat").html("Пароли не совпадают"); return false; }

        $("#editProfile").submit();

    });
});