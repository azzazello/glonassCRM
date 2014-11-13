<?header('Content-Type: text/html; charset=windows-1251');?>
<form action="#" method="post">
<input type="radio" name="rating" <?if($rating->rating==1)echo 'checked';?> value="1">Положительный отзыв<br>
<input type="radio" name="rating" <?if($rating->rating==2)echo 'checked';?> value="2">Отрицательный отзыв
<br>
<br>
<textarea name="description"><?=$rating->description;?></textarea>
<br>
<br>
<input type="button" value="Редактировать" onclick="saveComment()">
</form>
<br>