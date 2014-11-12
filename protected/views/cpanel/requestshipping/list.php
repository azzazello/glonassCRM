<?
foreach ($result as $value) {
    //$value = new RequestShipping();

?>
   <table border="1" width="600px">
       <thead>
       <tr><th width="200px"><?=$value->culure->culture?></th><th><?=$value->date_load?></th><th><?=$value->date_close?></th></tr>
       </thead>
       <tbody>
       <tr><td>Место погрузки</td><td colspan="2"><?=$value->region_load_text?></td></tr>
       <tr><td>Место выгрузки</td><td colspan="2"><?=$value->regionUnload->name?></td></tr>
       <tr><td>Стивидор</td><td colspan="2"><?=$value->stevedore->name?></td></tr>
       <tr><td>Трейдера</td><td colspan="2"><?=$value->trader->firm?></td></tr>
       <tr><td>Расстояние,км</td><td colspan="2"><?=$value->distance?></td></tr>
       <tr><td>Цена перевозки</td><td colspan="2"><?=$value->price?></td></tr>
       <tr><td>Грузподъемность весов на погрузке</td><td colspan="2"><?=$value->scale?></td></tr>
       <?if ($value->is_overload == 1) {?><tr><td>Работаем только без перегруза</td><td colspan="2">ДА</td></tr><?}?>
       <tr><td>Способ погрузки</td><td colspan="2"><?=$value->loadType->name?></td></tr>
       <tr><td>Объем перевозки</td><td colspan="2"><?=$value->weight?></td></tr>
       <tr><td>Способо и место расчета</td><td colspan="2"><?=$value->where_calculation?></td></tr>
       </tbody>
   </table><br><br>


<?}?>