<script>
	$(document).ready (function() {
		$('#login').focus();
	})
</script>
<div class="row">
	<div class="main_enter_form">
		<div class="h200" align="center">
		<img style="position: absolute; top: 10%; left: 30%;"src="/social/application/views/styles/img/photo.png" width="120px" class="round" alt="">
	</div>
	<div class="col-lg-12">
		<div class="row">
			<h4 align="center">Авторизуйтесь пожалуйста:</h4>
		</div>
	</div>
	<div class="row">
		<form action="application/auth/logIn.php" method="post" role="form" class="col-lg-11 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
			<div class="form-group">
				<input type="text" class="form-control input-lg" placeholder="Введите Логин" name="login" id="login">
			</div>
			<div class="form-group">
				<input type="password" class="form-control input-lg" placeholder="Введите Пароль" name="password">
			</div>
			<div class="form-group">
				<button type="submit" class="col-lg-12 col-md-12 col-xs-12 btn btn-lg btn-success">Войти</button>
			</div>
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="row" style="height: 20px;"></div>
			</div>
		</form>
	</div>
</div>
</div>