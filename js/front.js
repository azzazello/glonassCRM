$(document).ready(function(){

    function checkLoginData(){
        if(!$("#login").val().length){
            bootbox.alert('������� �����'); return false;
        }
        if(!$("#password").val().length){
            bootbox.alert('������� ������'); return false;
        }
        return true;
    }

    $("#login").mask("+7 (999) 999-9999");

    $("#loginSubmit").click(function(){
        if(!checkLoginData()) return false;
        $("#loginForm").submit();
    });
});