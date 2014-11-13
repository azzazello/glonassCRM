<section>
    <div class="panel panel-signup">
        <div class="panel-body">
            <div class="logo text-center">
                <img src="<?=Yii::app()->request->baseUrl;?>/images/logo-primary.png" alt="Логотип" >
            </div>
            <br />
            <h4 class="text-center mb5">Войти</h4>

            <div class="mb30"></div>

            <p class="loginMessages"><?=$this->message;?></p>

            <form action="<?=$this->createUrl('.');?>" method="post" id="loginForm">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" value="" name="LoginForm[login]" id="loginLogin" placeholder="Логин *">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" value="" name="LoginForm[password]" id="loginPassword" placeholder="Пароль *">
                        </div>
                    </div>
                </div>


                <div class="row forgotPasswordDiv">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" class="form-control" value="" name="" id="forgotEmail" placeholder="Введите Email для восстановления пароля *">


                        </div>
                        <div class="error_registration email_error"></div>
                    </div>
                </div>

                <div class="clearfix">
                    <div class="pull-left">
                        <div class="ckbox ckbox-primary mt5">
                           <input type="checkbox" value="1" id="agree" name="LoginForm[rememberMe]">
                            <label for="agree">Запомнить меня</label>
                        </div>
                    </div>
                    <div class="pull-right">
                       <button type="button" class="btn btn-success forgotPassword">Забыли пароль?</button>
                       <button type="button" class="btn btn-success" id="Spinner">
                            <img src="<?=Yii::app()->request->baseUrl;?>/images/loader23.gif">
                       </button>
                    </div>
                </div>
            </form>


        </div>
        <div class="panel-footer">
            <a href="#" id="loginSubmit" class="btn btn-primary btn-block">Войти</a>
            <a href="<?=Yii::app()->request->baseUrl;?>" class="btn btn-primary btn-block">На главную</a>
        </div>


    </div><!-- panel -->

</section>