<div class="row">
	<div class="alert alert-info">
		<b>Распорядок дня</b>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="col-lg-6">
			</div>
			<div class="col-lg-6 pull pull-right">
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Введите дату" aria-describedby="basic-addon2" id="choiceDate">
				  <span class="input-group-addon" id="basic-addon2"><a href="#" id="Schedule">Показать расписание</a></span>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<table class="table table-condenced">
			<tr>
				<td><b>#</b></td>
				<td><b>Мероприятие</b></td>
				<td><b>Помещение</b></td>
				<td><b>Время начала</b></td>
				<td><b>Время конца</b></td>
				<td><b>Пациент / Группа пациентов</b></td>
				<td><b>Ответственный</b></td>
			</tr>
			<? for($i = 0; $i < count($schedule); $i++) 
			{
				$k = $i + 1;
				$procedure = getProcedureNameById($schedule[$i]->id_procedure);
				$place = getPlaceNameById($schedule[$i]->id_place);
				$patient = getPatientInfoById($schedule[$i]->id_patient);
				$personal = getPersonalInfoById($schedule[$i]->id_doctor);

				$now = date('H:i');

				if ($schedule[$i]->start_time <= $now && $schedule[$i]->finish_time >= $now) {
			?>
			<tr class="info">
				<td><?=$k?></td>
				<td><?=$procedure; ?></td>
				<td><?=$place; ?></td>
				<td><?=$schedule[$i]->start_time; ?></td>
				<td><?=$schedule[$i]->finish_time; ?></td>
				<? if (is_numeric($schedule[$i]->id_patient)) { ?>
					<td><?=$patient->patientname; ?></td>
				<?  } else { ?>
					<td><span><a href="#" id="<?=$schedule[$i]->id_patient; ?>" class="groups">Группа пациентов</a></span></td>
				<? } ?>
				<td><?=$personal->username; ?></td>
			</tr>
			<? } elseif ($now > $schedule[$i]->finish_time) { ?>
			<tr class="success">
				<td><?=$k?></td>
				<td><?=$procedure; ?></td>
				<td><?=$place; ?></td>
				<td><?=$schedule[$i]->start_time; ?></td>
				<td><?=$schedule[$i]->finish_time; ?></td>
				<? if (is_numeric($schedule[$i]->id_patient)) { ?>
					<td><?=$patient->patientname; ?></td>
				<?  } else { ?>
					<td><span><a href="#" id="<?=$schedule[$i]->id_patient; ?>" class="groups">Группа пациентов</a></span></td>
				<? } ?>
				<td><?=$personal->username; ?></td>
			</tr>
			<? } else { ?>
			<tr >
				<td><?=$k?></td>
				<td><?=$procedure; ?></td>
				<td><?=$place; ?></td>
				<td><?=$schedule[$i]->start_time; ?></td>
				<td><?=$schedule[$i]->finish_time; ?></td>
				<? if (is_numeric($schedule[$i]->id_patient)) { ?>
					<td><?=$patient->patientname; ?></td>
				<?  } else { ?>
					<td><span><a href="#" id="<?=$schedule[$i]->id_patient; ?>" class="groups">Группа пациентов</a></span></td>
				<? } ?>
				<td><?=$personal->username; ?></td>
			</tr>
			<? } ?>
			<? } ?>
		</table>
	</div>
</div>


<!-- MODAL -->

<div class="modal fade" id="groups" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Список группы</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12" id="groupinfo">
	        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready( function() {
		$('#main').removeClass('active');
		$('#schedule').addClass('active');

		$('#choiceDate').datepicker({
			altFormat: "dd.mm.yy",
	    	altField: "#choiceDate"
		});

		$('#basic-addon2').click( function() {
			var data = $('#choiceDate').val();
			if (data == '') {
				alert('Выберите дату!');
				return false;
			}
			window.location.href = "?option=schedule&data="+data;
		});
		
		$('.groups').click( function() {
			var s = $(this).attr('id');
			
			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/schedule/groups.php",
				data: 'group='+s,
				success: function(result) {
					$('#groupinfo').html(result);
					$('#groups').modal();
				}
			});
		});
	});
</script>
