

<a href="<?=$this->createUrl('/main');?>">�� �������</a>
<a href="<?=$this->createUrl('/cabinet');?>">�����</a><br>

<style>
    table{
        width: 700px;

        margin: auto;
    }
    table th,td{
        padding: 5px;
        line-height: 1em;
        border-bottom: 1px solid black;
    }
    .text {
        width: 70%;
    }
    #editDiv {
        width: 700px;
        margin: auto;
    }
</style>

<div id="editDiv">

</div>

<table>
    <tr>
        <th class="text">�����</th>
        <th>�����</th>
        <th class="action"></th>
    </tr>
    <?foreach($this->comments as $item):?>
    <tr>
        <td>
            <?=$item->description;?>
        </td>
        <td>
            <?=($item->rating==1)?'�������������':'�������������';?>
        </td>
        <td>
            <a href="#" class="deleteComment" id="dComment<?=$item->id;?> ">�������</a>
            <br>
            <a href="#" class="editComment" id="eComment<?=$item->id;?> ">�������������</a>
        </td>
    </tr>
    <?endforeach;?>
</table>



<script src="<?=Yii::app()->request->baseUrl;?>/js/cabinet.js"></script>

<?=MYChtml::showMessage($_GET);?>