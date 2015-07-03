<script>
	$(document).ready( function() {

		$('#add').click( function() {
			var patientname = $('#patientname').val();
			var category = $('#category').val();
			var birthdate = $('#birthdate').val();
			var angel_date = $('#angel_date').val();
			var passport = $('#passport').val();
			var phone = $('#phone').val();
			var date_in = $('#date_in').val();
			var palata = $('#palata').val();
			var habits = $('#habits').val();
			var circs = $('#circs').val();
			var dp = $('#dp').val();
						
			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/addpatient.php",
				data: 'patientname='+patientname+'&category='+category+'&birthdate='+birthdate+'&angeldate='+angel_date+'&passport='+passport+'&phone='+phone+'&indate='+date_in+'&palata='+palata+'&habits='+habits+'&circs='+circs+'&dp='+dp,
				success: function(result) {
	               		if (result) {
	               			$('#add').button('toggle').html('Подождите, добавляем пациента!');
	               			window.location.href = "index.php?option=allpatients";
	               		}
	               	}
			});
			return false;
		});

		$('#date_in').datepicker({
			altFormat: "dd.mm.yy",
	    	altField: "#birthdate"
		});
	});
</script>
<div class="row">
		<div class="alert alert-info"><b>Добавить пациента:</b></div>
</div>
<div class="col-lg-12">
	<div class="row">
		<form action="">
			<div class="form-group">
				<label for="">Введите ФИО пациента:</label>
				<input id="patientname" type="text" class="form-control input-sm" placeholder="Поле для ввода">
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-6">
						<label for="">Категория обслуживания:</label>
						<select name="" id="category" class="form-control input-sm">
							<option value="Первая">Первая</option>
							<option value="Вторая">Вторая</option>
							<option value="Третья">Третья</option>
						</select>
					</div>
					<div class="col-lg-6">
						<label for="">Дата рождения:</label>
						<input id="birthdate" type="text" class="form-control input-sm" placeholder="Поле для ввода">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="">День ангела:</label>
				<input id="angel_date" type="text" class="form-control input-sm" placeholder="Поле для ввода">
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-8">
						<label for="">Паспортные данные</label>
						<input id="passport" type="text" class="form-control input-sm" placeholder="Поле для ввода">
					</div>
					<div class="col-lg-4">
						<label for="">Номер телефона:</label>
						<input id="phone" type="text" class="form-control input-sm">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-4">
						<label for="">Дата поступления:</label>
						<input id="date_in" type="text" class="form-control input-sm" placeholder="Поле для ввода">
					</div>
					<div class="col-lg-4">
						<label for="">Номер палаты:</label>
						<input id="palata" type="text" class="form-control input-sm" placeholder="Поле для ввода">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-12">
						<label for="">Привычки:</label>
						<textarea class="form-control" name="" id="habits" cols="30" rows="3"></textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-12">
						<label for="">Условия проживания до:</label>
						<textarea class="form-control" name="" id="circs" cols="30" rows="3"></textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-12">
						<label for="">Дополнительные пометки:</label>
						<textarea class="form-control" name="" id="dp" cols="30" rows="3"></textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<button id="add" class="btn btn-success btn-sm">Добавить</button>
			</div>
		</form>
	</div>
</div>