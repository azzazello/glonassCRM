





    function messageFail(text,cl){
        $("."+cl).html(text);
        return false;
    }

    function checkLoginData(){
        if(!$("#loginLogin").val().length){
            bootbox.alert('Введите логин'); return false;
        }
        if(!$("#loginPassword").val().length){
            bootbox.alert('Введите пароль'); return false;
        }
        return true;
    }

    function sendForgotPassword(){
        loader = true;
        if(!checkmail($("#forgotEmail").val())) return false;
        $(".forgotPassword").css("display","none");

        $.post(url+"/Ajax/SendEmail",{email:$("#forgotEmail").val()},function(data){
            bootbox.alert(data);
            $("#Spinner").css("display","none");
            $(".forgotPassword").css("display","block");
        });
        loader = false;
    }

    // Функция проверки email
    function checkmail(value){
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if(pattern.test(value))
            $(".email_error").html("");
        else {
            $("#email,#forgotEmail").focus();
            if($(".email_error").html()!='Пользователь с таким email не зарегестрирован') $(".email_error").html('Не верный формат Email');
            return false;
        }
        return true;
    }

    var loader = false;

$(document).ready(function(){

    $("input[type='password']").val("");

    $("#loginSubmit").click(function(){
        if(!checkLoginData()) return false;
        $("#loginForm").submit();
    });

    function doublePassword(){
        return ($('#passwordForm').val()!=$('#passwordFormRepeat').val())?false:true;
    }

    // Отображение input восстановления пароля

    $(".forgotPassword").click(function(){
        if($(".forgotPasswordDiv").css('display')=='none'){
            $(".forgotPasswordDiv").fadeIn();
            $(this).text('Восстановить');
        }else sendForgotPassword();
    });

    function doubleLogin(){ //Проверка на дубляж логина
        if(!$("#login").val().length) return false;
        $.post(url+"/Ajax/AjaxCheckLogin",{login:$("#login").val()},function(data){
            if(parseInt(data)) { messageFail('Пользователь с таким логином уже зарегестрирован',"login_error"); $("#login").focus(); }
            else $(".login_error").html("");
        });
    }

    function doubleEmail(){ //Проврка н адубляж почты
        loader = false;
        $.post(url+"/Ajax/AjaxCheckEmail",{email:$("#email").val()},function(data){
            if(parseInt(data)) { messageFail('Пользователь с таким email уже зарегестрирован',"email_error"); $("#email").focus(); }
            else{
                if($(".email_error").html()!='Не верный формат Email')  $(".email_error").html("");
            }
        });
    }

    // Регистрация
    $("#registration").click(function(){
        loader = true;
        if(!doublePassword()){
            bootbox.alert("Пароли не совпадают");
            return false;
        }
        registration();
        loader = false;
    });

    function showErrorMessage(classField,errorMessage){
        $("."+classField).html(errorMessage);
    }

    function showErrors(data){
        switch (data){
            case 'dphone': showErrorMessage('login_error',"Пользователь с таким логином уже зарегестрирован"); break;
            case 'demail': showErrorMessage('email_error',"Пользователь с таким email уже зарегестрирован"); break;
            case 'dpassword': showErrorMessage('password_error',"Пароли не совпадают"); break;
            case 'femail': showErrorMessage('email_error',"Не верный формат Email"); break;
        }
    }

    function validationFormRegistration(){
        var status = true;
        if( $("#name").val().length==0 ) { showErrorMessage('name_error',"Поле ФИО обязательно для заполнения"); status = false; }
        if( $("#login").val().length==0 ) { showErrorMessage('login_error',"Поле Логин обязательно для заполнения"); status = false; }
        if( $("#passwordForm").val().length==0 ) { showErrorMessage('password_error',"Поле Пароль обязательно для заполнения"); status = false; }
        if( $("#passwordForm").val().length<5 ) { showErrorMessage('password_error',"Поле Пароль должно быть длинее 4 символов"); return false; }
        if( $("#email").val().length ==0 ) { showErrorMessage('email_error',"Поле Пароль обязательно для заполнения"); status = false; }
        return status;
    }

    function clearErrorMessage(){   //очищаем сообщения ошибок
        $(".error_registration").html("");
    }

    var phone;

    function registration(){
        clearErrorMessage();
        if(!validationFormRegistration()) return false;

        $("#registration").css("display","none");

        $.post(url+"/Ajax/saveUser",{post:$("#registrationForm").serialize()},function(data){
            clearErrorMessage();
            showErrors(data);

            $("#Spinner").css("display","none");

            if(data == 0) bootbox.alert('Неизвестная ошибка');
            if(data == 2) bootbox.alert('Номер уже зарегистрирован в системе');
            if(data == 3) bootbox.alert('Номер не аккредитован');
            if(data == 1){
                phone = $("#login").val();
                $("#code,#code_input,#divRepeat").css("display","block");
            }else $("#registration").css("display","block");

        });
    }

    $("#repeatSmS").click(function(){
        // phone = "+7 (918) 48-68-904";
        $.post(url+"/Ajax/SendCodeRequest",{phone:phone},function(data){
            if(data=='true'){
                bootbox.alert('Код подтверждения выслан повторно');
            }else bootbox.alert('Ошибка отправки кода, попробуйте чуть позже');
        });
    });

    $("#code").click(function(){
        $.post(url+"/Ajax/confirmAccount",{phone:phone,code:$(".confirmAccountCode").val()},function(data){
            if(data=='true'){
                location.href = url+"/login/index?save=registrationOk";
            }else bootbox.alert('Не верный код подтверждения');
        });
    });

    $("#login,#loginLogin").mask("+7 (999) 999-9999");



    // Проверка дубляжа логина
    $("#login").blur(function(){
        doubleLogin();
    });

    $("#email").blur(function(){
        if($(this).val().length>0){
            checkmail($(this).val());
            doubleEmail();
        }
    });



    $("#repeatPassword").click(function(){
        if( $("#password").val().length==0 ) { showErrorMessage('password_error',"Поле Новый пароль обязательно для заполнения"); return false; }
        if( $("#password").val().length<5 ) { showErrorMessage('password_error',"Поле Пароль должно быть длинее 4 символов"); return false; }
        $(".error_registration").html("");
        $.post(url+"/Ajax/savenewpassword",{id:$("#recoveryid").val(),key:$("#recoverykey").val(),password:$("#password").val(),passwordRepeat:$("#passwordRepeat").val()},function(data){
            bootbox.alert(data);
        });
    });

});

    $(document).ajaxSend(function(){
       if(loader) $("#Spinner").css("display","block");
    });