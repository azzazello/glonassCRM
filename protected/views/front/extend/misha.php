
<div style="margin-top: 20px; margin-left: 50px;">
    <?foreach($this->users as $item):?>
    <a href="<?=$this->createUrl('/rating?user='.$item->id);?>"><?=$item->name;?></a><br>
    <?endforeach;?>
</div>