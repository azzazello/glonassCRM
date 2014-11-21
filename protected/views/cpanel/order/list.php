<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-home"></i>
            </div>
            <?$this->renderPartial("application.views.cpanel.extend.breadcumb")?>
        </div><!-- media -->
    </div><!-- pageheader -->

    <div class="contentpanel">
    <p class="mb20"><a href="http://datatables.net/" target="_blank">DataTables</a> is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</p>

    <div class="panel panel-primary-head">
    <div class="panel-heading">
        <h4 class="panel-title">Basic Configuration</h4>
        <p>Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example.</p>
    </div><!-- panel-heading -->
<br>
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
        <th>Ответов</th>
        <th>Поставлено</th>
        <th>Действие</th>
    </tr>
    </thead>

    <tbody>



    <?foreach($requests as $request) {
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
        <td><b><a href=""><?=OperationWithRequests::getCountOfReply($request->id)?></a></b><?=($newViews!=0)?" <a class='greenA' id='viewsCount".$request->id."' href='#'>(+".$newViews.")</a>":""?></td>
        <td><a class="greenA" href="fsdfsdfds"><?=OperationWithRequests::getCountOfConfirmReply($request->id)?></a></td>
        <td>
            <a href=""><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/edit.png" width="16"></a>
            <a href="#" class="removeRow" data-rel="<?=$request->id?>" ><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a>
        </td>
        </tr>
    <?php $this->renderPartial("application.views.cpanel.extend.colabrators",array("id"=>$request->id, "request"=>$request));?>
    <?}?>



    </tbody>
    </table>
    </div><!-- panel -->

    <br />



    </div><!-- contentpanel -->

</div>

    <script>
        $(document).ready(function(){


            $(".select2").select2();
            $(".rows").click(function(){
               var id = $(this).attr("id");
               var id1 = $(this).attr("data-rel");
               $.get("<?=$this->createUrl("/ajax/addlastviewreply")?>",{"id":id1},function(data) {
                $("#viewsCount"+id1).remove();
                $("#i"+id).toggle();
               });
            });

        $(".removeRow").click(function(){
            var id = $(this).attr("data-rel");
            if (confirm("Вы действительно хотите удалить?")) {
            $.get("<?=$this->createUrl("/ajax/deleteonerequestshipping")?>",{"id":id},function(data) {
               if (data == "true") $("#idr"+id).remove();
                else {
                   jQuery.gritter.add({
                       title: 'Ошибка в БД!',
                       text: 'Сообщите об ошибке администрации сайта.',
                       sticky: false,
                       time: '5000'
                   });
               }
            });
            }
           return false;
        });


            $(".confirm").live("click",function(){
                var id = $(this).attr("data-rel");
                var idRequest = $(this).attr("data-content");
                var phone = $(this).attr("data-category");

                $.get("<?=$this->createUrl("/ajax/confirmreply")?>",{"id":id,"phone":phone},function(data) {
                    if (data == "true") {

                        $("#iidr"+idRequest+" .confirmReply").append($("#reply"+id));
                        $("#reply"+id+" .confirm img").attr("src","<?=Yii::app()->request->baseUrl;?>/images/icons/left.png")
                        $("#reply"+id+" .confirm").addClass("unconfirm");
                        $("#reply"+id+" .confirm").removeClass("confirm");
                    } else
                    {
                        jQuery.gritter.add({
                            title: 'Ошибка в БД!',
                            text: 'Сообщите об ошибке администрации сайта.',
                            sticky: false,
                            time: '5000'
                        });
                    }
                });

                return false;
            });


            $(".unconfirm").live("click",function(){
                var id = $(this).attr("data-rel");
                var idRequest = $(this).attr("data-content");
                var phone = $(this).attr("data-category");
                $.get("<?=$this->createUrl("/ajax/unconfirmreply")?>",{"id":id,"phone":phone},function(data) {
                    if (data == "true") {

                        $("#iidr"+idRequest+" .unconfirmReply").append($("#reply"+id));
                        $("#reply"+id+" .unconfirm img").attr("src","<?=Yii::app()->request->baseUrl;?>/images/icons/right.png");
                        $("#reply"+id+" .confirm").addClass("confirm");
                        $("#reply"+id+" .confirm").removeClass("unconfirm");
                    } else
                    {
                        jQuery.gritter.add({
                            title: 'Ошибка в БД!',
                            text: 'Сообщите об ошибке администрации сайта.',
                            sticky: false,
                            time: '5000'
                        });
                    }
                });

                return false;
            });


            $(".deletereply").live("click",function(){
                var id = $(this).attr("data-rel");
                var phone = $(this).attr("data-category");
                if (confirm("Вы действительно хотите удалить этот ответ?"))  {
                $.get("<?=$this->createUrl("/ajax/delconfirmreply")?>",{"id":id,"phone":phone},function(data) {
                    if (data == "true") {

                        $("#reply"+id).remove();
                    } else
                    {
                        jQuery.gritter.add({
                            title: 'Ошибка в БД!',
                            text: 'Сообщите об ошибке администрации сайта.',
                            sticky: false,
                            time: '5000'
                        });
                    }
                });
                }
                return false;

            });

        });

    </script>