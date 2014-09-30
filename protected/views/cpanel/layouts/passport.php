<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251">
	<meta charset="utf-8">
	<title>Cloud Admin | Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?=Yii::app()->request->baseUrl;?>/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?=Yii::app()->request->baseUrl;?>/css/responsive.css" >
	
	<link href="<?=Yii::app()->request->baseUrl;?>/js/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->

    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/css/animatecss/animate.min.css" />

	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/select2/select2.min.css" />

    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/validationEngine.jquery.css" type="text/css"/>
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/uniform/css/uniform.default.min.css" />
	<!-- WIZARD -->
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-wizard/wizard.css" />
	<!-- FONTS -->

    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/validationEngine.jquery.css" type="text/css"/>


    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery/jquery-2.0.3.min.js"></script>
    <!-- JQUERY UI-->
    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>

</head>
<body>

	<!-- PAGE -->
		<div style="width: 80%; margin-top: 20px !important; margin: auto; max-height: 600px;">
            <?php echo $content; ?>
		</div>


        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/jquery.validationEngine-ru.js"></script>

        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/jquery.validationEngine.js"></script>
        <!-- BOOTSTRAP -->
        <script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-dist/js/bootstrap.min.js"></script>

        <script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-daterangepicker/moment.min.js"></script>

        <script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
        <!-- SLIMSCROLL -->
        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>

        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
        <!-- BLOCK UI -->
        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
        <!-- SELECT2 -->
        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/select2/select2.min.js"></script>
        <!-- UNIFORM -->
        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/uniform/jquery.uniform.min.js"></script>
        <!-- WIZARD -->
        <script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!-- WIZARD -->
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-validate/jquery.validate.min.js"></script>

        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-validate/additional-methods.min.js"></script>
        <!-- BOOTBOX -->
        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/bootbox/bootbox.min.js"></script>
        <!-- COOKIE -->
        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/jQuery-Cookie/jquery.cookie.min.js"></script>

        <!-- CUSTOM SCRIPT -->


        <script src="<?=Yii::app()->request->baseUrl;?>/js/cabinet.js"></script>

        <script src="<?=Yii::app()->request->baseUrl;?>/js/script.js"></script>

        <script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-wizard/form-wizard.min.js"></script>

        <?=MYChtml::showMessage($this->message);?>

        <script src="<?=Yii::app()->request->baseUrl;?>/js/mask.js"></script>

	<script>

        var handleThemeSkins = function () {
            // Handle theme colors

            var setSkin = function (color) {
                $('#skin-switcher').attr("href", "<?=Yii::app()->request->baseUrl;?>/css/themes/" + color + ".css");
                $.cookie('skin_color', color);
            }
            $('ul.skins > li a').click(function () {
                var color = $(this).data("skin");
                setSkin(color);
            });

            //Check which theme skin is set
            if ($.cookie('skin_color')) {
                setSkin($.cookie('skin_color'));
            }
        }

		jQuery(document).ready(function() {
            App.setPage("wizards_validations");  //Set current page
            App.init(); //Initialise plugins and elements
            FormWizard.init();
        });

		    $(document).ready(function() {
                BaseUrl("<?=Yii::app()->request->baseUrl;?>");
				$(".tel").mask("+7 (999) 999-9999");
			});
	</script>
</body>
</html>