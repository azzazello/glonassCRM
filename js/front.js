$(document).ready(function(){

    function checkLoginData(){
        if(!$("#login").val().length){
            bootbox.alert('¬ведите логин'); return false;
        }
        if(!$("#password").val().length){
            bootbox.alert('¬ведите пароль'); return false;
        }
        return true;
    }

    $("#login").mask("+7 (999) 999-9999");

    $("#loginSubmit").click(function(){
        if(!checkLoginData()) return false;
        $("#loginForm").submit();
    });
});