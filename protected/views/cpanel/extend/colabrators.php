<tr style="display: none" xmlns="http://www.w3.org/1999/html"><td colspan="10"></td></tr>
<tr style="display: none" id="iidr<?=$id?>">
    <td colspan="10">

        <table style="width: 100%"><tr><td style="width: 49%;" valign="top">
            <form id="checkAllLeft<?=$id?>">
            <h3>Все заявки</h3>
            <table class="colabrators unconfirmReply">
                <thead><tr>
                    <td><input type="checkbox" class="checkAll" data-rel="checkAllLeft<?=$id?>" value="0"></td>
                    <td style="width: 120px">Дата и время</td>
                    <td  style="width: 120px">Телефон исполнителя</td>
                    <td>Машин</td>
                    <td>Цена <small style="font-weight: normal">ваша,<br>исполнителя/разница</small> </td>

                    <td></td>
                </tr>
                </thead>
                <tbody>
                <? $replys = Requestshipping::getAlLNonConfirmReply($id);?>

                <?foreach($replys as $reply) {
                   // $reply = new ReplyShipping();
                    ?>
                <tr id="reply<?=$reply->id?>" >
                    <td><input type="checkbox" value="<?=$reply->id?>"></td>
                    <td><?=MYChtml::view_date($reply->date_create)?></td>
                    <td><a href="#" class="colabrator_login"><?=MYChtml::view_date($reply->user->login)?></a></td>
                    <td><?=$reply->trucks_count?></td>
                    <td class="priceTd"><b><?=$reply->price?> руб/кг</b><br>
                    <?=$request->price;?> руб/кг<br>
                    <?$difference =  $reply->price - $request->price; ?>
                    <span style="color: green"><? if (($difference) != 0)  {echo (($difference) > 0)?"+".$difference:"-".$difference;} else echo 0;?> руб/кг</span></td>
                    <td> <a href="#"  data-rel="<?=$reply->id?>" id="changeStatusReply<?=$reply->id?>" data-content="<?=$id?>" data-category="<?=$reply->user->login?>" class="confirm anchorForActionRight<?=$id?>"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/right.png" width="16"></a>
                        <a href="#"  data-rel="<?=$reply->id?>" id="deleteReply<?=$reply->id?>" data-content="<?=$id?>" data-category="<?=$reply->user->login?>"  class="deletereply"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a></td>
                </tr>
                <?}?>
                </tbody>
            </table>

            <div style="color: #545454; padding-top: 20px">Сделать с выбранными: <select class="padding-select" id="checkAllLeft<?=$id?>Button">
                <option value="1">Выбрать исполнителем</option>
                <option value="2">Удалить из заявки</option>
            </select>
                <input type="button" value="Выполнить" data-rel="checkAllLeft<?=$id?>" class="buttonActionGroup">
            </div>
        </form>
        </td>

            <td  valign="top" style="padding-left: 20px">  <h3>Выбранные исполнители</h3>

                <form id="checkAllRight<?=$id?>">
                <table class="colabrators confirmReply" >
                    <thead><tr>
                        <td><input type="checkbox" class="checkAll" data-rel="checkAllRight<?=$id?>"  value="0"></td>
                        <td style="width: 120px">Дата и время</td>
                        <td  style="width: 120px">Телефон исполнителя</td>
                        <td>Машин</td>
                        <td>Цена <small style="font-weight: normal">ваша,<br>исполнителя/разница</small> </td>

                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <? $replys = Requestshipping::getAlLConfirmReply($id);?>

                    <?foreach($replys as $reply) {
                    // $reply = new ReplyShipping();
                    ?>
                    <tr id="reply<?=$reply->id?>">
                        <td><input type="checkbox" value="<?=$reply->id?>"></td>
                        <td><?=MYChtml::view_date($reply->date_create)?></td>
                        <td><a href="#"  class="colabrator_login"><?=MYChtml::view_date($reply->user->login)?></a></td>
                        <td><?=$reply->trucks_count?></td>

                        <td class="priceTd"><b><?=$reply->price?> руб/кг</b><br>
                            <?=$request->price;?> руб/кг<br>
                            <?$difference =  $reply->price - $request->price; ?>
                            <span style="color: green"><? if (($difference) != 0)  {echo (($difference) > 0)?"+".$difference:"-".$difference;} else echo 0;?> руб/кг</span></td>
                        <td> <a href="#"  data-content="<?=$id?>" id="changeStatusReply<?=$reply->id?>" data-rel="<?=$reply->id?>" data-category="<?=$reply->user->login?>" class="unconfirm"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/left.png" width="16"></a>
                            <a href="#"  data-content="<?=$id?>"   id="deleteReply<?=$reply->id?>"  data-rel="<?=$reply->id?>" data-category="<?=$reply->user->login?>" class="deletereply"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a></td>
                    </tr>

                    <?}?>
                    </tbody>
                </table>

                <div style="color: #545454; padding-top: 20px">Сделать с выбранными: <select class="padding-select"  id="checkAllRight<?=$id?>Button">
                    <option value="3">Убрать исполнителя</option>
                    <option value="2">Удалить из заявки</option>
                </select>
                    <input type="button" value="Выполнить" data-rel="checkAllRight<?=$id?>" class="buttonActionGroup">
                </div>
            </td>
        </tr>

        </table><br><br>
</form>
    </td>

</tr>