<script>
	$(document).ready( function() {
		$('#main').removeClass('active');
	    $('#medicines').addClass('active');

	    $('#datnazn').datepicker({
	    	altFormat: "dd.mm.yy",
	    	altField: "#datnazn"
	    });

	    $('#period').datepicker({
	    	altFormat: "dd.mm.yy",
	    	altField: "#datnazn"
	    });


	    $('#filter').click( function() {

	    	var id_med = $('#id_med').val();
	    	var month = $('#month').val();
	    	var year = $('#year').val();

	    	window.location.href = "?option=filter&id_med="+id_med+'&month='+month+'&year='+year;
	    });

	    $('#nazn1').click( function() {

	    	var patient = $('#patient').val();
	    	var count = $('#count1').val();
	    	var price = $('#price1').val();
	    	var data = $('#datnazn').val();
	    	var period = $('#period').val();
	    	var id_med = $('#id_med').val();

	    	$.ajax({
	    		type: "POST",
	    		url: "application/views/claims/ajax/medicines/exp1.php",
	    		data: 'patient='+patient+'&count='+count+'&price='+price+'&data='+data+'&period='+period+'&id_med='+id_med,
	    		success: function(result){
	    			window.location.reload();
	    		}
	    	});
	    });

	});
</script>
<div class="row">
	<div class="alert alert-info"><b>Наименование: <?=$medicine; ?></b></div>
</div>
<div class="col-lg-12">
	<ul class="nav nav-tabs">
		<li role="presentation" ><a href="?option=details&id=<?=$_GET['id'];?>">Приход</a></li>
		<li role="presentation" class="active"><a href="?option=expense&id=<?=$_GET['id'];?>">Расход</a></li>
		<li class="pull pull-right">
			<button class="btn btn-sm btn-info" data-toggle="modal" data-target=".myModal2">
				<span class="glyphicon glyphicon-calendar"></span> Отчет за месяц
			</button>
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".myModal3">
				<span class="glyphicon glyphicon-plus-sign"></span> Назначить препарат
			</button>
		</li>
	</ul>
	<hr>
</div>
<div class="col-lg-12">
	<table class="table table-condensed">
		<tr align="Center" class="info">
			<td>#</td>
			<td><b>Наименование</b></td>
			<td><b>Количество</b></td>
			<td><b>Цена за штуку (руб)</b></td>
			<td><b>Дата назначения</b></td>
			<td><b>Период</b></td>
			<td><b>Пациент</b></td>
			<td><b>Врач</b></td>
			<td><b>Сумма (руб)</b></td>
		</tr>
		<?
			$sum = 0;
			$sum_count = 0;
			for($i = 0; $i < count($expences); $i++) 
			{
				$k = $i + 1;
				$sum += $expences[$i]->price * $expences[$i]->count;
				$sum_count += $expences[$i]->count;
				$patient = getPatientInfoById($expences[$i]->patient_id);		
		?>
			<tr align="center">
				<td><?=$k; ?></td>
				<td><?=$medicine; ?></td>
				<td><?=$expences[$i]->count; ?></td>
				<td><?=$expences[$i]->price; ?></td>
				<td><?=$expences[$i]->data; ?></td>
				<td><?=$expences[$i]->period; ?></td>
				<td><a href="?option=editpatient&id=<?=$patient->id; ?>"><?=$patient->patientname; ?></a></td>
				<td><a href="?option=editpersonal&id=<?=$expences[$i]->doctor_id; ?>"><?=getUserName($expences[$i]->doctor_id); ?></a></td>
				<td><?=$expences[$i]->count * $expences[$i]->price; ?></td>
			</tr>
		<? } ?>
			<tr align="center" class="success">
				<td><b>Всего</b></td>
				<td></td>
				<td><b><?=$sum_count; ?></b></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b><?=$sum; ?></b></td>
			</tr>
	</table>
</div>

<!-- Modal 2-->
<div class="modal fade myModal2" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Фильтрация данных</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<label for="">Наименование:</label>
	        		<input type="text" class="input-sm form-control" value="<?=$medicine; ?>" disabled>
	        		<input type="hidden" name="" id="id_med" value="<?=$_GET['id']; ?>">
	        	</div>
	        	<div class="form-group">
	        		<div class="row">
	        			<div class="col-lg-6">
	        				<select name="" id="month" class="form-control">
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
        <button type="button" class="btn btn-primary" id="filter">Показать результат</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL -->
<!-- Modal 2-->
<div class="modal fade myModal3" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Назначить препарат:</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
				<div class="form-group">
					<label for="">Выберите пациента:</label>
					<select name="" id="patient" class="form-control">
						<option value="0">Всем пациентам</option>
						<? for($i = 0; $i < count($patients); $i++) { ?>
							<option value="<?=$patients[$i]->id; ?>"><?=$patients[$i]->patientname; ?></option>
						<? } ?>
					</select>
				</div>  
				<div class="row">
					<div class="col-lg-6">
						<input type="text" class="form-control" placeholder="Количество" id="count1">
					</div>
					<div class="col-lg-6">
						<input type="text" class="form-control" placeholder="По цене" id="price1">
					</div>
				</div>   
				<br>  
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Дата назначения" id="datnazn">
				</div> 	
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Период назначения" id="period">
				</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="nazn1">Назначить</button>
      </div>
    </div>
  </div>
</div>

