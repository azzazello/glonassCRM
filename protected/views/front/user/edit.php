<style>
    span{
        font-size: 14px;
        color: red;
    }
</style>
<a href="<?=$this->createUrl('/cabinet');?>">Назад</a>
<div style="margin-left: 100px;">
    <form action="<?=$this->createUrl('edit');;?>" method="post">

        <p>Логин *<input type="text" value="<?=$this->model->login;?>" name="login"><br>
            <span><?=$errors['login'][0];?></span>
        </p>
        <p>Пароль *<input type="password" value="" name="password"><br>
            <span><?=$errors['password'][0];?></span>
        </p>

        <p>Повторите пароль *<input type="password" value="" name="password_repeat"><br>
            <span><?if(!$this->repeat) echo 'Пароли не совпадают';?></span>
        </p>

        <p>Skype<input type="text" value="<?=$this->model->skype;?>" name="skype"><br></p>

        <p>Email *<input type="text" value="<?=$this->model->email;?>" name="email"><br>
            <span><?=$errors['email'][0];?></span>
        </p>

        <p>Телефон *<input type="text" value="<?=$this->model->phone;?>" name="phone"><br>
            <span><?=$errors['phone'][0];?></span>
        </p>

        <p>ФИО *<input type="text" value="<?=$this->model->contact_fio;?>" name="contact_fio"><br>
            <span><?=$errors['contact_fio'][0];?></span>
        </p>

        <p>Название организации *<input type="text" value="<?=$this->model->organization_name;?>" name="organization_name"><br>
            <span><?=$errors['organization_name'][0];?><br></span>
        </p>

        <br>
        <input type="submit" value="Зарегестрироваться">
    </form>
</div>