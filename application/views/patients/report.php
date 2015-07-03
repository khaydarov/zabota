<script>
	$(document).ready( function() {
		$('#main').removeClass('active');
		$('#patients').addClass('active');
	});
</script>
<?php
	$pat = getPatientInfoById($_GET['id_patient']);
?>
<div class="row">
	<div class="alert alert-info"><b>Расход на пациента на период: <?=$month.'/20'.$year; ?></b></div>
</div>
<br>

<div class="col-lg-12">
	<div class="alert alert-warning">Расход препаратов на пациента - <b><?=$pat->patientname;?></b></div>
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
				<td><?=getMedicineNameById($expences[$i]->med_id); ?></td>
				<td><?=$expences[$i]->count; ?></td>
				<td><?=$expences[$i]->price; ?></td>
				<td><?=$expences[$i]->data; ?></td>
				<td><?=$expences[$i]->period; ?></td>
				<td><?=$patient->patientname; ?></td>
				<td><?=getUserName($expences[$i]->doctor_id); ?></td>
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
				<td><b><?=$sum; ?></b></td>
			</tr>
	</table>
</div>

<br>

<div class="col-lg-12">
	<div class="alert alert-warning">Расходные материалы потраченные напациента- <b><?=$pat->patientname; ?>:</b></div>
</div>
<div class="col-lg-12">
	<table class="table table-condensed">
		<tr align="Center" class="info">
			<td>#</td>
			<td><b>Наименование</b></td>
			<td><b>Количество</b></td>
			<td><b>Цена за штуку (руб)</b></td>
			<td><b>Дата назначения</b></td>
			<td><b>Пациент</b></td>
			<td><b>Врач</b></td>
			<td><b>Сумма (руб)</b></td>
		</tr>
		<?
			$sum = 0;
			$sum_count = 0;
			for($i = 0; $i < count($cexpences); $i++) 
			{
				$k = $i + 1;
				$sum += $cexpences[$i]->price * $cexpences[$i]->count;
				$sum_count += $cexpences[$i]->count;
				$patient = getPatientInfoById($cexpences[$i]->id_patient);		
		?>
			<tr align="center">
				<td><?=$k; ?></td>
				<td><?=getCostNameById($cexpences[$i]->id_cost); ?></td>
				<td><?=$cexpences[$i]->count; ?></td>
				<td><?=$cexpences[$i]->price; ?></td>
				<td><?=$cexpences[$i]->data; ?></td>
				<td><?=$patient->patientname; ?></td>
				<td><?=getUserName($cexpences[$i]->id_doctor); ?></td>
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
				<td><b><?=$sum; ?></b></td>
			</tr>
	</table>
</div>