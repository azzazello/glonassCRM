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
                <tr><td></td>
                    <td>п\п</td>
                    <th>Номер авто</th>
                    <th>Тип</th>
                    <th>Всего установка</th>
                    <th>Всего а/п</th>
                    <th>Абонентская плата</th>
                    <th>Остаток по а/п</th>
                    <th>Номер устройства</th>
                    <th>Номер договора</th>
                    <th width="100">Номер акта</th>
                    <th>Комментарий</th>
                    <th>Действие</th>
                </tr>
                </thead>

                <tbody id="listBody">

                <form action="<?=$this->createUrl("/trucks/CheckBeforeSendAccess")?>" method="post">

                <?

                $i = $pages->getCurrentPage()*30;
                foreach ($trucks as $truck) {
$i++;


                  // $truck = new Trucks();

                    ?>

                <tr class="rows" id="idr<?=$truck->id?>" data-rel="<?=$truck->id?>">
                    <td class="noclick"><input type="checkbox" name="plate[]" value="<?=$truck->plate?>"></td>
                    <td><?=$i?></td>
                    <td  class="isCloseInstallation<?=$truck->installation_is_close?>"><?=$truck->plate?></td>
                    <td><?=$this->type[$truck->type]?></td>
                    <td><?=$truck->amountInstallation()?></td>
                    <td><?=$truck->amountFeeLicense()?></td>
                    <td><?=$truck->daily_license_fee?></td>
                    <td><?=$truck->balance_license_fee?></td>
                    <td class="deviceIdList" id="devId<?=$truck->glonass->device_id?>"><?=$truck->glonass->device_id?></td>
                    <td><?=$truck->contract_number?></td>
                    <td><?=$truck->act_number?></td>

                    <td><?=$truck->comment?></td>


                    <td class="noclick">
                        <a href="" class="addAct" data-rel="<?=$truck->plate?>" data-header="<?=$truck->act_number?>"  data-content="<?=$truck->glonass->device_id;?>" style="color: green">+ Акт</a>
                        <a href=""><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/edit.png" width="16"></a>
                        <a href="#" class="removeRow" data-rel="<?=$truck->id?>" ><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a>
                        <a href="#" class="addFeeLic" data-rel="<?=$truck->plate?>" ><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/plus_rub.png"  width="24"></a>
                    </td>
                </tr>
                <tr id="zreport<?=$truck->id?>" style="display: none">
                    <td colspan="7" class="conttext">


                    </td>

                </tr>

                    <?}?>
                <tr><td colspan="12"><input type="submit" value="Cделать Доступ"></td></tr>
                </form>

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





    function saveAddFee(){


        var dates = $("#dateAddFee").val();
        var amountAddFee = $("#amountAddFee").val();
        var plateAddFee = $("#plateAddFee").val();
        $.get("<?=$this->createUrl("/ajax/saveaddfee")?>",{"dates":dates, "amountAddFee":amountAddFee, "plateAddFee":plateAddFee}, function(data) {

            if (data == "good") $("#resultSaveFee").html("Оль из гуд"); else $("#resultSaveFee").html("<span style='color: red'>Оль из бэд</span>");
            bootbox.hideAll();


        });

    }



    function saveAct(){


        var actNum = $("#actNum").val();
        var deviceId = $("#deviceId").val();
        var plate = $("#plateAct").val();
        $.get("<?=$this->createUrl("/ajax/saveact")?>",{"actNum":actNum, "deviceId":deviceId, "plate":plate}, function(data) {

            if (data == "good") $("#resultSaveFee").html("Оль из гуд"); else $("#resultSaveFee").html("<span style='color: red'>Оль из бэд</span>");
            bootbox.hideAll();


        });

    }



    $(document).ready(function(){



        $(".deviceIdList").each( function(k,v) {
            var devId = $(v).text();
            $.get("<?=$this->createUrl("/ajax/checkconnect")?>",{"devId":devId},function(data){
                    if (data.length > 1) {$("#devId"+devId).css("background-color","#C9FFD3");} else $("#devId"+devId).css("background-color","#FFE1D7");
            });

        });



        $(".addFeeLic").click(function(){
            var plate = $(this).attr("data-rel");
            bootbox.alert("<form id='formAddFee'><div id='resultSaveFee'></div><b>Добавление абонплаты</b><br><input type='text' value='<?=date("Y-m-d")?>' class='maskdate' id='dateAddFee'> <label for='dateAddFee'>Дата платежа</label>" +
                    "<br>" +

                    "<input type='text' value='' class='maskdate' id='amountAddFee'> <label for='dateAddFee'>Сумма платежа</label>" +
                    "<input type='hidden' value='"+plate+"'  id='plateAddFee'> " +
                    "<br>" +
                    "<input type='button' value='Добавить' id='addButtonAddFee' onclick='saveAddFee()'></form>")

        });


        $(".addAct").click(function(){
            var plate = $(this).attr("data-rel");
            if ($(this).attr("data-header").length == 0) var actNum = "<?=date("d/m/Y")?>"; else var actNum = $(this).attr("data-header");
            bootbox.alert("<form id='formAddFee'><div id='resultSaveFee'></div><b>Добавление акта</b><br><input type='text' value='"+actNum+"'  id='actNum'> <label for='actNum'>Номер акта</label>" +
                    "<br>" +
                    "<input type='text' value='"+$(this).attr("data-content")+"'  id='deviceId' maxlength='8'> <label for='deviceId'>Номер устройства</label>" +
                    "<input type='hidden' value='"+plate+"'  id='plateAct'> " +
                    "<br>" +
                    "<input type='button' value='Добавить' id='addButtonAddFee' onclick='saveAct()'></form>")
            return false;

        });




        $(".rows td:not(.noclick)").click(function(){
            var row = $("#zreport"+$(this).parent().attr("data-rel"));

            $.get("<?=$this->createUrl("/ajax/getpayments")?>",{"id":$(this).parent().attr("data-rel")},function(data){
                result = $.parseJSON(data);
                row.find(".conttext").html("");
                ss = "<table class='colabrators unconfirmReply'>" +
                        "<tr><td>Дата</td><td>Установка</td><td>Абонплата</td></tr>";
                          result.forEach(function(item){

                    ss +="<tr><td>"+(item.date)+" руб</td><td>"+(item.amount_installation)+" руб</td><td>"+(item.amount_fee_license)+" руб</td></tr>";

                });
                ss += "</table>";
                row.find(".conttext").html(ss);


                row.toggle();

            });

        });

    });

</script>