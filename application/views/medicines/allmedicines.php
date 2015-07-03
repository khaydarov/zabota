<script>
	 $(document).ready( function() {
	    $('#main').removeClass('active');
	    $('#medicines').addClass('active');

	    $('#med').click( function() {
			var med_name = $('#med_name').val();
			var category = $('#category').val();

			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/medicines/addmedicines.php",
				data: 'name='+med_name+'&cat='+category,
				success: function(result) {
		              window.location.href = "?option=medicines";
				}
			});
	    });
		
	  });
</script>
<div class="row">
	<div class="alert alert-info">
		<b>Список медикаментов</b>
	</div>
</div>
<?php
?>
<div class="row">
	<div class="col-lg-12">
		<div class="pull pull-right">
			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Добавить медикамент</button>
			<button class="btn btn-warning btn-sm" id="sp"><span class=""></span> Списывание за сегодняшний день</button>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<table class="table table-condenced table-responsive">
			<tr class="success">
				<th>#</th>
				<th>Название медикамента</th>
				<th>Количество на складе, шт</th>
				<th>Дата последнего прихода</th>
				<th>Категория</th>
			</tr>
			<? for($i = 0; $i < count($allmedicines); $i++) { 
					$n = $i + 1;
			?>
				<? if ($allmedicines[$i]->category == 1 && $allmedicines[$i]->count <= 10) { ?>
					<tr class="danger">
						<td><?=$n;?></td>
						<td align="center"><a href="?option=details&id=<?=$allmedicines[$i]->id; ?>"><?=$allmedicines[$i]->name; ?></a></td>
						<td><a href=""> <?=$allmedicines[$i]->count; ?></a></td>
						<td><a href=""> --<?=$allmedicines[$i]->lastupdate; ?></a></td>
						<td>Скорая помощь</td>
					</tr> 
				<? } else if ($allmedicines[$i]->category == 1 && $allmedicines[$i]->count > 10) { ?>
						<tr class="info">
						<td><?=$n;?></td>
						<td align="center"><a href="?option=details&id=<?=$allmedicines[$i]->id; ?>"><?=$allmedicines[$i]->name; ?></a></td>
						<td><a href=""> <?=$allmedicines[$i]->count; ?></a></td>
						<td><a href=""> --<?=$allmedicines[$i]->lastupdate; ?></a></td>
						<td>Скорая помощь</td>
					</tr> 
				<? } else if ($allmedicines[$i]->category == 0 && $allmedicines[$i]->count <= 10) { ?>
					<tr class="warning">
						<td><?=$n;?></td>
						<td align="center"><a href="?option=details&id=<?=$allmedicines[$i]->id; ?>"><?=$allmedicines[$i]->name; ?></a></td>
						<td><a href=""><?=$allmedicines[$i]->count; ?></a></td>
						<td><a href=""> --<?=$allmedicines[$i]->lastupdate; ?></a></td>
						<td>Обычный</td>
					</tr>
				<? } else if ($allmedicines[$i]->category == 0 && $allmedicines[$i]->count > 10){ ?>
					<tr class="">
						<td><?=$n;?></td>
						<td align="center"><a href="?option=details&id=<?=$allmedicines[$i]->id; ?>"><?=$allmedicines[$i]->name; ?></a></td>
						<td><a href=""><?=$allmedicines[$i]->count; ?></a></td>
						<td><a href=""> --<?=$allmedicines[$i]->lastupdate; ?></a></td>
						<td>Обычный</td>
					</tr>
				<? } ?> 
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
        <h4 class="modal-title" id="myModalLabel"><b>Добавить медикамент</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<input type="text" class="input-sm form-control" id="med_name" placeholder="Введите название медикамента">
	        	</div>
	        	<div class="form-group">
	        		<select class="form-control input-sm" name="" id="category">
	        			<option value="0">Обычный</option>
	        			<option value="1">Скорая помощь</option>	
	        		</select>
	        	</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="med">Сохранить</button>
      </div>
    </div>
  </div>
</div>