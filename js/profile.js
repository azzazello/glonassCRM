$(document).ready(function(){

    $("#login").mask("+7 (999) 999-9999");

    $("#submitProfile").click(function(){

        $(".error_edit").html("");


        if($("#passwordForm").val().length<5 && $("#passwordForm").val().length>0) { $(".error_password").html("���� ������ ������ ���� ������ 4 ��������"); return false; }
        if($("#passwordForm").val()!=$("#passwordFormRepeat").val()) {$(".error_repeat").html("������ �� ���������"); return false; }

        $("#editProfile").submit();

    });
});