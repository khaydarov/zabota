<script>
	$(document).ready( function() {
		$('#main').removeClass('active');
	    $('#costs').addClass('active');

	    $('#data_incoming').datepicker({
	    	altFormat: "dd.mm.yy",
	    	altField: "#data_incoming"
	    });

	    $('#med').click( function() {
			
	    	var id_cost = $('#id_cost').val();
	    	var count = $('#count').val();
	    	var consigment = $('#consigment').val();
	    	var data = $('#data_incoming').val();
	    	var price = $('#price').val();

			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/costs/incomings.php",
				data: 'id_cost='+id_cost+'&count='+count+'&consigment='+consigment+'&data='+data+'&price='+price,
				success: function(result) {
		            window.location.href = "?option=cincoming&id="+id_cost;

				}
			});
	    });


	    $('#filter').click( function() {

	    	var id_med = $('#id_med').val();
	    	var month = $('#month').val();
	    	var year = $('#year').val();

	    	window.location.href = "?option=cfilter&id_med="+id_med+'&month='+month+'&year='+year;
	    });

	});	
</script>
<div class="row">
	<div class="alert alert-info">
		<b>Наименование: <?=$costs; ?></b>
	</div>
</div>
<div class="col-lg-12">
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="?option=cincoming&id=<?=$_GET['id'];?>">Приход</a></li>
		<li role="presentation" ><a href="?option=expcost&id=<?=$_GET['id'];?>">Расход</a></li>
		<li class="pull pull-right">
			<button class="btn btn-sm btn-info" data-toggle="modal" data-target=".myModal2">
				<span class="glyphicon glyphicon-calendar"></span> Отчет за месяц
			</button>
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">
				<span class="glyphicon glyphicon-plus-sign"></span> Добавить приход
			</button>
		</li>
	</ul>
	<hr>
</div>
<div class="col-lg-12">
	<table class="table table-condensed">
		<tr class="info">
			<th>#</th>
			<th>Наименование</th>
			<th>Количество, шт</th>
			<th>Цена за штуку (руб)</th>
			<th>Дата прихода</th>
			<th>Сумма (руб)</th>
		</tr>
		<?
			$sum = 0;
			$sum_count = 0;
			for($i = 0; $i < count($incomings); $i++) 
			{
				$k = $i + 1;
				$sum += $incomings[$i]->price * $incomings[$i]->count;
				$sum_count += $incomings[$i]->count;
				
		?>
			<tr align="center">
				<td><?=$k; ?></td>
				<td><?=$costs; ?></td>
				<td><?=$incomings[$i]->count; ?></td>
				<td><?=$incomings[$i]->price; ?></td>
				<td><?=$incomings[$i]->data; ?></td>
				<td><?=$incomings[$i]->price * $incomings[$i]->count; ?></td>
			</tr>
		<? } ?>
			<tr align="center" class="success">
				<td><b>Всего</b></td>
				<td></td>
				<td><b><?=$sum_count; ?></b></td>
				<td></td>
				<td></td>
				<td><b><?=$sum; ?></b></td>
			</tr>
	</table>
</div>


<!-- Modal 1-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Приход</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<label for="">Наименование:</label>
	        		<input type="text" class="input-sm form-control" value="<?=$costs; ?>" disabled>
	        		<input type="hidden" name="" id="id_cost" value="<?=$_GET['id']; ?>">
	        	</div>
	        	<div class="form-group">
	        		<div class="row">
		        		<div class="col-lg-6">
		        			<label for="">Количество:</label>
		        			<input type="text" class="input-sm form-control" placeholder="Количество: шт" id="count">
		        		</div>
		        		<div class="col-lg-6">
		        			<label for="">Номер накладной:</label>
		        			<input type="text" class="input-sm form-control" placeholder="Номер накладной" id="consigment">
		        		</div>
		        	</div>
	        	</div>
	        	<div class="form-group">
	        		<label for="">Дата прихода:</label>
	        		<input type="text" class="input-sm form-control" id="data_incoming" placeholder="Дата прихода">
	        	</div>
	        	<div class="form-group">
	        		<label for="">По цене:</label>
	        		<input type="text" class="input-sm form-control" placeholder="Цена" id="price">
	        	</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="med">Добавить</button>
      </div>
    </div>
  </div>
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
	        		<input type="text" class="input-sm form-control" value="<?=$costs;; ?>" disabled>
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

