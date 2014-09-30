
<?$i=1;?>
<?foreach($data as $item):?>

    <tr class="gradeC">
        <?foreach($columns as $val):?>
            <?if($val['field']=='id' AND $excel){?>
            <td></td>
            <?}else{
                ?>

            <td><?=($val['action'])?MYChtml::$val['action']($item->$val['field']):$item->$val['field'];?></td>
            <?}?>
        <?endforeach;?>
    </tr>

    <?$i++;?>
<?endforeach;?>