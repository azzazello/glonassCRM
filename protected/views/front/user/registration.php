<section>


    <div class="panel panel-signup">
        <div class="panel-body">
            <div class="logo text-center">
                <img src="<?=Yii::app()->request->baseUrl;?>/images/logo-primary.png" alt="Chain Logo" >
            </div>
            <br />
            <h4 class="text-center mb5">Регистрация</h4>


            <div class="mb30"></div>

            <form action="#" method="post" id="registrationForm">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" value="" name="name" id="name" placeholder="ФИО *">
                        </div><!-- input-group -->
                            <div class="error_registration name_error"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input type="text" class="form-control" value="" name="login"  placeholder="Логин *" id="login">
                        </div><!-- input-group -->
                            <div class="error_registration login_error"></div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" value="" name="password" id="passwordForm" placeholder="Пароль *">
                        </div><!-- input-group -->
                                <div class="error_registration password_error"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" value="" name="password_repeat" id="passwordFormRepeat" placeholder="Повторите пароль *">
                        </div><!-- input-group -->
                        <div class="error_registration repeat_error"></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-cloud"></i></span>
                            <input type="text" class="form-control" value="" name="skype" placeholder="Skype">
                        </div><!-- input-group -->
                        <div class="error_registration"></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" class="form-control" value="" name="email" id="email" placeholder="Email *">
                        </div><!-- input-group -->
                                <div class="error_registration email_error"></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                            <input type="text" class="form-control" value="" name="company" placeholder="Название организации">
                        </div><!-- input-group -->
                            <div class="error_registration company_error"></div>
                    </div>
                </div>

                <div class="row" id="code_input">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input type="text" class="form-control confirmAccountCode" value="" name="" placeholder="Введите код подтверждения высланный вам по SMS">
                        </div><!-- input-group -->
                        <div class="error_registration error_code"></div>
                    </div>
                </div>

                <br />
                <div class="clearfix">
                    <div class="pull-left">
                        <!--<div class="ckbox ckbox-primary mt5">
                            <input type="checkbox" id="agree" value="1">
                            <label for="agree">I agree with <a href="">Terms and Conditions</a></label>
                        </div>-->
                    </div>
                    <div class="pull-right">
                        <button type="button" id="registration" class="btn btn-success">Регистрация <i class="fa fa-angle-right ml5"></i></button>
                        <button type="button" class="btn btn-success" id="Spinner">
                            <img src="<?=Yii::app()->request->baseUrl;?>/images/loader11.gif">
                        </button>
                        <button type="button" id="code" class="btn btn-success">Пароль введен <i class="fa fa-angle-right ml5"></i></button>

                        <div id="divRepeat">
                        <a href="#" id="repeatSmS">Выслать код повторно</a>
                        </div>
                    </div>

                </div>
            </form>

        </div>
        <div class="panel-footer">
            <a href="<?=$this->createUrl("/login");?>" class="btn btn-primary btn-block">Войти</a>
            <a href="<?=Yii::app()->request->baseUrl;?>" class="btn btn-primary btn-block">На главную</a>
        </div><!-- panel-footer -->

    </div><!-- panel -->

</section>