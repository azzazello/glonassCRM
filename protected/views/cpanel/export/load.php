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
            <br><?

$f = fopen($_FILES['userfile']['tmp_name'], 'r');
            $i = 0;
while(!feof($f)) {
    $i++;

$data = fgetcsv($f, 1000, ";");
    if ((int)$data[4] > 0 and strlen($data[8])>3){
if (Trucks::checkPlate($data[8])) {

} else {

$truck = new Trucks();
$truck->plate = MYChtml::check_num($data[8]);
if (strlen($data[1]) > 4) {$truck->is_conctract = 1; $truck->contract_number = $data[1];} else {$truck->is_conctract = 0; $truck->contract_number = "";}
if (strlen($data[7]) > 4) {$truck->is_act = 1; $truck->act_number = $data[7];} else {$truck->is_act = 0; $truck->act_number = "";}
$truck->balance_license_fee = 0;
$truck->daily_license_fee = 10;
$truck->comment = $data[0]." ";
$truck->fio = $data[3];
if (!$truck->save()) {print_r($truck->getErrors()); echo "<hr>"; echo "Строка:".$i;die();};
}

$payment = new Payments();
$payment->amount_fee_license = 0;
$payment->amount_installation = (int)$data[4];
$payment->date = date("Y-m-d",strtotime($data[2]));
$payment->plate = MYChtml::check_num($data[8]);
    if (!$payment->save()) {print_r($payment->getErrors()); echo "Строка:".$i; die(); echo "<hr>";};

}
ob_start();
    echo "Строка ".$i."<br>";
    ob_end_flush();
}
?>

        </div><!-- panel -->

        <br />



    </div><!-- contentpanel -->

</div>