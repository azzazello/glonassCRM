<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Cloud Admin | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/css/cloud-admin.css" >
	
	<link href="<?=Yii::app()->request->baseUrl;?>/js/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/uniform/css/uniform.default.min.css" />
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/css/animatecss/animate.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body class="login">	
	<!-- PAGE -->
		<?php echo $content; ?>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?=Yii::app()->request->baseUrl;?>/bootstrap-dist/js/bootstrap.min.js"></script>
	
	
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/uniform/jquery.uniform.min.js"></script>
	
	<script src="<?=Yii::app()->request->baseUrl;?>/js/mask.js"></script>
	
	<!-- CUSTOM SCRIPT -->
	<script src="<?=Yii::app()->request->baseUrl;?>/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {
			App.setPage("login");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
		$("#tel").mask("+7 (999) 999-99-99");
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>