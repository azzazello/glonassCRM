<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-home"></i>
            </div>
            <?$this->renderPartial("application.views.cpanel.extend.breadcumb")?>
        </div><!-- media -->
    </div><!-- pageheader -->

    <style>
        .error_edit{
            color:#ab1313;
            margin-top: 5px;
            text-align: center;
        }
    </style>

    <div class="contentpanel">

        <div class="panel panel-primary-head">
            <div class="panel-heading">
                <h4 class="panel-title">Мой профиль</h4>
                <p>На данной странице вы можете просмотреть и отредактировать личные данные</p>
            </div><!-- panel-heading -->


            <div class="panel-body nopadding" style="max-width: 1000px">

                <form action="<?=$this->createUrl(".")?>" method="post"  class="form-horizontal form-bordered" id="editProfile">

                    <div class="form-group">
                        <label class="col-sm-4 control-label">ФИО</label>
                        <div class="col-sm-8">
                            <input name="name" id="name" class="form-control" value="<?=$this->model->name;?>">
                            <div class="error_edit error_name"><?=$errors['name'][0];?></div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Логин</label>
                        <div class="col-sm-8">
                            <input name="login" id="login" value="<?=$this->model->login;?>" class="form-control">
                            <div class="error_edit error_login"><?=$errors['login'][0];?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Пароль</label>
                        <div class="col-sm-8">
                            <input name="password" id="passwordForm" value="" class="form-control">
                            <div class="error_edit error_password"><?=$errors['password'][0];?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Повторите пароль</label>
                        <div class="col-sm-8">
                            <input name="password_repeat" id="passwordFormRepeat" class="form-control">
                            <div class="error_edit error_repeat"><?if(!$this->repeat) echo 'Пароли не совпадают';?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Skype</label>
                        <div class="col-sm-8">
                            <input name="skype" class="form-control" value="<?=$this->model->skype;?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input name="email" id="email" class="form-control" value="<?=$this->model->email;?>">
                            <div class="error_edit error_email"><?=$errors['email'][0];?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Название организации</label>
                        <div class="col-sm-8">
                            <input name="company" class="form-control" value="<?=$this->model->company;?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <button type="button" id="submitProfile">Сохранить</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<script src="<?=Yii::app()->request->baseUrl;?>/js/profile.js"></script>
