<a href="<?=$this->createUrl('/main');?>">На главную</a>
<?print_r($this->errors);?>
<div style="margin-left: 100px;">
<form action="<?=$this->createUrl('index?user='.$_GET['user']);?>" method="post">
<input type="radio" name="rating" checked value="1">Положительный отзыв<br>
<input type="radio" name="rating" value="2">Отрицательный отзыв
<br>
<br>
<textarea name="description"></textarea>
<br>
<br>
<input type="submit" value="Сохранить">
</form>
</div>