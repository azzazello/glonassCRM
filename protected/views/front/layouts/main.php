<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Зерновозам.ru</title>

    <link href="<?=Yii::app()->request->baseUrl;?>/css/style.default.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/css/front.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/css/footer.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/css/select2.css" rel="stylesheet" />
    <link href="<?=Yii::app()->request->baseUrl;?>/css/blockquote.css" rel="stylesheet" />


    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-ui-1.10.3.min.js"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/js/bootbox.min.js"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap.min.js"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.maskedinput.min.js"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/js/front.js"></script>
    <!--[if !IE 7]>
    <style type="text/css">
        #wrap {display:table;height:100%}
    </style>
    <![endif]-->
</head>
<body>

<script>
    var url = "<?=Yii::app()->request->baseUrl;?>";
</script>

<div id="wrap">
<style>

</style>
       <div id="mainContainer">
    <div class="header">
    <div class="logo"><img src="<?=Yii::app()->request->baseUrl;?>/images/front/logofront.png"></div>
    <div class="signinForm">

        <?$this->renderPartial("application.views.front.extend.login")?>


    </div>

    <div class="contactOnMain">
        <ul>
            <li class="telOnMain">+7 (903) 451-40-26</li>
            <li class="emailOnMain">info@port-tranzit.ru</li>
        </ul>
    </div>

    <div class="menu">
        <ul>
            <li class="fe-main"><a href="<?=$this->createUrl("/index.php");?>">Главная</a></li>
            <li class="fe-plan"><a href="<?=$this->createUrl("/main/plans");?>">Планы</a></li>
            <li class="fe-info"><a href="<?=$this->createUrl("/main/plans");?>">Информация</a></li>
            <li class="fe-actual"><a href="<?=$this->createUrl("/main/orders");?>">Актуальные заявки</a></li>
            <li class="fe-contact"><a href="<?=$this->createUrl("/main/contacts");?>">Контакты</a></li>
        </ul>
    </div>
    </div>
    <div class="centralContainer">

<?php echo $content; ?>
    </div>
</div>



</div>

<div class="footer" id="footer">
    <div class="footerContainer">
        Контактные данные: <a mailto="info@port-tranzit.ru" class="">email для связи</a>
    </div>
    <?=MYChtml::showMessage($_GET);?>
</div>
</body>
</html>