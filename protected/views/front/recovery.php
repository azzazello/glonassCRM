<?=header('Content-Type: text/html; charset=utf-8');?>
<div style="width: 100%; height: 100%; background-color: #428BCA; margin: 0px; padding-top: 50px; padding-bottom: 50px;">

<div style="width: 500px; height: 370px; background-color: #FFFFFF;  border-radius: 3px; margin: auto;">
    <br>
    <br>

<p style="text-align: center;  color: #636E7B; font-size: 26px; font-weight: 500;  font-family: inherit;">Здравствуйте</p>
    <br>


<p style="line-height: 1.5em; text-align: center; font-size: 22px; color: #636E7B; font-weight: 500;  font-family: inherit;">Для восстановления пароля <br>перейдите по ссылке</p>
    <br>

<div style="width: 290px; height: 100px; margin: auto;">
<a style="display: block; text-align: center; text-decoration: none; width: 100%; border-radius: 3px; background-color: #428BCA; color: #FFFFFF; padding: 10px;" href="http://localhost/zernovoz/login/newpassword?id=<?=$data->id;?>&generate=<?=$data->generate;?>">Восстановить</a>
</div>

</div>

</div>