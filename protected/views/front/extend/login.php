<?if(!$this->inSystem){?>
<form action="<?=$this->createUrl('/login');?>" method="post" id="loginForm">
    <label for="login">�����: </label><input type="text" id="login" name="LoginForm[login]" placeholder="������� �����"/>
    <label for="password">������: </label><input type="password" id="password" name="LoginForm[password]" placeholder="������� ������">
    <button id="loginSubmit" type="button"><img src="<?=Yii::app()->request->baseUrl;?>/images/front/go.png"></button>
</form>

    <div class="forgotContainer">
        <a href="<?=$this->createUrl('/login/recovery');?>" class="forgot">������ ������?</a>
        <a href="<?=$this->createUrl('user/registration');?>" class="signin">�����������</a>
    </div>
<?}else{?>
<div class="forgotContainer" style="top: 10px; width: 200px; right: -30px;">
    <a href="<?=$this->createUrl('./cpanel/');?>" class="forgot">������ �������</a>
    <a href="<?=$this->createUrl('/login/exit');?>" class="signin">�����</a>
</div>
<?}?>