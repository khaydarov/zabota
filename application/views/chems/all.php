<script>
	$(document).ready( function() {
		$('#main').removeClass('active');
		$('#chemists').addClass('active');

		$('#chem').click( function() {
			var orgName = $('#orgname').val();
			var orgAddress = $('#orgadd').val();
			var orgContact = $('#orgcont').val();

			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/chems/add.php",
				data: 'name='+orgName+'&address='+orgAddress+'&contact='+orgContact,
				success: function(result) {
					window.location.reload();
				}
			})
		});
	});
</script>
<div class="row">
	<div class="alert alert-info"><b>Список аптек:</b></div>
</div>
<div class="row">
	<div class="pull pull-right">
		<div class="col-lg-2">
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addorg">Добавить организацию</button>
		</div>
	</div>
</div>
<br>
<div class="col-lg-12">
	<table class="table table-bordered">
		<tr>
			<th>№</th>
			<th>Наименование организации</th>
			<th>Контакты</th>
			<th width="30%">Адрес</th>
		</tr>
		<?php
			$k = 0;
			for($i = 0; $i < count($chems); $i++)
			{
				$k = $i + 1;
		?>
		<tr>
			<td><?=$k; ?></td>
			<td><?=$chems[$i]->name; ?></td>
			<td><?=$chems[$i]->contact; ?></td>
			<td><?=$chems[$i]->address; ?></td>
		</tr>
		<? } ?>
	</table>
</div>

<!-- MODAL -->
<div class="modal fade" id="addorg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Добавить организацию</b></h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
	        <form action="" class="form" role="form">
	        	<div class="form-group">
	        		<input type="text" class="form-control input-sm" id="orgname" placeholder="Название организации">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control input-sm" id="orgadd" placeholder="Адрес организации">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control input-sm" id="orgcont" placeholder="Контактные данные организации">
	        	</div>
	        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть окно</button>
        <button type="button" class="btn btn-primary" id="chem">Сохранить</button>
      </div>
    </div>
  </div>
</div>