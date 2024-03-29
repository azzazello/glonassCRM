<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chain Responsive Bootstrap3 Admin</title>

    <link href="<?=Yii::app()->request->baseUrl;?>/theme/main/css/style.default.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/theme/main/css/morris.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/theme/main/css/style.datatables.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/theme/main/css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/theme/main/css/select2.css" rel="stylesheet" />
    <link href="<?=Yii::app()->request->baseUrl;?>/theme/main/css/toggles.css" rel="stylesheet" />
    <link href="<?=Yii::app()->request->baseUrl;?>/css/user.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/datepicker/themes/classic.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/datepicker/themes/classic.date.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/datepicker/themes/classic.time.css" />
    <script src="<?=Yii::app()->request->baseUrl;?>/theme/main/js/jquery-1.11.1.min.js"></script>
    <link href="<?=Yii::app()->request->baseUrl;?>/theme/main/css/jquery.gritter.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=Yii::app()->request->baseUrl;?>/theme/main/js/html5shiv.js"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/theme/main/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<script>
    var url = "<?=Yii::app()->request->baseUrl;?>";
</script>
<?php $this->renderPartial("application.views.cpanel.extend.header");?>
    <section>
        <div class="mainwrapper">



            <?php $this->renderPartial("application.views.cpanel.extend.leftpanel");?>
            <?php echo $content; ?>
            <?php $this->renderPartial("application.views.cpanel.extend.loadscreen");?>

        </div><!-- mainwrapper -->
    </section>

<script src="<?=Yii::app()->request->baseUrl;?>/theme/main/js/custom.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/theme/main/js/toggles.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/bootbox.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/modernizr.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/pace.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.cookies.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.sparkline.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/morris.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/raphael-2.1.0.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-wizard.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/select2.min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->BaseUrl?>/js/datepicker/picker.js"></script>
<script type="text/javascript" src="<?=Yii::app()->BaseUrl?>/js/datepicker/picker.date.js"></script>
<script type="text/javascript" src="<?=Yii::app()->BaseUrl?>/js/datepicker/picker.time.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/custom.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.maskedinput.min.js"></script>


<?=MYChtml::showMessage($_GET);?>

</body>
</html>