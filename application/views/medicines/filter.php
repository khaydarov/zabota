<script>
	$(document).ready( function() {
		$('#main').removeClass('active');
	    $('#medicines').addClass('active');
	});
</script>
<div class="row">
	<div class="alert alert-info">
		<b>Наименование: <?=$medicine; ?></b>
	</div>
</div>
<div class="col-lg-12">
	<ul class="nav nav-tabs">
		<li><a href="?option=details&id=<?=$_GET['id_med']; ?>"><---Назад</a></li>
		<li role="presentation" class="active"><a href="?option=details&id=<?=$_GET['id_med'];?>">Отчет за <?=$month.'/'.$year;?></a></li>
	</ul>
	<hr>
</div>
<div class="col-lg-12">
	<div class="alert alert-warning"><b>Приход за месяц:</b></div>
</div>
<div class="col-lg-12">
	<table class="table table-condensed">
		<tr class="info">
			<th>#</th>
			<th>Наименование</th>
			<th>Количество</th>
			<th>Цена за штуку</th>
			<th>Дата прихода</th>
			<th>Сумма (в рублях)</th>
		</tr>
		<?
			$sum = 0;
			$sum_count = 0;
			for($i = 0; $i < count($incomings); $i++) {
				$k = $i + 1;
				$sum += $incomings[$i]->price * $incomings[$i]->count;
				$sum_count += $incomings[$i]->count;
		?>
			<tr align="center">
				<td><?=$k; ?></td>
				<td><?=$medicine; ?></td>
				<td><?=$incomings[$i]->count; ?></td>
				<td><?=$incomings[$i]->price; ?></td>
				<td><?=$incomings[$i]->data; ?></td>
				<td><?=$incomings[$i]->price * $incomings[$i]->count; ?></td>
			</tr>
		<? } ?>
			<tr class="success" align="center">
				<td><b>ИТОГ:</b></td>
				<td></td>
				<td><b><?=$sum_count; ?></b></td>
				<td></td>
				<td></td>
				<td><b><?=$sum; ?></b></td>
			</tr>
	</table>
</div>
<hr>
<div class="col-lg-12">
	<div class="alert alert-warning"><b>Расход за месяц:</b></div>
</div>
<div class="col-lg-12">
	<table class="table table-condensed">
		<tr align="Center" class="info">
			<td><b>#</b></td>
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
				<td><?=$sum; ?></td>
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

