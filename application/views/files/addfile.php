<script type="text/javascript">
	$(document).ready ( function () {
		$('#files').addClass('active');
		$('#addclaim').removeClass('active');
	});
</script>
<div class="row">
		<div class="alert alert-info"><b>Добавить файл </b></div>
</div>
<div class="row">
	<div class="col-lg-12">
		<form action="?option=addfile&id=<?=$_GET['id_cat']; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="file" class="form-control" placeholder="Введите название папки" name="file">
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-info">Добавить</button>
			</div>
		</form>
	</div>
</div>