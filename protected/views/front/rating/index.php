<a href="<?=$this->createUrl('/main');?>">�� �������</a>
<?print_r($this->errors);?>
<div style="margin-left: 100px;">
<form action="<?=$this->createUrl('index?user='.$_GET['user']);?>" method="post">
<input type="radio" name="rating" checked value="1">������������� �����<br>
<input type="radio" name="rating" value="2">������������� �����
<br>
<br>
<textarea name="description"></textarea>
<br>
<br>
<input type="submit" value="���������">
</form>
</div>