	<!-- PAGE -->
		<section id="page">
			<!-- HEADER -->
			<header>
				<!-- NAV-BAR -->
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div id="logo">
								<a href="<?=$this->createUrl("../")?>"><img src="<?=Yii::app()->request->baseUrl;?>/img/logo/logo-alt.png" height="40" alt="logo name" /></a>
							</div>
						</div>
					</div>
				</div>
				<!--/NAV-BAR -->
			</header>
			<!--/HEADER -->
			<!-- LOGIN -->
			<section id="login" class="visible">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box-plain">
								<h2 class="bigintro">Вход</h2>
								<div class="divide-40" style="text-align:center;color:#F61111;">
									<?if ($_GET['tel'] == 1) {echo "Пользователя с данным логином не существует";}?>
									<?if ($_GET['badpass'] == 1) {echo "Неверный пароль";}?>
								</div>
								<form role="form" action="<?=$this->createUrl("get");?>" method="POST">
								  <div class="form-group">
									<label for="exampleInputEmail1">Номер телефона</label>
									<i class="fa fa-envelope"></i>
									<input type="text" class="form-control" name="tel" id="tel">
								  </div>
								  <div class="form-group"> 
									<label for="exampleInputPassword1">Пароль</label>
									<i class="fa fa-lock"></i>
									<input type="password" class="form-control" name="pass">
								  </div>
								  <div class="form-actions">
									<label class="checkbox">
                                        <input type="checkbox" class="uniform" value="1" name="rememberMe"> Запомнить меня</label>
									<button type="submit" class="btn btn-danger">Войти</button>
								  </div>
								</form>

								<div class="login-helpers">
									<!--<a href="#" onclick="swapScreen('forgot');return false;">Забыли пароль?</a> <br>
									<a href="#" onclick="swapScreen('register');return false;">Регистрация</a>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/LOGIN -->
			<!-- REGISTER -->
			<section id="register">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box-plain">
								<h2 class="bigintro">Register</h2>
								<div class="divide-40"></div>
								<form role="form">
								  <div class="form-group">
									<label for="exampleInputName">Full Name</label>
									<i class="fa fa-font"></i>
									<input type="text" class="form-control" id="exampleInputName" >
								  </div>
								  <div class="form-group">
									<label for="exampleInputUsername">Username</label>
									<i class="fa fa-user"></i>
									<input type="text" class="form-control" id="exampleInputUsername" >
								  </div>
								  <div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<i class="fa fa-envelope"></i>
									<input type="email" class="form-control" id="exampleInputEmail1" >
								  </div>
								  <div class="form-group"> 
									<label for="exampleInputPassword1">Password</label>
									<i class="fa fa-lock"></i>
									<input type="password" class="form-control" id="exampleInputPassword1" >
								  </div>
								  <div class="form-group"> 
									<label for="exampleInputPassword2">Repeat Password</label>
									<i class="fa fa-check-square-o"></i>
									<input type="password" class="form-control" id="exampleInputPassword2" >
								  </div>
								  <div class="form-actions">
									<label class="checkbox"> <input type="checkbox" class="uniform" value=""> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
									<button type="submit" class="btn btn-success">Sign Up</button>
								  </div>
								</form>
								<!-- SOCIAL REGISTER -->
								<div class="divide-20"></div>
								<div class="center">
									<strong>Or register using your social account</strong>
								</div>
								<div class="divide-20"></div>
								<div class="social-login center">
									<a class="btn btn-primary btn-lg">
										<i class="fa fa-facebook"></i>
									</a>
									<a class="btn btn-info btn-lg">
										<i class="fa fa-twitter"></i>
									</a>
									<a class="btn btn-danger btn-lg">
										<i class="fa fa-google-plus"></i>
									</a>
								</div>
								<!-- /SOCIAL REGISTER -->
								<div class="login-helpers">
									<a href="#" onclick="swapScreen('login');return false;"> К странице входа</a> <br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/REGISTER -->
			<!-- FORGOT PASSWORD -->
			<section id="forgot">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box-plain">
								<h2 class="bigintro">Восстановление пароля</h2>
								<div class="divide-40"></div>
								<form role="form" action="<?=$this->createUrl("restore");?>" method="POST">
								  <div class="form-group">
									<label for="exampleInputEmail1">Введите Email</label>
									<i class="fa fa-envelope"></i>
									<input type="email" class="form-control" id="exampleInputEmail1" name="email">
								  </div>
								  <div class="form-actions">
									<button type="submit" class="btn btn-info">Восстановить</button>
								  </div>
								</form>
								<div class="login-helpers">
									<a href="#" onclick="swapScreen('login');return false;">К странице входа</a> <br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- FORGOT PASSWORD -->
	</section>
