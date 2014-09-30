<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Cloud Admin | Error 404</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="<?=Yii::app()->request->baseUrl;?>/js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries
	.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/css/cloud-admin.css" >
	

	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body id="not-found-bg">
	<div class="overlay"></div>
	<!-- PAGE -->
	<section id="page">
			<div class="row">
				<div class="col-md-12">
					<div class="divide-100"></div>
				</div>
			</div>
			<div class="row">
				<div class="container">
				<div class="col-md-12 not-found">
				   <div class="error">
					  404
				   </div>
				</div>
				<div class="col-md-5 not-found">
				   <div class="content">
					  <h3>СТАРНИЦА НЕДОСТУПНА</h3>
					  <p>

                          Извините, но страница, которую вы ищете не была найдена
                          Попробуйте проверки URL на наличие ошибок.
					  </p>
                       <div class="btn-group">
                           <a href="#" class="btn btn-danger" onClick="goBack()"><i class="fa fa-chevron-left"></i> Назад</a>
                           <a href="<?=Yii::app()->request->baseUrl;?>" class="btn btn-default">На главную</a>
                       </div>
				   </div>
				</div>
				</div>
			</div>
	</section>
    <script>
        function goBack()
        {
            window.history.go(-1)
        }
        </script>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->

	<!-- /JAVASCRIPTS -->
</body>
</html>