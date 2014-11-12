<tr style="display: none"><td colspan="10"></td></tr>
<tr style="display: none" id="iidr<?=$id?>">
    <td colspan="10">
        <table style="width: 100%"><tr><td style="width: 50%;" valign="top">
            <h3>Все заявки</h3>
            <table class="colabrators unconfirmReply">
                <thead><tr><td>Дата и время</td>
                    <td>Телефон исполнителя</td>
                    <td>Машин</td>
                    <td>Цена</td>
                    <td>Разница</td>
                    <td>Действие</td>
                </tr>
                </thead>
                <tbody>
                <? $replys = Requestshipping::getAlLNonConfirmReply($id);?>

                <?foreach($replys as $reply) {
                   // $reply = new ReplyShipping();
                    ?>
                <tr id="reply<?=$reply->id?>" ><td><?=MYChtml::view_date($reply->date_create)?></td>
                    <td><a href="#" class="colabrator_login"><?=MYChtml::view_date($reply->user->login)?></a></td>
                    <td><?=$reply->trucks_count?></td>
                    <td><?=$reply->price?> руб/кг</td>
                    <? $difference =  $request->price - $reply->price; ?>
                    <td class="priceUp"> <? if (($difference) != 0)  {echo (($difference) > 0)?"+".$difference:"-".$difference;} else echo 0;?> руб/кг</td>
                    <td> <a href="#"  data-rel="<?=$reply->id?>" data-content="<?=$id?>" class="confirm"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/right.png" width="16"></a>
                        <a href="#"  data-rel="<?=$reply->id?>"  data-content="<?=$id?>"  class="deletereply"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a></td>
                </tr>
                <?}?>
                </tbody>


            </table>
        </td>

            <td  valign="top">  <h3>Выбранные исполнители</h3>
                <table class="colabrators confirmReply" >
                    <thead><tr><td>Дата и время</td>
                        <td>Телефон исполнителя</td>
                        <td>Машин</td>
                        <td>Цена</td>
                        <td>Разница</td>
                        <td>Действие</td>
                    </tr>
                    </thead>
                    <tbody>
                    <? $replys = Requestshipping::getAlLConfirmReply($id);?>

                    <?foreach($replys as $reply) {
                    // $reply = new ReplyShipping();
                    ?>
                    <tr id="reply<?=$reply->id?>"><td><?=MYChtml::view_date($reply->date_create)?></td>
                        <td><a href="#"  class="colabrator_login"><?=MYChtml::view_date($reply->user->login)?></a></td>
                        <td><?=$reply->trucks_count?></td>
                        <td><?=$reply->price?> руб/кг</td>
                        <? $difference =  $request->price - $reply->price; ?>
                        <td class="priceUp"> <? if (($difference) != 0)  {echo (($difference) > 0)?"+".$difference:"-".$difference;} else echo 0;?> руб/кг</td>
                        <td> <a href="#"  data-content="<?=$id?>" data-rel="<?=$reply->id?>" class="unconfirm"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/left.png" width="16"></a>
                            <a href="#"  data-content="<?=$id?>"  data-rel="<?=$reply->id?>" class="deletereply"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a></td>
                    </tr>

                    <?}?>
                    </tbody>
                </table>
            </td>
        </tr>


        </table><br><br>
    </td>

</tr>