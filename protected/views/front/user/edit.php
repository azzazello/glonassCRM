<style>
    span{
        font-size: 14px;
        color: red;
    }
</style>
<a href="<?=$this->createUrl('/cabinet');?>">�����</a>
<div style="margin-left: 100px;">
    <form action="<?=$this->createUrl('edit');;?>" method="post">

        <p>����� *<input type="text" value="<?=$this->model->login;?>" name="login"><br>
            <span><?=$errors['login'][0];?></span>
        </p>
        <p>������ *<input type="password" value="" name="password"><br>
            <span><?=$errors['password'][0];?></span>
        </p>

        <p>��������� ������ *<input type="password" value="" name="password_repeat"><br>
            <span><?if(!$this->repeat) echo '������ �� ���������';?></span>
        </p>

        <p>Skype<input type="text" value="<?=$this->model->skype;?>" name="skype"><br></p>

        <p>Email *<input type="text" value="<?=$this->model->email;?>" name="email"><br>
            <span><?=$errors['email'][0];?></span>
        </p>

        <p>������� *<input type="text" value="<?=$this->model->phone;?>" name="phone"><br>
            <span><?=$errors['phone'][0];?></span>
        </p>

        <p>��� *<input type="text" value="<?=$this->model->contact_fio;?>" name="contact_fio"><br>
            <span><?=$errors['contact_fio'][0];?></span>
        </p>

        <p>�������� ����������� *<input type="text" value="<?=$this->model->organization_name;?>" name="organization_name"><br>
            <span><?=$errors['organization_name'][0];?><br></span>
        </p>

        <br>
        <input type="submit" value="������������������">
    </form>
</div>