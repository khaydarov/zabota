<script type="text/javascript">
	$(document).ready ( function () {
		$('#files').addClass('active');
		$('#addclaim').removeClass('active');
	});
</script>
<div class="row">
		<div class="alert alert-info"><b>Добавить категорию / папку </b></div>
</div>
<div class="row">
	<div class="col-lg-12">
		<form action="?option=addcategory" method="post">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Введите название папки" name="name">
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-info">Добавить</button>
			</div>
		</form>
	</div>
</div>