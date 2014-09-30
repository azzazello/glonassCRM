<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251">
	<meta charset="utf-8">
	<title>ОАО НМТП</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?=Yii::app()->request->baseUrl;?>/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?=Yii::app()->request->baseUrl;?>/css/responsive.css" >
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/chosen.css">



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

    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/datepicker/themes/default.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/datepicker/themes/default.date.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/datepicker/themes/default.time.min.css" />
    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery/jquery-2.0.3.min.js"></script>
    <!-- JQUERY UI-->
    <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>

    <script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap-wizard/form-wizard.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />

    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/bootbox/bootbox.min.js"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/js/chosen.jquery.min.js"></script>


</head>
<body>

<script>
    function proverka(input) {
        input.value = input.value.replace(/[^\d,]/g, '');
    };
</script>

		<header class="navbar clearfix" id="header">
		<div class="container">
                    <div class="navbar-brand">
                        <!-- COMPANY LOGO -->
                        <a href="<?=$this->createUrl("//cabinet");?>">
                            <img src="<?=Yii::app()->request->baseUrl;?>/img/logo11.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
                            </a>
                            <!-- /COMPANY LOGO -->
                            <!-- TEAM STATUS FOR MOBILE -->
                            <div class="visible-xs">
                            <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
                                <i class="fa fa-users"></i>
                            </a>
                        </div>
                        <!-- /TEAM STATUS FOR MOBILE -->
                        <!-- SIDEBAR COLLAPSE -->
                        <div id="sidebar-collapse" class="sidebar-collapse btn">
                            <i class="fa fa-bars"
                               data-icon1="fa fa-bars"
                               data-icon2="fa fa-bars" ></i>
                        </div>
                        <!-- /SIDEBAR COLLAPSE -->
                    </div>
                    <!-- NAVBAR LEFT -->
                    <ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                                <span class="name">Оформление</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu skins">
                                <li class="dropdown-title">
                                    <span><i class="fa fa-leaf"></i> Оформление</span>
                                </li>
                                <li><a href="#" data-skin="default">Тонкий (по умолчанию)</a></li>
                                <li><a href="#" data-skin="night">Ночь</a></li>
                                <li><a href="#" data-skin="earth">Земля</a></li>
                                <li><a href="#" data-skin="utopia">Утопия</a></li>
                                <li><a href="#" data-skin="nature">Природа</a></li>
                                <li><a href="#" data-skin="graphite">Графит</a></li>
                            </ul>
                        </li>
                    </ul>
				<!-- NAVBAR LEFT -->
			
				<ul class="nav navbar-nav pull-right">  <!--  style=" min-width: 100px; !important;" -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->

                <li class="dropdown" id="header-notification">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="badge">7</span>
                    </a>
                    <ul class="dropdown-menu notification">
                        <li class="dropdown-title">
                            <span><i class="fa fa-bell"></i> 7 Новых заявок</span>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message">ООО Артис-Н </span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>сейчас</span>
										</span>
									</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message">"ООО Экспорт-Нат"</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>19 минут</span>
										</span>
									</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message">ООО "НЛЕ"</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>32 минут</span>
										</span>
									</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message">ООО "НМТП".</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>55 минут</span>
										</span>
									</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message">ОАО "НУТЭП". </span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>2 часа</span>
										</span>
									</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message">ООО "Сигма"</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>6 часов</span>
										</span>
									</span>
                            </a>
                        </li>
                        <li class="footer">
                            <a href="#">Показать все новые заявки <i class="fa fa-arrow-circle-right"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <li class="dropdown" id="header-message">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                        <span class="badge"><?=(count($this->userNotification)>0)?count($this->userNotification):'';?></span>
                    </a>
                    <ul class="dropdown-menu inbox">
                        <li class="dropdown-title">
                            <span><i class="fa fa-envelope-o"></i> <?=count($this->userNotification);?> уведомлений</span>
                            <span class="compose pull-right tip-right" title="Compose message"><i class="fa fa-pencil-square-o"></i></span>
                        </li>

                        <?foreach($this->userNotification as $item):?>
                        <li>
                            <a href="#" class="openNotification" id="<?=$item->id;?>">
									<span class="body">
										<span class="from"><?=$item->Users->name;?></span>
										<span class="message">
										<?=AccessoryFunctions::trimStr($item->text);?>
										</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span><?=MYChtml::view_date($item->dateCreate);?></span>
										</span>
									</span>
                            </a>
                        </li>
                        <?endforeach;?>
                        <li class="footer">
                            <a href="#" id="allView">Просмотреть все сообщения <i class="fa fa-arrow-circle-right"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                        <li class="dropdown" id="header-tasks">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>

                            </a>
                            <ul class="dropdown-menu tasks">
                                <li class="dropdown-title">
                                    <span><i class="fa fa-check"></i> Статистика по тайм-слотам</span>
                                </li>
                                <li>
                                    <a href="#">
                                            <span class="header clearfix">
                                                <span class="pull-left">С 8-00 до 20-00</span>
                                                <span class="pull-right">60%</span>
                                            </span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                <span class="sr-only">60% от максимума</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                            <span class="header clearfix">
                                                <span class="pull-left">За текущие сутки</span>
                                                <span class="pull-right">25%</span>
                                            </span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                <span class="sr-only">25% от максимума</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                            <span class="header clearfix">
                                                <span class="pull-left">Следующие сутки</span>
                                                <span class="pull-right">40%</span>
                                            </span>
                                        <div class="progress progress-striped">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                <span class="sr-only">40% от максимума</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="footer">
                                    <a href="#">Полная статистика <i class="fa fa-arrow-circle-right"></i></a>
                                </li>
                            </ul>
                        </li>

					<li class="dropdown user" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="" src="<?=Yii::app()->request->baseUrl;?>/img/avatar1.jpg" />
							<span class="username"><?=$this->name;?></span>
							<i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Мой профиль</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Настройки аккаунта</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i> Приватные настройки</a></li>
							<li><a href="<?=$this->createUrl('/cpanel/login/exit');?>"><i class="fa fa-power-off"></i> Выход</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- TEAM STATUS -->

        <div class="container team-status" id="team-status">
        <div id="scrollbar">
            <div class="handle">
            </div>
        </div>
        <div id="teamslider">
        <ul class="team-list">
        <li class="current">
            <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?=Yii::app()->request->baseUrl;?>/img/avatars/avatar3.jpg" alt="" />
				  </span>
				  <span class="title">
					You
				  </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 35%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 20%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 10%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
					<span class="status">
						<div class="field">
                            <span class="badge badge-green">6</span> completed
                            <span class="pull-right fa fa-check"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-orange">3</span> in-progress
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-red">1</span> pending
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
				    </span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?=Yii::app()->request->baseUrl;?>/img/avatars/avatar1.jpg" alt="" />
				  </span>
				  <span class="title">
					Max Doe
				  </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 15%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 40%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 20%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
					<span class="status">
						<div class="field">
                            <span class="badge badge-green">2</span> completed
                            <span class="pull-right fa fa-check"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-orange">8</span> in-progress
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-red">4</span> pending
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
				    </span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?=Yii::app()->request->baseUrl;?>/img/avatars/avatar2.jpg" alt="" />
				  </span>
				  <span class="title">
					Jane Doe
				  </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 65%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 10%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 15%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
					<span class="status">
						<div class="field">
                            <span class="badge badge-green">10</span> completed
                            <span class="pull-right fa fa-check"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-orange">3</span> in-progress
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-red">4</span> pending
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
				    </span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?=Yii::app()->request->baseUrl;?>/img/avatars/avatar4.jpg" alt="" />
				  </span>
				  <span class="title">
					Ellie Doe
				  </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 5%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 48%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 27%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
					<span class="status">
						<div class="field">
                            <span class="badge badge-green">1</span> completed
                            <span class="pull-right fa fa-check"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-orange">6</span> in-progress
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-red">2</span> pending
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
				    </span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?=Yii::app()->request->baseUrl;?>/img/avatars/avatar5.jpg" alt="" />
				  </span>
				  <span class="title">
					Lisa Doe
				  </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 21%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 20%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 40%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
					<span class="status">
						<div class="field">
                            <span class="badge badge-green">4</span> completed
                            <span class="pull-right fa fa-check"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-orange">5</span> in-progress
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-red">9</span> pending
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
				    </span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?=Yii::app()->request->baseUrl;?>/img/avatars/avatar6.jpg" alt="" />
				  </span>
				  <span class="title">
					Kelly Doe
				  </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 45%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 21%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 10%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
					<span class="status">
						<div class="field">
                            <span class="badge badge-green">6</span> completed
                            <span class="pull-right fa fa-check"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-orange">3</span> in-progress
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-red">1</span> pending
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
				    </span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?=Yii::app()->request->baseUrl;?>/img/avatars/avatar7.jpg" alt="" />
				  </span>
				  <span class="title">
					Jessy Doe
				  </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 7%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 30%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 10%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
					<span class="status">
						<div class="field">
                            <span class="badge badge-green">1</span> completed
                            <span class="pull-right fa fa-check"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-orange">6</span> in-progress
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-red">2</span> pending
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
				    </span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?=Yii::app()->request->baseUrl;?>/img/avatars/avatar8.jpg" alt="" />
				  </span>
				  <span class="title">
					Debby Doe
				  </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 70%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 20%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 5%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
					<span class="status">
						<div class="field">
                            <span class="badge badge-green">13</span> completed
                            <span class="pull-right fa fa-check"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-orange">7</span> in-progress
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
						<div class="field">
                            <span class="badge badge-red">1</span> pending
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
				    </span>
            </a>
        </li>
        </ul>
        </div>
        </div>



		<!-- /TEAM STATUS -->
	</header>
	<!--/HEADER -->
	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				   <?
                   $this->widget('application.widgets.Menu',array("active"=>$this->activeMenu));
                   ?>

				<!-- /SIDEBAR -->
		<div id="main-content">
            <?php echo $content; ?>
		</div>
	</section>
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


        <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
        <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/gmaps/gmaps.min.js"></script>


        <script src="<?=Yii::app()->request->baseUrl;?>/js/script.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/googlemaps.js"></script>


        <script src="<?=Yii::app()->request->baseUrl;?>/js/cabinet.js"></script>

        <script src="<?=Yii::app()->request->baseUrl;?>/js/script.js"></script>


        <?=MYChtml::showMessage($this->message);?>

        <script src="<?=Yii::app()->request->baseUrl;?>/js/mask.js"></script>

	<script>



        var handleThemeSkins = function () {
            // Handle theme colors

            var setSkin = function (color) {
                $('#skin-switcher').attr("href", "<?=Yii::app()->request->baseUrl;?>/css/themes/" + color + ".css");
               // $.removeCookie("skin_color");
                $.cookie('skin_color', color);
            }

            $('ul.skins > li a').click(function () {
                var color = $(this).data("skin");
                setSkin(color);
            });

            if ($.cookie('skin_color')) {
                setSkin($.cookie('skin_color'));

            }
            //Check which theme skin is set
        }




		jQuery(document).ready(function() {
            App.setPage("wizards_validations");  //Set current page
            App.init(); //Initialise plugins and elements
            FormWizard.init();
        });

		    $(document).ready(function() {

                $(".openNotification").click(function(){
                    $.post("<?=$this->createUrl('AjaxGetNotification');?>", {id:this.id} , function(data){
                            bootbox.alert(data);
                    });
                });

                $("#allView").click(function(){
                    $.post("<?=$this->createUrl('AjaxGetAllNotiification');?>", {} , function(data){
                        bootbox.alert(data);
                    });
                });

                BaseUrl("<?=Yii::app()->request->baseUrl;?>");
				$("#tel").mask("+7 (999) 999-9999");
			});
	</script>

</body>
</html>