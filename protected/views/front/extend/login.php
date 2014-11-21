<?if(!$this->inSystem){?>
<form action="<?=$this->createUrl('/login');?>" method="post" id="loginForm">
    <label for="login">Логин: </label><input type="text" id="login" name="LoginForm[login]" placeholder="Введите логин"/>
    <label for="password">Пароль: </label><input type="password" id="password" name="LoginForm[password]" placeholder="Введите пароль">
    <button id="loginSubmit" type="button"><img src="<?=Yii::app()->request->baseUrl;?>/images/front/go.png"></button>
</form>

    <div class="forgotContainer">
        <a href="<?=$this->createUrl('/login/recovery');?>" class="forgot">Забыли пароль?</a>
        <a href="<?=$this->createUrl('user/registration');?>" class="signin">Регистрация</a>
    </div>
<?}else{?>
<div class="forgotContainer" style="top: 10px; width: 200px; right: -30px;">
    <a href="<?=$this->createUrl('./cpanel/');?>" class="forgot">Личный кабинет</a>
    <a href="<?=$this->createUrl('/login/exit');?>" class="signin">Выйти</a>
</div>
<?}?>