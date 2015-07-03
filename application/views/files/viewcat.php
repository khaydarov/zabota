<script type="text/javascript">
	$(document).ready ( function () {
		$('#files').addClass('active');
		$('#addclaim').removeClass('active');
	});
</script>
<div class="row">
	<div class="alert alert-info"><b>Категория: <?=$files[0]->name; ?></b>
		<div class="pull pull-right">
			<a href="?option=addfile&id_cat=<?=$_GET['id']; ?>" class="btn btn-info btn-sm">Добавить файл</a>
		</div>
	</div>
</div>
<div class="row">
	<? if (count($files) == 0) { ?>
		<div class="col-lg-12">
			<a href="?option=files"><--- Назад</a>
		</div>	
		<div class="col-lg-12">
			<div class="bs-callout bs-callout-warning">В этой категории нет файлов, для того чтобы добавить <a href="?option=addfile&id_cat=<?=$_GET['id']; ?>">перейдите по ссылке</a></div>
		</div>
	<? } else { ?>
	<table class="table table-hovered">
		<tr>
			<th>#</th>
			<th>Название файла</th>
			<th>Размер</th>
			<th>Дата добавления</th>
		</tr>
		<tr class="success">
			<td></td>
			<td><a href="?option=files"><--- Назад </a></td>
			<td></td>
			<td></td>
            <td></td>
		</tr>
		<? for($i = 0; $i < count($files); $i++) 
		    { 
		    	$n = $i + 1; 
		    	$address = 'http://localhost/dt/uploads/files/'.$files[$i]->filename;
		?>
			<tr class="success">
				<td align="right"><a href=""><?=$n; ?></a></td>
				<td ><a href="<?=$address; ?>"><span class="glyphicon glyphicon-file"></span> <?=$files[$i]->filename; ?></a></td>
				<td><a href="<?=$address; ?>"><?=$files[$i]->size; ?> Кб</a></td>
				<td></td>
				<td></td>
			</tr>
		<? } ?>
	</table>
	<? } ?>
</div>