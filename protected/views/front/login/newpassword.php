<section>
    <div class="panel panel-signup">
        <div class="panel-body">
            <div class="logo text-center">
                <a href="<?=Yii::app()->request->baseUrl;?>" ><img src="<?=Yii::app()->request->baseUrl;?>/images/front/logofront.png" alt="Логотип" ></a>
            </div>
            <br />
            <h4 class="text-center mb5">Смена пароля</h4>

            <div class="mb30"></div>
            <p id="loginTitle"><?=$this->message;?></p>
            <form action="#" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" value="" name="" id="password" placeholder="Новый пароль *">
                        </div>
                        <div class="error_registration password_error"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" value="" name="" id="passwordRepeat" placeholder="Повторите пароль *">
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?=$_GET['generate']?>" name="" id="recoverykey">
                <input type="hidden" value="<?=$_GET['id']?>" name="" id="recoveryid">
            </form>

        </div>
        <div class="panel-footer">
            <a href="#" id="repeatPassword" class="btn btn-primary btn-block">Сменить</a>
            <a href="<?=Yii::app()->request->baseUrl;?>" class="btn btn-primary btn-block">На главную</a>
        </div>

    </div><!-- panel -->

</section>