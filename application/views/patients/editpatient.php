<script>
  $(document).ready( function() {
    $('#main').removeClass('active');
    $('#patients').addClass('active');

    $('#nazdata').datepicker({
    	altFormat: "dd.mm.yy",
	    altField: "#nazdata"
    });

     $('#nazdata1').datepicker({
    	altFormat: "dd.mm.yy",
	    altField: "#nazdata1"
    });

    $('#period').datepicker({
    	altFormat: "dd.mm.yy",
	    altField: "#period"
    });

    
    $('#data_procedure').datepicker({
    	altFormat: "dd.mm.yy",
	    altField: "#data_procedure"
    });

    $('#stop').click( function() {

    });

    $('#addmedicine').click( function() {
    	var id_med = $('#medicineList').val();
    	var count = $('#count').val();
    	var price = $('#price').val();
    	var pat_id = $('#patient_id').val();
    	var data = $('#nazdata').val();
    	var period = $('#period').val();
    	
    	$.ajax({
    		type: "POST",
    		url: "application/views/claims/ajax/medicines/expences.php",
    		data: 'id='+id_med+'&count='+count+'&price='+price+'&patient_id='+pat_id+'&nazdata='+data+'&period='+period,
    		success: function(result) {
    			$('#medicine').modal('hide');
    			$('#success').modal();
    			
    			setTimeOut( function() { window.location.reload() }, 1000);

    			window.location.reload() 
    		}
    	});
    });

    $('#addcost').click( function() {
    	var id_cost = $('#CostList').val();
    	var count = $('#count1').val();
    	var price = $('#price1').val();
    	var pat_id = $('#patient_id1').val();
    	var data = $('#nazdata1').val();
    	
    	$.ajax({
    		type: "POST",
    		url: "application/views/claims/ajax/costs/expences.php",
    		data: 'id='+id_cost+'&count='+count+'&price='+price+'&patient_id='+pat_id+'&nazdata='+data,
    		success: function(result) {
    			$('#costnazn').modal('hide');
    			$('#success').modal();
    			
    			setTimeOut( function() { window.location.reload() }, 1000);

    			window.location.reload() 

    		}
    	});
    });


    $('#addprocedure').click( function() {
    	var id_patient = $('#patient_id').val();
    	var id_doctor = $('#id_doctor').val();
    	var id_place = $('#id_place').val();
    	var id_procedure = $('#id_procedure').val();
    	var data = $('#data_procedure').val();
    	var start = $('#start').val();
    	var end = $('#end').val();

    	$.ajax({
    		type: "POST",
    		url: "application/views/claims/ajax/procedure.php",
    		data: 'id_patient='+id_patient+'&id_doctor='+id_doctor+'&id_place='+id_place+'&id_procedure='+id_procedure+'&data='+data+'&start='+start+'&end='+end,
    		success: function(result) {
    			$('#procedure').modal('hide');
    			$('#success').modal();

    			window.location.reload();
    		}
    	})
    });

     	$('#repo').click( function() {

	    	var patient_id = $('#patient_id').val();
	    	var month = $('#month').val();
	    	var year = $('#year').val();
	    	
	    	window.location.href = "?option=report&id_patient="+patient_id+'&month='+month+'&year='+year;
	   	});
  });
</script>
<?
    $foto_url = 'img/unknown.jpg';
    $patient = getPatientInfoById($_GET['id']);
?>
<div class="row">
	<div class="col-lg-3" >
		<div class="contact-block">
			<div><img src="<?=$foto_url; ?>" alt="" width="100%" class="img"></div>
		</div>
	</div>
	<div class="col-lg-9" >
		<div class="contact-info">
			<b class="info">Ф.И.О:</b> <?=$patient->patientname; ?><br>
			<b class="info">Дата рождения:</b> <?=$patient->birthdate; ?><br>
				<br>
			<b>Категория обслуживания:</b> <?=$patient->category ?><br>
			<b>День ангела: </b> <?=$patient->angeldate; ?><br>
			<b>Телефон родственника: </b> <?=$patient->phone; ?> <br>
			<b>Данные родственника: </b> <?=$patient->passport; ?> <br>
			<b>Дата поступления пациента: </b> <?=$patient->indate; ?> <br>
			<b>Номер палаты: </b> <?=$patient->palata; ?> <Br>
			<b>Привычки: </b> <?=$patient->habits; ?> <br>
			<b>Условия проживания до: </b> <?=$patient->circs; ?> <br>
			<b>Дополнительные пометки: </b> <?=$patient->dp; ?> <br>
			<br>
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#procedure">Назначить процедуру</button>
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#medicine">Назначить препарат</button>
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#costnazn">Расходный материал</button>
			<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#report">Показать отчет на пациента</button>
			<!--<button class="btn btn-sm btn-danger" id="stop">Остановить лечение</button>-->
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
				<td><b>Ответственный</b></td>
				<td><b>Дата мероприятия</b></td>
				<td><b>Время начала</b></td>
				<td><b>Время завершения</b></td>
			</tr>
			<? 
				$k = 0;
				for($i = 0; $i < count($schedule); $i++) { 
					$k ++;
			?>
			<tr>
				<td><?=$k ; ?></td>
				<td><?=getProcedureNameById($schedule[$i]->id_procedure); ?></td>
				<td><?=getPlaceNameById($schedule[$i]->id_place); ?></td>
				<td><a href="?option=editpersonal&id=<?=$schedule[$i]->id_doctor; ?>"><?=getPersonalNameById($schedule[$i]->id_doctor); ?></a></td>
				<td><a href="?option=schedule&data=<?=$schedule[$i]->data; ?>"><?=$schedule[$i]->data; ?></a></td>
				<td><?=$schedule[$i]->start_time; ?></td>
				<td><?=$schedule[$i]->finish_time; ?></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>

<!--    ------------------------------------------- MODALS ------------------------------------ -->


<!-- Modal for Medicine -->
<div class="modal fade" id="medicine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Назначить препарат</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<select class="form-control input-sm" name="" id="medicineList">
	        			<? for($i = 0; $i < count($medicines); $i++) { ?>
	        				<option value="<?=$medicines[$i]->id; ?>"><?=$medicines[$i]->name; ?></option>
	        			<? } ?>
	        		</select>
	        	</div>
	        	<div class="form-group">
	        		<div class="row">
	        			<div class="col-lg-6">
	        				<input type="text" class="form-control input-sm" id="count" placeholder="Количество">
	        			</div>
	        			<div class="col-lg-6">
	        				<input type="text" class="form-control input-sm" id="price" placeholder="Цена за шт (руб)">
	        			</div>
	        			<input type="hidden" id="patient_id" value="<?=$_GET['id']; ?>">
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control input-sm" id="nazdata" placeholder="Дата назначения препарата">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control input-sm" id="period" placeholder="Период">
	        	</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="addmedicine">Назначить</button>
      </div>
    </div>
  </div>
</div>

<!-- Small modal -->


<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      	<h4 class="modal-title" style="padding: 15px; color: green;">Препарат назначен успешно!!</h4>
    </div>
  </div>
</div>


<!-- Modal for COST -->
<div class="modal fade" id="costnazn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Расходный материал:</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<select class="form-control input-sm" name="" id="CostList">
	        			<? for($i = 0; $i < count($costs); $i++) { ?>
	        				<option value="<?=$costs[$i]->id; ?>"><?=$costs[$i]->name; ?></option>
	        			<? } ?>
	        		</select>
	        	</div>
	        	<div class="form-group">
	        		<div class="row">
	        			<div class="col-lg-6">
	        				<input type="text" class="form-control input-sm" id="count1" placeholder="Количество">
	        			</div>
	        			<div class="col-lg-6">
	        				<input type="text" class="form-control input-sm" id="price1" placeholder="Цена за шт (руб)">
	        			</div>
	        			<input type="hidden" id="patient_id1" value="<?=$_GET['id']; ?>">
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control input-sm" id="nazdata1" placeholder="Дата назначения препарата">
	        	</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="addcost">Продолжить</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal for REPORT -->
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Формирование отчета:</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<label for="">Пациент:</label>
	        		<input type="text" class="input-sm form-control" value="<?=$patient->patientname;; ?>" disabled>
	        		<input type="hidden" name="" id="patient_id" value="<?=$_GET['id']; ?>">
	        	</div>
	        	<div class="form-group">
	        		<div class="row">
	        			<div class="col-lg-6">
	        				<select name="" id="month" class="form-control">
	        					<option value="00">За весь период</option>
	        					<option value="01">Январь</option>
	        					<option value="02">Февраль</option>
	        					<option value="03">Март</option>
	        					<option value="04">Апрель</option>
	        					<option value="05">Май</option>
	        					<option value="06">Июнь</option>
	        					<option value="07">Июль</option>
	        					<option value="08">Август</option>
	        					<option value="09">Сентябрь</option>
	        					<option value="10">Октябрь</option>
	        					<option value="11">Ноябрь</option>
	        					<option value="12">Декабрь</option>
	        				</select>
	        			</div>
	        			<div class="col-lg-6">
	        				<select name="" id="year" class="form-control">
	        					<option value="15">2015</option>
	        					<option value="14">2014</option>
	        					<option value="13">2013</option>
	        					<option value="12">2012</option>
	        					<option value="11">2011</option>
	        					<option value="10">2010</option>
	        					<option value="09">2009</option>
	        					<option value="08">2008</option>
	        					<option value="07">2007</option>
	        					<option value="06">2006</option>
	        				</select>
	        			</div>
	        		</div>
	        	</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="repo">Показать результат</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal for PROCUDURE!!! -->
<div class="modal fade" id="procedure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Назначить процедуру:</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<label for="">Выберите процедуру:</label>
	        		<select name="" id="id_procedure" class="form-control">
	        			<?for($i = 0; $i < count($procedure); $i++) { ?>
	        			<option value="<?=$procedure[$i]->id; ?>"><?=$procedure[$i]->name; ?></option>
	        			<? } ?>
	        		</select>
	        	</div>
	        	<div class="form-group">
	        		<label for="">Выберите помещение для проведения процедуры:</label>
	        		<select name="" id="id_place" class="form-control">
	        			<? for($i = 0; $i < count($place); $i++) { ?>
	        			<option value="<?=$place[$i]->id; ?>"><?=$place[$i]->name; ?></option>
	        			<? } ?>
	        		</select>
	          	</div>
	          	<div class="form-group">
	          		<label for="">Выберите ответственного врача:</label>
	          		<select name="" id="id_doctor" class="form-control">
	          			<option value="0">Выберите из списка</option>
	          			<? for($i = 0; $i < count($doctor); $i++) { ?>
	          			<option value="<?=$doctor[$i]->id; ?>"><?=$doctor[$i]->username; ?></option>
	          			<? } ?>
	          		</select>
	          	</div>
	          	<div class="form-group">
	          		<label for="">ФИО Пациента:</label>
	          		<input type="text" class="form-control" id="id_patient" value="<?=$patient->patientname; ?>" disabled>
	          	</div>
	          	<div class="form-group">
	          		<input type="text" class="form-control" id="data_procedure" placeholder="Дата мероприятия">
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
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="addprocedure">Назначить</button>
      </div>
    </div>
  </div>
</div>