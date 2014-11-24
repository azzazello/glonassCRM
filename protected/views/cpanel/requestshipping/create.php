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

        <div class="panel panel-primary-head">
        <div class="panel-heading">
            <h4 class="panel-title">Добавление новой заявки</h4>
            <p>Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example.</p>
        </div><!-- panel-heading -->

<br>

            <?
            if ($result["result"] == "error") {
            if ($result["errno"] > 0) echo MYChtml::alert_msg($this->errorSave[$result["errno"]]);
            if ($result["errno"] == -1) echo MYChtml::alert_msg("Сообщить об ошибке в БД");
            }
            if ($result["result"] == "noerror") {
                $this->redirect($this->createUrl("requestshipping/create",array("success"=>1)));
                //echo MYChtml::success_msg("Заявка на перевозку сохранена.");
            }

            if ($_GET['success']==1) {
                echo MYChtml::success_msg("Заявка на перевозку сохранена.");
            }



            ?>
            <br>
            <div class="panel-body nopadding" style="max-width: 1000px">
<form action="<?=$this->createUrl("create",array("select"=>1))?>" method="post"  class="form-horizontal form-bordered">



    <div class="form-group">
    <label class="col-sm-4 control-label">Выберите регион</label>
    <div class="col-sm-8">
        <?echo FormHTML::select($all_region,"regions","regions","Выберите регион");?>
    </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Выберите населенный пункт</label>
        <div class="col-sm-8">
            <?echo FormHTML::inputSelect2("locality","locality","Выберите населенный пункт");?>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">Дата закрытия получения заявок:</label>
        <div class="col-sm-8">
            <input class="datepicker form-control" name='date_end'>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Дата начала погрузки:</label>
        <div class="col-sm-8">
            <input  class="datepicker  form-control" value="" name="date_load" id="date_load">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Выберите регион выгрузки:</label>
        <div class="col-sm-8">
            <?echo FormHTML::select(RegionUnload::getAll(),"regionUnload","regionUnload","Выберите регион выгрузки");?>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">Выберите стивидора:</label>
        <div class="col-sm-8">
            <?echo FormHTML::select(array(),"stevedore","stevedore","Выберите регион выгрузки");?>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">Расстояние,км:</label>
        <div class="col-sm-8">
            <input value="" name="distance" id="distance" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Выберите Культуру:</label>
        <div class="col-sm-8">
            <?=FormHTML::select(Culture::getAll(),"culture","culture","Выберите культуру");?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Выберите Трейдера:</label>
        <div class="col-sm-8">
            <?=FormHTML::select(Trader::getAll(),"trader","trader","Выберите трейдера");?>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">Цена перевозки, руб/кг:</label>
        <div class="col-sm-8">
            <input name="price" id="price" class="float  form-control">
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">Грузподъемность весов на погрузке, тонн:</label>
        <div class="col-sm-8">
            <input name="scale" id="scale" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Способ погрузки:</label>
        <div class="col-sm-8">
            <?=FormHTML::select(LoadType::getAll(),"load_type","load_type","Выберите способ погрузки");?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Объем перевозки, тонн:</label>
        <div class="col-sm-8">
            <input name="weight" id="weight" class="float  form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Где расчет:</label>
        <div class="col-sm-8">
            <input type="text" value="" name='where_calculation' id="where_calculation" class="form-control"><a href="#" id="uncash">перечислением</a>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Дополнительное описание<div style="color: #808080">укажите важну информацию по перевозке</div></label>
        <div class="col-sm-8">
            <textarea id="autoResizeTA"  name = "description" class="form-control" rows="5"></textarea>
        </div>
    </div><!-- form-group -->

    <div class="form-group">
        <label class="col-sm-4 control-label"></label>
        <div class="col-sm-8">
            <button type="submit" id="sendButton">Отправить</button> <span id="spinner" style="display: none" ><img src="<?=Yii::app()->request->baseUrl;?>/img/loading.gif"></span>
        </div>
    </div>



</form>

</div>
        </div>
        </div>
</div>

<script>


    jQuery(document).ready(function() {

        $("#sendButton").click(function(){
          locked();
        });

        jQuery("#regions").removeClass("form-control");
        jQuery('#regions').select2();
        jQuery('select.select2').select2();


        jQuery('.toggle').toggles({off: true,text:{on:"ДА",off:"НЕТ"}});
        jQuery('#regions').on("select2-selecting",function(data){
            jQuery("#locality").removeClass("form-control");
            $("#locality").attr("disabled",false);
            $("#locality").select2({
                placeholder : "Введите название населенного пункта",
                minimumInputLength: 3,
                ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                    url: "<?=$this->createUrl("/ajax/locality")?>?code="+data.val,
                    dataType: 'json',
                    data: function (term, page) {
                        return {
                            name: term // search term

                        };
                    },
                    results: function (data, page) { // parse the results into the format expected by Select2.
                        // since we are using custom formatting functions we do not need to alter remote JSON data

                        return {results: data};
                    }
                }
            });

        });

        $("#regionUnload option[value='0']").attr("selected","selected");
        $("#stevedore").attr("disabled",true);
        $("#regionUnload").change(function(){
            id = $(this).val();
            if (id == 0) {$("#stevedore option[value!=0]").remove(); return false;}
            $.post("<?=$this->createUrl("/ajax/stevedore")?>",{"id":id},function(data){
                $("#stevedore").attr("disabled",false);



                $("#stevedore option[value!=0]").remove();
                for(i = 0; i < data.length; i++){
                    $("#stevedore").append( $('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
                }
            }, "json");

        });

        $("#uncash").click(function(){
           //$("#where_calculation").attr("readonly",true);
            $("#where_calculation").val("перечислением");
            return false;

        });
    });

</script>