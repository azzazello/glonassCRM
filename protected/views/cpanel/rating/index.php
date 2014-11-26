<script src="<?=Yii::app()->request->baseUrl;?>/js/cabinet.js"></script>

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
                <h4 class="panel-title">Мои отзывы</h4>
                <p>На данной странице вы можете просмотреть и отредактировать отзывы</p>
            </div><!-- panel-heading -->
            <br>

            <?if(!count($this->ratings)){?>
            <h3>История ваших отзывов пуста</h3>
            <?}else{?>

            <table id="basicTable" class="table table-striped table-bordered responsive">
                <thead class="">
                <tr>
                    <th style="width: 10px;"><input type="checkbox" value="0" name="total" class="all_rating_checkbox"></th>
                    <th style="width: 200px;">Дата создания</th>
                    <th>Текст</th>
                    <th style="width: 300px;">На кого написан отзыв</th>
                    <th style="width: 100px;">Тип отзыва</th>
                    <th style="width: 50px;">Действие</th>
                </tr>
                </thead>

                <tbody>
                <?foreach($this->ratings as $item):?>
                    <tr class="rows" id="idr" data-rel="">
                        <th><input type="checkbox" value="<?=$item->id;?>" class="rating_checkbox"></th>
                        <td><?=MYChtml::view_date($item->date_create);?></td>
                        <td><?=$item->description;?></td>
                        <td><?=$item->Users->name;?></td>
                        <td><?=$item->rating==1?'Положительный':'Отрицательный';?></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;<a href="#" class="editRow" data-rel="<?=$item->id;?>"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/edit.png" width="16"></a>
                            <a href="#" class="removeRow" data-rel="<?=$item->id;?>"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png"  width="16"></a>
                        </td>
                    </tr>
                <?endforeach;?>
                </tbody>

            </table>

            <hr style="margin: 0px !important;">
                <?php $this->widget('CLinkPager', array('pages' => $this->pagination,'header'=>'','htmlOptions'=>array('class'=>'pagination','style'=>'float:right'))); ?>
            </div>

        <button class="btn btn-danger" id="delete_all_record">Удалить</button>
        <br />
            <?}?>
    </div>

</div>