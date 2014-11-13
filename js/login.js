





    function messageFail(text,cl){
        $("."+cl).html(text);
        return false;
    }

    function checkLoginData(){
        if(!$("#loginLogin").val().length){
            bootbox.alert('������� �����'); return false;
        }
        if(!$("#loginPassword").val().length){
            bootbox.alert('������� ������'); return false;
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

    // ������� �������� email
    function checkmail(value){
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if(pattern.test(value))
            $(".email_error").html("");
        else {
            $("#email,#forgotEmail").focus();
            if($(".email_error").html()!='������������ � ����� email �� ���������������') $(".email_error").html('�� ������ ������ Email');
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

    // ����������� input �������������� ������

    $(".forgotPassword").click(function(){
        if($(".forgotPasswordDiv").css('display')=='none'){
            $(".forgotPasswordDiv").fadeIn();
            $(this).text('������������');
        }else sendForgotPassword();
    });

    function doubleLogin(){ //�������� �� ������ ������
        if(!$("#login").val().length) return false;
        $.post(url+"/Ajax/AjaxCheckLogin",{login:$("#login").val()},function(data){
            if(parseInt(data)) { messageFail('������������ � ����� ������� ��� ���������������',"login_error"); $("#login").focus(); }
            else $(".login_error").html("");
        });
    }

    function doubleEmail(){ //������� � ������� �����
        loader = false;
        $.post(url+"/Ajax/AjaxCheckEmail",{email:$("#email").val()},function(data){
            if(parseInt(data)) { messageFail('������������ � ����� email ��� ���������������',"email_error"); $("#email").focus(); }
            else{
                if($(".email_error").html()!='�� ������ ������ Email')  $(".email_error").html("");
            }
        });
    }

    // �����������
    $("#registration").click(function(){
        loader = true;
        if(!doublePassword()){
            bootbox.alert("������ �� ���������");
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
            case 'dphone': showErrorMessage('login_error',"������������ � ����� ������� ��� ���������������"); break;
            case 'demail': showErrorMessage('email_error',"������������ � ����� email ��� ���������������"); break;
            case 'dpassword': showErrorMessage('password_error',"������ �� ���������"); break;
            case 'femail': showErrorMessage('email_error',"�� ������ ������ Email"); break;
        }
    }

    function validationFormRegistration(){
        var status = true;
        if( $("#name").val().length==0 ) { showErrorMessage('name_error',"���� ��� ����������� ��� ����������"); status = false; }
        if( $("#login").val().length==0 ) { showErrorMessage('login_error',"���� ����� ����������� ��� ����������"); status = false; }
        if( $("#passwordForm").val().length==0 ) { showErrorMessage('password_error',"���� ������ ����������� ��� ����������"); status = false; }
        if( $("#passwordForm").val().length<5 ) { showErrorMessage('password_error',"���� ������ ������ ���� ������ 4 ��������"); return false; }
        if( $("#email").val().length ==0 ) { showErrorMessage('email_error',"���� ������ ����������� ��� ����������"); status = false; }
        return status;
    }

    function clearErrorMessage(){   //������� ��������� ������
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

            if(data == 0) bootbox.alert('����������� ������');
            if(data == 2) bootbox.alert('����� ��� ��������������� � �������');
            if(data == 3) bootbox.alert('����� �� ������������');
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
                bootbox.alert('��� ������������� ������ ��������');
            }else bootbox.alert('������ �������� ����, ���������� ���� �����');
        });
    });

    $("#code").click(function(){
        $.post(url+"/Ajax/confirmAccount",{phone:phone,code:$(".confirmAccountCode").val()},function(data){
            if(data=='true'){
                location.href = url+"/login/index?save=registrationOk";
            }else bootbox.alert('�� ������ ��� �������������');
        });
    });

    $("#login,#loginLogin").mask("+7 (999) 999-9999");



    // �������� ������� ������
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
        if( $("#password").val().length==0 ) { showErrorMessage('password_error',"���� ����� ������ ����������� ��� ����������"); return false; }
        if( $("#password").val().length<5 ) { showErrorMessage('password_error',"���� ������ ������ ���� ������ 4 ��������"); return false; }
        $(".error_registration").html("");
        $.post(url+"/Ajax/savenewpassword",{id:$("#recoveryid").val(),key:$("#recoverykey").val(),password:$("#password").val(),passwordRepeat:$("#passwordRepeat").val()},function(data){
            bootbox.alert(data);
        });
    });

});

    $(document).ajaxSend(function(){
       if(loader) $("#Spinner").css("display","block");
    });