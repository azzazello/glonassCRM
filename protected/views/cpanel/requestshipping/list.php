<?
foreach ($result as $value) {
    //$value = new RequestShipping();

?>
   <table border="1" width="600px">
       <thead>
       <tr><th width="200px"><?=$value->culure->culture?></th><th><?=$value->date_load?></th><th><?=$value->date_close?></th></tr>
       </thead>
       <tbody>
       <tr><td>����� ��������</td><td colspan="2"><?=$value->region_load_text?></td></tr>
       <tr><td>����� ��������</td><td colspan="2"><?=$value->regionUnload->name?></td></tr>
       <tr><td>��������</td><td colspan="2"><?=$value->stevedore->name?></td></tr>
       <tr><td>��������</td><td colspan="2"><?=$value->trader->firm?></td></tr>
       <tr><td>����������,��</td><td colspan="2"><?=$value->distance?></td></tr>
       <tr><td>���� ���������</td><td colspan="2"><?=$value->price?></td></tr>
       <tr><td>��������������� ����� �� ��������</td><td colspan="2"><?=$value->scale?></td></tr>
       <?if ($value->is_overload == 1) {?><tr><td>�������� ������ ��� ���������</td><td colspan="2">��</td></tr><?}?>
       <tr><td>������ ��������</td><td colspan="2"><?=$value->loadType->name?></td></tr>
       <tr><td>����� ���������</td><td colspan="2"><?=$value->weight?></td></tr>
       <tr><td>������� � ����� �������</td><td colspan="2"><?=$value->where_calculation?></td></tr>
       </tbody>
   </table><br><br>


<?}?>