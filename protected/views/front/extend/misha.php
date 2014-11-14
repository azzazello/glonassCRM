<br>
<br><br>
<div style="margin-left: 50px;">
    <a href="<?=$this->createUrl($this->inSystemUrl);?>"><?=$this->inSystem?'Выйти':'Войти';?></a><br>

    <?if($this->inSystem):?>
    <a href="<?=$this->createUrl('/cabinet');?>">Личный кабинет</a><br>
    <?endif;?>

    <a href="<?=$this->createUrl('user/registration');?>">Регистрация</a>
</div>


<hr>

<div style="margin-top: 20px; margin-left: 50px;">
    <?foreach($this->users as $item):?>
    <a href="<?=$this->createUrl('/rating?user='.$item->id);?>"><?=$item->name;?></a><br>
    <?endforeach;?>
</div>