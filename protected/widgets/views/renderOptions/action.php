<div id="actions">
    <form method="POST" action="<?=Yii::app()->controller->createUrl("/cabinet/actions");?>" id="action_form">
        <table>
            <tr>
                <td>

                    <select class="form-control" name="action">
                        <option value="del">Удалить</option><br>
                        <option value="block">Заброкировать</option><br>
                        <option value="unblock">Разблокировать</option><br>
                    </select>

                </td>
                <td id="actionBox">

                    <a id="actionsButton" class="btn btn-primary" data-toggle="modal" href="#">Выполнить</a>

                </td>
            </tr>


        </table>
        <input type="hidden" value="" name="array_autos" id="array_autos">
    </form>
</div>