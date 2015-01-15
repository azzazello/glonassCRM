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
                    <td>п\п</td>
                    <th>Номер авто</th>
                    <th>Всего установка</th>
                    <th>Всего а/п</th>
                    <th>Абонентская плата</th>
                    <th>Остаток по а/п</th>
                    <th>Фамилия</th>
                    <th>Номер договора</th>
                    <th width="100">Номер акта</th>
                    <th>Комментарий</th>
                    <th>Действие</th>
                </tr>
                </thead>

                <tbody>



                <?

                $i = $pages->getCurrentPage()*100;
                foreach ($trucks as $truck) {
$i++;
                   // $truck = new Trucks();

                    ?>
                <tr class="rows" id="idr<?=$truck->id?>" data-rel="<?=$truck->id?>">
                    <td><?=$i?></td>
                    <td  class="isCloseInstallation<?=$truck->installation_is_close?>"><?=$truck->plate?></td>
                    <td><?=$truck->amountInstallation()?></td>
                    <td><?=$truck->amountFeeLicense()?></td>
                    <td><?=$truck->daily_license_fee?></td>
                    <td><?=$truck->balance_license_fee?></td>
                    <td><?=$truck->fio?></td>
                    <td><?=$truck->contract_number?></td>
                    <td><?=$truck->act_number?></td>
                    <td><?=$truck->comment?></td>


                    <td>
                        <a href=""><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/edit.png" width="16"></a>
                        <a href="#" class="removeRow" data-rel="<?=$truck->id?>" ><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a>
                    </td>
                </tr>
                <tr id="zreport<?=$truck->id?>" style="display: none">
                    <td colspan="7" class="conttext">


                    </td>

                </tr>

                    <?}?>



                </tbody>
            </table><br>
            <?php $this->widget('CLinkPager', array("header"=>"Страницы: ",
            "nextPageLabel"=>"След",
            "prevPageLabel"=>"Пред",
            "firstPageLabel"=>"Первая",
            "lastPageLabel"=>"Последняя",

    'pages' => $pages,  )) ?>
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