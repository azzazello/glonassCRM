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
        <th>Дата отчета</th>
        <th>Количество платежей</th>
        <th>Сумма по отчету</th>
        <th>Сумма по программе</th>

        <th>Коммент</th>
        <th>Действие</th>
    </tr>
    </thead>

    <tbody>



    <? foreach ($zreports as $zreport) {

    ?>
        <tr class="rows" id="idr<?=$request->id?>" data-rel="<?=$zreport->int?>">
        <td><?=$zreport->date?></td>
        <td><?=$zreport->z_report?></td>
        <td><?=$zreport->fact_amount?></td>
        <td><?=$zreport->count_payment?></td>

        <td><?=$zreport->comment?></td>

        <td>
            <a href=""><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/edit.png" width="16"></a>
            <a href="#" class="removeRow" data-rel="<?=$request->id?>" ><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a>
        </td>
        </tr>
        <tr id="zreport<?=$zreport->int?>" style="display: none">
              <td colspan="7" class="conttext">


              </td>

          </tr>

    <?}?>



    </tbody>
    </table>
    </div><!-- panel -->

    <br />



    </div><!-- contentpanel -->

</div>

    <script>







        $(document).ready(function(){
            $(".rows").click(function(){
               var row = $("#zreport"+$(this).attr("data-rel"));
                $.get("<?=$this->createUrl("/ajax/getpaymentsforzreport")?>",{id:$(this).attr("data-rel")},function(data){
                    result = $.parseJSON(data);
                    row.find(".conttext").html("");
                    ss = "<table class='colabrators unconfirmReply'>";
                    result.forEach(function(item){

                        ss +="<tr><td>"+item.plate+"</td><td>"+(item.amount_installation)+" руб</td></tr>";

                    });
                    ss += "</table>";
                    row.find(".conttext").html(ss);


                    row.toggle();

                });

            });

        });

    </script>