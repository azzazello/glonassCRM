<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chain Responsive Bootstrap3 Admin</title>

    <link href="<?=Yii::app()->request->baseUrl;?>/css/style.default.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/css/select2.css" rel="stylesheet" />


    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-1.11.1.min.js"></script>

</head>
<body>
<style>
    body{
        color:#000000;
    }
    .label{
        color:#000000 !important;
    }
    </style>
<script>
    var url = "<?=Yii::app()->request->baseUrl;?>";
</script>
<?php echo $content; ?>
</body>
</html>