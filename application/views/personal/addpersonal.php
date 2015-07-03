<script>
	$(document).ready( function() {

		$('#add').click( function() {
			var username = $('#username').val();
			var education = $('#education').val();
			var position = $('#position').val();
			var phone = $('#phone').val();
			var access = $('#access').val();
			var end_access = $('#end_access').val();
			var end_certificate = $('#end_certificate').val();
			var contract = $('#contract').val();
			var inn = $('#inn').val();
			var snils = $('#snils').val();
			var role = $('#role').val();

			
			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/addpersonal.php",
				data: 'username='+username+'&education='+education+'&position='+position+'&phone='+phone+'&access='+access+'&end_access='+end_access+'&end_certificate='+end_certificate+'&contract='+contract+'&inn='+inn+'&snils='+snils+'&role='+role,
				success: function(result) {
	               		if (result) {
	               			$('#add').button('toggle').html('Подождите, добавляем пользователя!');
	               			window.location.reload();
	               		}
	               	}
			});
			return false;
		});

		$('#end_access').datepicker({
			altFormat: "dd.mm.yy",
	    	altField: "#end_access"
		});

		$('#end_certificate').datepicker({
			altFormat: "dd.mm.yy",
	    	altField: "#end_certificate"
		});
	});
</script>
<div class="row">
		<div class="alert alert-info"><b>Добавить персонал:</b></div>
</div>
<div class="col-lg-12">
	<div class="row">
		<form action="">
			<div class="form-group">
				<label for="">Введите ФИО персонала:</label>
				<input id="username" type="text" class="form-control input-sm" placeholder="Поле для ввода" required>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-6">
						<label for="">Образование:</label>
						<select name="" id="education" class="form-control input-sm">
							<option value="Высшее медицинское образование">Высшее медицинское</option>
							<option value="Высшее образование">Высшее</option>
							<option value="Среднее медицинское образование">Среднее медицинское</option>
							<option value="Среднее специальное образование">Среднее специальное</option>
							<option value="Среднее образование">Среднее</option>
							<option value="Неполное среднее образование">Неполное среднее</option>
						</select>
					</div>
					<div class="col-lg-6">
						<label for="">Должность:</label>
						<input id="position" type="text" class="form-control input-sm" placeholder="Поле для ввода" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="">Номер телефона:</label>
				<input id="phone" type="text" class="form-control input-sm" placeholder="Поле для ввода" required>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-8">
						<label for="">Доступ к работе</label>
						<select name="" id="access" class="form-control input-sm">
							<option value="Лицензия">Лицензия</option>
							<option value="Удостоверение">Удостоверение</option>
							<option value="Сертификат">Сертификат</option>
							<option value="Сан книжка">Сан книжка</option>
							<option value="Другое">Другое</option>
						</select>
					</div>
					<div class="col-lg-4">
						<label for="">Конец доступа к системе:</label>
						<input id="end_access" type="input" class="form-control input-sm">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-12">
						<label for="">Срок истечения сертификата:</label>
						<input id="end_certificate" type="text" class="form-control input-sm" placeholder="Поле для ввода">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-4">
						<label for="">Номер договора:</label>
						<input id="contract" type="text" class="form-control input-sm" placeholder="Поле для ввода">
					</div>
					<div class="col-lg-4">
						<label for="">ИНН:</label>
						<input id="inn" type="text" class="form-control input-sm" placeholder="Поле для ввода">
					</div>
					<div class="col-lg-4">
						<label for="">СНИЛС:</label>
						<input id="snils" type="text" class="form-control input-sm" placeholder="Поле для ввода">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-4">
						<label for="">Роль в системе:</label>
						<select name="" id="role" class="form-control input-sm">
							<option value="1">Администратор</option>
							<option value="0">Персонал</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<button id="add" class="btn btn-success btn-sm">Добавить</button>
			</div>
		</form>
	</div>
</div>