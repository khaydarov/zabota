<?
   $user = getUserInfo($_SESSION['uid']);
   if (isset($_POST['submit'])) {
        $lastname = $_POST['lastname'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $npass = $_POST['npass'];
        $id_user = $_SESSION['uid'];
            if ($npass != '')
            	$sql = "UPDATE users SET lastname='$lastname', name='$name', email='$email', login='$login', password='$npass' WHERE id='$id_user'";
            else 
              	$sql ="UPDATE users SET lastname='$lastname', name='$name', email='$email', login='$login' WHERE id='$id_user'";
            $res = query($sql);
            if ($res)
                header('location: index.php?option=allclaims');
      }
?>
<script>
	$(document).ready( function() {
	})
</script>
	<div class="col-lg-12">
		<h4>Редактировать свой профиль:</h4>
	</div>
	<br>
	<form action="" method="post" role="form" class="form-horizontal">
	<div class="bs-callout bs-callout-info"><b>Личная информация </b></div>
		<div class="form-group">
			<div class="col-sm-12">
				<input type="text" class="form-control" placeholder="Фамилия" value="<?=$user->lastname; ?>" name="lastname">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input type="text" class="form-control" placeholder="Имя" value="<?=$user->name; ?>" name="name">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input type="text" class="form-control" placeholder="e-mail" value="<?=$user->email; ?>" name="email">
			</div>
		</div>
		<hr>
		<div class="bs-callout bs-callout-info"><b>Информация для программы </b></div>
		<div class="form-group">
			<div class="col-sm-12">
				<input type="text" class="form-control" placeholder="Введите логин" value="<?=$user->login; ?>" name="login">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input type="password" class="form-control" placeholder="Введите старый пароль" value="" name="pass">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input type="password" class="form-control" placeholder="Введите новый" value="" name="npass">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input type="password" class="form-control" placeholder="Подтвердите новый пароль" value="" name="npass">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<button type="submit" name="submit" class="btn btn-primary">Изменить</button>
			</div>
		</div>
	</form>
</div>