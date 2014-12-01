<div class="path" xmlns="http://www.w3.org/1999/html">Актуальные заявки</div>
<div style="padding-top: 90px"></div>
<table class="contentOnMain">
    <tr>

        <td>



            <table id="basicTable" class="table table-striped table-bordered responsive">
                <thead class="">
                <tr>
                    <th>Дата создания</th>
                    <th>Дата окончания</th>
                    <th>Статус</th>
                    <th>Место погрузки</th>
                    <th>Место выгрузки</th>
                    <th>Культура</th>
                    <th>Объем</th>

                </tr>
                </thead>

                <tbody>



                <?foreach($result as $request) {
                    //$request = new RequestShipping();
                    ?>
                <tr class="rows" id="idr<?=$request->id?>" data-rel="<?=$request->id?>">
                    <td><?=MYChtml::view_date($request->date_create)?></td>
                    <td><?=MYChtml::view_date($request->date_close)?></td>
                    <td><?=$request->status->name_for_all?></td>
                    <td><?=$request->region_load_text?></td>
                    <td><?=$request->regionUnload->name.", ".$request->stevedore->name?></td>
                    <td><?=$request->culure->culture?></td>
                    <td><?=MYChtml::view_num($request->weight)?> тонн</td>
                    <?$newViews=OperationWithRequests::getCountOfNewReply($request->id);?>

                </tr>

                    <?}?>



                </tbody>
            </table>


            <h1>
                Для подачи заявок зарегистрируйтесь или воспользуйтесь учетными данными вашего мобильного приложения
            </h1>

        </td>
    </tr>


</table>