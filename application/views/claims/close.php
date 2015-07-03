<?php
   $depId = $_SESSION['id_dep'];
   $department = getSectionsFromDepartment($depId);

   $secId = $_SESSION['id_sec'];
   $users = getUsersFromSection($secId);
	
	$file = getActByCid($_GET['id']);
?>
<script>
	$(document).ready( function() {
		$('#confirm').click( function() {
            modal();
		})
	})
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Подтверждение</h4>
      </div>
      <div class="modal-body">
        Заявка успешно закрыта!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"></button>
        <button type="button" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>
<div class="row">
  			<div class="alert alert-info"><b>Заявка №<?=$s;?></b></div>
  			</div>
				<form method="post" action="" role="form" name="form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-5">
							<input type="text" class="form-control input-md" placeholder="Номер входящего" value="<?=$claim->in_num;?>" disabled>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control input-md" id="data" placeholder="Выберите дату" value="<?=$claim->in_date; ?>" disabled>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-4">
							<input type="text" class="form-control input-md" placeholder="Тема" value="<?=getTypeName($claim->type); ?>" disabled>
						</div>
						<div class="col-sm-7">
							<input type="text" class="form-control input-md" placeholder="Тема / Описание документа" value="<?=$claim->description; ?>" disabled>
						</div>
					</div>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" value="<?=getDepName($claim->sen_dep); ?>" disabled>
						<br>
						<input type="text" class="form-control" value="<?=getSecName($claim->sen_sec); ?>" disabled>
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-md" placeholder="Ф.И.О отправителя" value="<?=$claim->sen_name; ?>" disabled>
					</div>
					<div class="row">
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Номер Исходящего" value="<?=$claim->out_num; ?>" disabled>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Дата" id="data1" value="<?=$claim->out_date; ?>" disabled>
						</div>
					</div>
					<br>
					
					<button type="submit" name="submit" class="btn btn-md btn-primary" id="confirm" data-toggle="modal" data-target="#myModal">Подтвердить закрытие</button>
					<?php if (isClosed($_GET['id']))  { ?>
					<a href="?option=open1&file=<?=$file; ?>&id=<?=$_GET['id']; ?>" name="submit" class="btn btn-md btn-primary">Cкачать акт</a>
					<? } ?>
				</form>
				<br>