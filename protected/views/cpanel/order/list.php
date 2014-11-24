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
        <th>���� ��������</th>
        <th>���� ���������</th>
        <th>������</th>
        <th>����� ��������</th>
        <th>����� ��������</th>
        <th>��������</th>
        <th>�����</th>
        <th>�������</th>
        <th>����������</th>
        <th>��������</th>
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
        <td><?=MYChtml::view_num($request->weight)?> ����</td>
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

        function toRight(id,idRequest) {
            $("#iidr"+idRequest+" .confirmReply").append($("#reply"+id));
            $("#reply"+id+" .confirm img").attr("src","<?=Yii::app()->request->baseUrl;?>/images/icons/left.png")
            $("#reply"+id+" .confirm").addClass("unconfirm");
            $("#reply"+id+" .confirm").removeClass("confirm");
        }

        function toLeft(id,idRequest) {
            $("#iidr"+idRequest+" .unconfirmReply").append($("#reply"+id));
            $("#reply"+id+" .unconfirm img").attr("src","<?=Yii::app()->request->baseUrl;?>/images/icons/right.png");
            $("#reply"+id+" .unconfirm").addClass("confirm");
            $("#reply"+id+" .unconfirm").removeClass("unconfirm");
        }

        function showError(title, text){
            jQuery.gritter.add({
                title: title,
                text: text,
                sticky: false,
                time: '5000'
            });
        }

        function rowDelete(id) {
            $("#idr"+id).remove();
        }


        function rowsDelete(id) {

            $.get("<?=$this->createUrl("/ajax/deleteonerequestshipping")?>",{"id":id},function(data) {
                if (data == "true") rowDelete(id); else  showError ( '������ � ��!', '�������� �� ������ ������������� �����.');
            });
        }


        function repliesConfirm(ids){

            changeStatus(ids, 1);
        }


        function repliesUnConfirm(ids){
            changeStatus(ids, 3);
        }

        function repliesDelete(ids){
            changeStatus(ids, 2);
        }



        function changeStatus(ids, newStatus) {
            var phones = new Array();
            var requestId = $("#deleteReply"+ids[0]).attr("data-content");
            ids.forEach( function(item){ phones.push($("#deleteReply"+item).attr("data-category")); });
            locked();
             $.get("<?=$this->createUrl("/ajax/changestatusreply")?>",{"ids":ids,"phones":phones,"requestId":requestId, "status":newStatus},function(data) {
                result = $.parseJSON(data);
                if (result.result != "error") {
                    result.ids.forEach(function(item){
                        switch(newStatus) {
                        case 1: toRight(item,requestId); break;
                        case 2: $("#reply"+item).remove(); break;
                        case 3: toLeft(item,requestId); break;
                        }
                    });
                    $("input[type='checkbox']").attr("checked",false);
                } else showError ( '������ � ��!', '�������� �� ������ ������������� �����.');
            }).complete(function(){unLocked()});

        }






        $(document).ready(function(){


            $(".buttonActionGroup").click(function(){
                  var requestId = $(this).attr("data-rel");
                  var actionId =  $("#"+requestId+"Button").val();
                  var ids = new Array();

               if( $("#"+requestId+" input[type='checkbox'][value != '0']:checked").length > 0) {

                   $("#"+requestId+" input[type='checkbox'][value != '0']:checked").each(function(key,item)
                   {
                        ids.push($(item).val());
                   }
                   );

                   switch(actionId) {
                       case "1":  repliesConfirm(ids); break;
                       case "2":  repliesDelete(ids); break;
                       case "3":  repliesUnConfirm(ids); break;
                   }


               } else {showError ("������ ������","�� ����� �� ���� �������");}
            });


            $(".checkAll").click(function(){
                var id = $(this).attr("data-rel");
                 $("#"+id+" input:checkbox").attr("checked",$(this).prop("checked"));
            });


            $(".select2").select2();
            $(".rows").click(function(){
               var row =  $(this);
               var id = $(this).attr("id");
               var id1 = $(this).attr("data-rel");
               $.get("<?=$this->createUrl("/ajax/addlastviewreply")?>",{"id":id1},function(data) {
                $("#viewsCount"+id1).remove();
                $("#i"+id).toggle();

                   row.toggleClass("highlight-row");

               });
            });



        $(".removeRow").click(function(){
            var id = $(this).attr("data-rel");
            if (confirm("�� ������������� ������ �������?")) {
                rowsDelete(id);
            }
           return false;
        });


            $(".confirm").live("click",function(){
                var id = $(this).attr("data-rel");
                var idRequest = $(this).attr("data-content");
                var phone = $(this).attr("data-category");
                repliesConfirm([id],idRequest);
                return false;
            });


            $(".unconfirm").live("click",function(){
                var id = $(this).attr("data-rel");
                var idRequest = $(this).attr("data-content");
                var phone = $(this).attr("data-category");
                repliesUnConfirm([id],idRequest);
                return false;
            });


            $(".deletereply").live("click",function(){
                var id = $(this).attr("data-rel");

                if (confirm("�� ������������� ������ ������� ���� �����?"))  {
                    repliesDelete([id])
                }
                return false;

            });

        });

    </script>