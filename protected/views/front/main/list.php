<div class="path" xmlns="http://www.w3.org/1999/html">���������� ������</div>
<div style="padding-top: 90px"></div>
<table class="contentOnMain">
    <tr>

        <td>



            <table id="basicTable" class="table table-striped table-bordered responsive">
                <thead class="">
                <tr>
                    <th>���� ��������</th>
                    <th>���� ���������</th>
                    <th>������</th>
                    <th>����� ��������</th>
                    <th>����� ��������</th>
                    <th>��������</th>
                    <th>�����</th>

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
                    <td><?=MYChtml::view_num($request->weight)?> ����</td>
                    <?$newViews=OperationWithRequests::getCountOfNewReply($request->id);?>

                </tr>

                    <?}?>



                </tbody>
            </table>


            <h1>
                ��� ������ ������ ����������������� ��� �������������� �������� ������� ������ ���������� ����������
            </h1>

        </td>
    </tr>


</table>