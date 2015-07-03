<script>
  $(document).ready( function() {
    $('#main').removeClass('active');
    $('#contacts').addClass('active');

    $('#proc_date').datepicker({
	 		altFormat: "dd.mm.yy",
	    	altField: "#proc_date"
	 	});
  })
</script>
<script>
	 $(document).ready( function() {

	 	$('#extends_date').datepicker({
	 		altFormat: "dd.mm.yy",
	    	altField: "#extends_date"
	 	});
	 	
	    $('#extend').click( function() {
			var date = $('#extends_date').val();
			var id = $('#personalId').val();

			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/extend.php",
				data: 'date='+date+'&id='+id,
				success: function(result) {
		              alert("Продлен успешно!!!"); 
					  window.location.href ="?option=allpersonal";
				}
			});
	    });

	    $('#block').click( function() {
	    	var id = $('#personalId').val();

	    	$.ajax({
	    		type: "POST",
	    		url: "application/views/claims/ajax/block.php",
	    		data: 'id='+id,
	    		success: function(result) {
	    			window.location.href ="?option=allpersonal";
	    		}
	    	});
	    });

	    $('#go').click( function() {

	    	var id_procedure = $('#id_procedure').val();
	    	var id_place = $('#id_place').val();
	    	var personalId = $('#personalId').val();
	    	var proc_date = $('#proc_date').val();
	    	var start = $('#start').val();
	    	var end = $('#end').val();

	    	var patList = [];
	    	

	    	$('.patientList input:checked').each( function() {
	    		patList.push($(this).val());
	    	});

	    	$.ajax({
	    		type: "POST",
	    		url: "application/views/claims/ajax/proc.php",
	    		data: 'id_procedure='+id_procedure+'&id_place='+id_place+'&personalId='+personalId+'&proc_date='+proc_date+'&start='+start+'&end='+end+'&patList='+patList,
	    		success: function(result) {
	    			window.location.reload();
	    		}
	    	})
		});
		
	  });
</script>
<?
    $foto_url = 'img/unknown.jpg';
?>
<div class="row">
	<div class="col-lg-3" >
		<div class="contact-block">
			<div><img src="<?=$foto_url; ?>" alt="" width="100%" class="img"></div>
		</div>
	</div>
	<div class="col-lg-9" >
		<div class="contact-info">
			<b class="info">Ф.И.О:</b> <?=$personal->username; ?><br>
			<b class="info">Мобильный телефон:</b> <?=$personal->phone; ?><br>
				<br>
			<b>Образование:</b> <?=$personal->education ?><br>
			<b>Должность: </b> <?=$personal->position; ?><br>
			<b>Доступ к работе: </b> <?=$personal->access; ?> <br>
			<b>Конец доступа к системе: </b> <?=$personal->end_access; ?> <br>
			<b>Дата окончания договора: </b> <?=$personal->end_access; ?> <br>
			<b>Срок истечения сертификата: </b> <?=$personal->end_certificate; ?> <br>
			<b>Номер договора: </b> <?=$personal->contract_num; ?> <br>
			<b>ИНН: </b> <?=$personal->inn; ?> <Br>
			<b>СНИЛС: </b> <?=$personal->snils; ?> <br>
			<br>
			<button class="btn btn-sm btn-danger" id="block">Заблокировать</button>
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Продлить доступ</button>
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#proc1">Назначить мероприятие</button>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-info"><b>Расписание:</b></div>
	</div>
	<div class="col-lg-12">
		<table class="table table-condenced">
			<tr>
				<td>#</td>
				<td><b>Мероприятие</b></td>
				<td><b>Помещение</b></td>
				<td><b>Пациент</b></td>
				<td><b>Дата мероприятия</b></td>
				<td><b>Время начала</b></td>
				<td><b>Время завершения</b></td>
			</tr>
			<? 
				$k = 0;
				for($i = 0; $i < count($schedule); $i++) { 
					$k ++;
					$pat = getPatientInfoById($schedule[$i]->id_patient); 
			?>
			<tr>
				<td><?=$k ; ?></td>
				<td><?=getProcedureNameById($schedule[$i]->id_procedure); ?></td>
				<td><?=getPlaceNameById($schedule[$i]->id_place); ?></td>
				<? if ($pat->patientname != '') { ?>
					<td><a href="?option=editpatient&id=<?=$pat->id; ?>"><?=$pat->patientname; ?></a></td>
				<? } else { ?>
					<td>Группа пациентов</a></td>
				<? } ?>
				<td><a href="?option=schedule&data=<?=$schedule[$i]->data; ?>"><?=$schedule[$i]->data; ?></a></td>
				<td><?=$schedule[$i]->start_time; ?></td>
				<td><?=$schedule[$i]->finish_time; ?></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Продлить доступ</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<input type="text" class="input-sm form-control" id="extends_date" placeholder="Введите дату продливания">
	        		<input type="hidden" id="personalId" value="<?=$_GET['id']; ?>">
	        	</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="extend">Продлить</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL -->
<div class="modal fade" id="proc1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Наметить мероприятие</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="row">
	        		<div class="form-group">
	        			<label for="">Выберите мероприятие:</label>
	        			<select name="" id="id_procedure" class="form-control">
		        			<?for($i = 0; $i < count($procedure); $i++) { ?>
		        			<option value="<?=$procedure[$i]->id; ?>"><?=$procedure[$i]->name; ?></option>
		        			<? } ?>
		        		</select>
	        		</div>
	        		<div class="form-group">
	        			<label for="">Выберите помещение для проведения мероприятия:</label>
	        			<select name="" id="id_place" class="form-control">
		        			<? for($i = 0; $i < count($place); $i++) { ?>
		        			<option value="<?=$place[$i]->id; ?>"><?=$place[$i]->name; ?></option>
		        			<? } ?>
		        		</select>
	        		</div>
	        		<div class="form-group">
	        			<label for="">Ответственный:</label>
	        			<input type="text" id="<?=$_GET['id']; ?>" class="form-control" value="<?=$personal->username;?>" disabled>
	        		</div>
	        	 	<div class="form-group"> 
	        	 		<div class="patientList">
	        	 		<label for="">Выберите пациент/ов из списка:</label>
		        	 		<ul class="col-lg-12 Plist">
		        	 		<? for($i = 0; $i < count($patients); $i++) { ?>
								<li><input type="checkbox" value="<?=$patients[$i]->id; ?>"> <?=$patients[$i]->patientname; ?></li>
		        	 		<? } ?>
		        	 		
		        	 		</ul>
	        	 		</div>
	        	 	</div>
	        	 	<div class="form-group">
	        	 		<label for="">Дата мероприятия:</label>
	        	 		<input type="text" class="form-control" placeholder="Дата мероприятия" id="proc_date">
	        	 	</div>
	        	 	<div class="form-group">
		          		<div class="row">
			          		<div class="col-lg-6">
			          			<input type="text" class="form-control" id="start" placeholder="Время начала процедуры">
			          		</div>
			          		<div class="col-lg-6">
			          			<input type="text" class="form-control" id="end" placeholder="Время конца">
			          		</div>
		          		</div>
		          	</div>
	        	 </div>
	        	 <br>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="go">Назначить</button>
      </div>
    </div>
  </div>
</div>