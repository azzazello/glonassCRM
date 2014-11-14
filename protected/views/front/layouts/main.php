<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chain Responsive Bootstrap3 Admin</title>

    <link href="<?=Yii::app()->request->baseUrl;?>/css/style.default.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/css/front.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/css/footer.css" rel="stylesheet">
    <link href="<?=Yii::app()->request->baseUrl;?>/css/select2.css" rel="stylesheet" />
    <link href="<?=Yii::app()->request->baseUrl;?>/css/blockquote.css" rel="stylesheet" />


    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-1.11.1.min.js"></script>
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


       <div id="mainContainer">
    <div class="header">
    <div class="logo"><img src="<?=Yii::app()->request->baseUrl;?>/images/front/logofront.png"></div>
    <div class="signinForm">
        <label for="login">Логин: </label> <input type="text" id="login">
        <label for="password">Пароль: </label><input type="text" id="password">
        <button><img src="<?=Yii::app()->request->baseUrl;?>/images/front/go.png"></button>
        <div class="forgotContainer">
            <a href="" class="forgot">Забыли пароль?</a>
            <a href="" class="signin">Регистрация.</a>
        </div>
    </div>

    <div class="contactOnMain">
        <ul>
            <li class="telOnMain">+7 (903) 451-40-26</li>
            <li class="emailOnMain">info@port-tranzit.ru</li>
        </ul>
    </div>

    <div class="menu">
        <ul>
            <li class="fe-main"><a href="1">Главная</a></li>
            <li class="fe-plan"><a href="1">Планы</a></li>
            <li class="feinfo"><a href="1">Информация</a></li>
            <li class="fe-actual"><a href="1">Актуальные заявки</a></li>
            <li class="fe-contact"><a href="1">Контакты</a></li>
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
fsd asd fasdf asd
    </div>
</div>
</body>
</html>