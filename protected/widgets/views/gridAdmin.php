<div class="box border primary">
    <div class="box-title">
        <h4><i class="fa fa-table"></i></h4>
        <div class="tools hidden-xs">

            <a href="javascript:;" class="collapse">
                <i class="fa fa-chevron-up"></i>
            </a>

        </div>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-sm-12">
                <div class="pull-right">
                    <div class="dataTables_filter" id="datatable1_filter" style="width: ">
                        <form method="post" action="<?=Yii::app()->controller->createUrl($this->action);?>" id="search_form">

                            <?if($this->excel):?>
                            <a id="excel" class="btn btn-primary" data-toggle="modal" href="<?=Yii::app()->controller->createUrl($this->action,array("mode"=>'excel'));?>">Excel</a>
                            <?endif;?>

                            <?if($this->search):?>
                            <a id="reset" class="btn btn-primary" data-toggle="modal" href="<?=Yii::app()->controller->createUrl($this->action,array("mode"=>'clear'));?>">Сброс</a>

                            <a id="search_form_submit" class="btn btn-primary" data-toggle="modal" href="#">Поиск</a>

                            <label>
                            <input type="text" name="search" value="<?=Yii::app()->session['search'];?>" style="margin-left: -3px;" aria-controls="datatable1" placeholder="Поиск" class="form-control input-sm">
                            </label>
                            <?endif;?>
                        </form>
                    </div>
                </div>
                <div class="pull-left" style="width: 270px;"><span style="float: left; margin-top: 5px;">Кол-во записей на странице &nbsp;&nbsp;</span>
                    <div id="datatable1_length" class="dataTables_length" style="padding-bottom: 10px">
                        <select name="datatable1_length" size="1" aria-controls="datatable1" class="form-control input-sm" style="width: 70px;" id="count">
                            <option value="10" selected="selected">10</option>
                            <option value="25">25</option><option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div></div>
                <div class="clearfix"></div>
            </div>
        </div>

        <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
            <thead>
            <tr>

                <?foreach($this->columns as $item):?>

                    <th style="width: <?=$item['width'];?>;">
                        <?=$item['name'];?>
                        <?if($item['name']=='' && $item['action']=='view_id'):?>
                            <input type="checkbox" id="allChecked">
                        <?endif;?>
                        <?if(isset( $sortField[$item['name']]) ):?>

                        <?$field = (isset(Yii::app()->session['field'][ $sortField[$item['name']] ]))? Yii::app()->session['field'][ $sortField[$item['name']] ]:'BOTH';?>

     <a href="<?=Yii::app()->controller->createUrl($this->action,array('mode'=>'sort','field'=>$sortField[$item['name']],"sort"=>$this->sortReverse[$field]));?>" class="ikon"><img src="<?=$this->base_route;?>/img/<?=$field;?>.png"></a>

                        <?endif;?>
                    </th>

                <?endforeach;?>

            </tr>
            </thead>
            <tbody>
                    <style>
                        .ikon {
                            float: right;
                        }
                    </style>
                <?=$this->render('data',array("data"=>$this->data,'columns'=>$this->columns,'excel'=>false));?>

            </tbody>
        </table>

                <?if(strlen($this->renderOptions)>0):?>
                <?=$this->render("renderOptions/".$this->renderOptions);?>
                <?endif;?>

        <div id="pagination">
            <?php $this->widget('CLinkPager', array('pages' => $this->pages)); ?>
        </div>

        <div style="clear: both;"></div>
    </div>
</div>
<script type="text/javascript" src="<?=$this->base_route;?>/js/printElement.js"></script>

    <script>

        function in_array(value, array)
        {
            for(var i = 0; i < array.length; i++)
            {
                if(array[i] == value) return true;
            }
            return false;
        }

        $(document).ready(function(){

            $("#allChecked").click(function(){

                $("input[type='checkbox']").each(function(){this.checked = !this.checked;});
                this.checked = !this.checked;
            });

            $("#count").change(function(){
                location.href = "<?=Yii::app()->controller->createUrl($this->action)?>?mode=count&c="+$(this).val();
            });

            $("#count option[value = '<?=Yii::app()->session['c']?>']").attr("selected","selected");

            var array_select = new Array();


            $(".gradeC").bind('click',function(){
                if($(this).find("input[type='checkbox']").length>0){

                    var obj = $(this).find("input[type='checkbox']");

                    if(!obj[0].checked)  array_select.splice(array_select.indexOf(obj.val()), 1);

                    else{
                        if(!in_array(obj.val(),array_select)) array_select.push(obj.val());
                    }
                }

            })

            $("#actionsButton").click(function(){
                if(array_select.length == 0)	bootbox.alert('Не выбрана ни 1 машина');
                else {
                    $("#array_autos").val(array_select);
                    $("#action_form").submit();
                }
            });

            $("#search_form_submit").click(function(){
                if($(".input-sm").val().length == 0) bootbox.alert("Введите текст");
                else $("#search_form").submit();
            });
        });
        </script>