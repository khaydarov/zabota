<script>
	$(document).ready( function() {
		$('#main').removeClass('active');
		$('#costs').addClass('active');

		$('#cost').click( function() {
			var name = $('#costname').val();

			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/costs/add.php",
				data: 'name='+name,
				success: function(result) {
		            window.location.reload();
				}
			});
		});
	});
</script>
<div class="row">
	<div class="alert alert-info"><b>Расходные материалы:</b></div>
</div>
<div class="col-lg-12">
	<div class="pull pull-right">
		<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addcosts">Добавить расходный материал</button>
	</div>
</div>
<br>
<br>
<div class="col-lg-12">
	<table class="table table-condensed">
		<tr >
			<th>#</th>
			<th>Наименование</th>
			<th>Количество</th>
			<th>Дата последнего прихода</th>
			<th>--</th>
		</tr>
		<?php
			for($i = 0; $i < count($costs); $i++)
			{
				$k = $i + 1;
		?>
		<tr >
			<td><?=$k; ?></td>
			<td><a href="?option=cincoming&id=<?=$costs[$i]->id; ?>"><?=$costs[$i]->name; ?></a></td>
			<td><b><?=$costs[$i]->count; ?></b></td>
			<td><?='-'; ?></td>
			<td><?='--'; ?></td>
		</tr>
		<?	} ?>
	</table>
</div>

<!-- MODAL -->
<div class="modal fade" id="addcosts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Добавить материал</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<input type="text" class="form-control input-sm" id="costname" placeholder="Название материала">
	        	</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="cost">Сохранить</button>
      </div>
    </div>
  </div>
</div>