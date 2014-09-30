<style>
    th,td {
        text-align:center;
    }




</style>
<table id="huy">
<?foreach($this->columns as $item):?>

    <th style="display: table-cell; width: <?=$item['width'];?>;">
        <?=$item['name'];?>
    </th>

<?endforeach;?>

<?
    $this->render("data",array("data"=>$this->data, "columns"=>$this->columns,"excel"=>$excel));
    ?>

</table>