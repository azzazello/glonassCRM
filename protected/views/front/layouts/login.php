<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$this->title;?></title>

    <link href="<?=Yii::app()->request->baseUrl;?>/css/style.default.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/css/select2.css" rel="stylesheet" />
    <link href="<?=Yii::app()->request->baseUrl;?>/css/login.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=Yii::app()->request->baseUrl;?>/js/html5shiv.js"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/js/respond.min.js"></script>
    <![endif]-->

</head>

<body class="signin">

<script>
    var url = "<?=Yii::app()->request->baseUrl;?>";
</script>

<?php echo $content; ?>

<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-1.11.1.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/bootbox.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap.min.js"></script>

<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-migrate-1.2.1.min.js"></script>

<script src="<?=Yii::app()->request->baseUrl;?>/js/modernizr.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/pace.min.js"></script>

<script src="<?=Yii::app()->request->baseUrl;?>/js/retina.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.cookies.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/select2.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/select2_locale_ru.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.maskedinput.min.js"></script>
<script src="<?=Yii::app()->request->baseUrl;?>/js/login.js"></script>
<?=MYChtml::showMessage($_GET);?>
</body>
</html>
