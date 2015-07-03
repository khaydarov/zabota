<?php
   $depId = $_SESSION['id_dep'];
   $department = getSectionsFromDepartment($depId);

   $secId = $_SESSION['id_sec'];
   $users = getUsersFromSection($secId);
   
   $file = getFileNameByCid($_GET['id']);

	$to = sendedto($_GET['id'], $_SESSION['uid']);


?>
<div class="row">
  			<div class="alert alert-info"><b>Заявка № <?=$_GET['id'];?></b></div>
  			</div>
				<form method="post" action="" role="form" name="form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-5">
							<input type="text" class="form-control input-md" placeholder="Номер входящего" value="<?=$claim->in_num;?>              --- Входящий номер" disabled>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control input-md" id="data" placeholder="Выберите дату" value="<?=$claim->in_date; ?>          --- Дата входящего" disabled>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-4">
							<input type="text" class="form-control input-md" placeholder="Тема" value="<?=getTypeName($claim->type); ?>          --- Тип документа" disabled>
						</div>
						<div class="col-sm-7">
							<input type="text" class="form-control input-md" placeholder="Тема / Описание документа" value="<?=$claim->description; ?>        --- Короткое описание" disabled>
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
							<input type="text" class="form-control" placeholder="Номер Исходящего" value="<?=$claim->out_num; ?>            --- Исходяший номер" disabled>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Дата" id="data1" value="<?=$claim->out_date; ?>            --- Дата исходяшего" disabled>
						</div>
					</div>
					<br>
					<div class="form-group">
					<?php if ($_SESSION['role'] == '2') { ?> 
						<select class="form-control" name="manager" id="">
							<option value="">Отправить:</option>
							<?php
							    $zamdir = getDirector2s($_SESSION['id_dep']);
							    for($i = 0; $i < count($zamdir); $i++) {
							    	$id = $zamdir[$i]->id;
							    	echo "<option value='zam$id'>".$zamdir[$i]->lastname.' '.$zamdir[$i]->name.'</option>';
							    }
							?>
							<?php
							    for($i = 0; $i < count($department); $i++) {
							    	$id = $department[$i]->id;
							    	echo "<option value='$id'>".$department[$i]->name_ru.' / '.$department[$i]->name_tj."</option>";
							    }
							?>
						</select>
					<? } ?>

					<?php if ($_SESSION['role'] == '5') { ?> 
						<select class="form-control" name="manager" id="">
							<option value="">Отправить отделу:</option>
							<?php
							    for($i = 0; $i < count($department); $i++) {
							    	$id = $department[$i]->id;
							    	echo "<option value='$id'>".$department[$i]->name_ru.' / '.$department[$i]->name_tj."</option>";
							    }
							?>
						</select>
					<? } ?>

					<?php if ($_SESSION['role'] == '3') { ?> 
						<select class="form-control" name="user" id="">
							<option value="">Отправить сотруднику:</option>
							<?php
							    for($i = 0; $i < count($users); $i++) {
							    	$id = $users[$i]->id;
							    	echo "<option value='$id'>".$users[$i]->lastname.' '.$users[$i]->name.'</option>';
							    }
							?>
						</select>
					<? } ?>
					<?php if ($_SESSION['role'] == '4') { ?> 
						<input type="file" name="filename">
					<? } ?>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<input type="text" class="form-control" placeholder="Комментарий" name="comment">
						</div>
					</div>
					<br>
					<button type="submit" name="submit" class="btn btn-md btn-primary">Отправить</button>
					<a href="?option=open&file=<?=$file; ?>&id=<?=$_GET['id']; ?>" name="submit" class="btn btn-md btn-primary">Cкачать заявку</a>
					<a href="http://localhost/dt/uploads/claim/<?=$file; ?>" class="btn btn-info">Превью</a>
					<?php if (isClosed($_GET['id']))  { ?>
					<a href="?option=open&file=<?=$file; ?>&id=<?=$_GET['id']; ?>" name="submit" class="btn btn-md btn-primary">Cкачать акт</a>
					<? } ?>
				</form>
				<div class="row">
					<div class="alert alert-warning">
						Отправлено: <?php
						for($i = 0; $i < count($to); $i++) {
							$touser = getUserName($to[$i]->uid);
							echo $touser->lastname.' '.$touser->name.', '; 
						}
						?>
					</div>
				</div>
				<div class="row">
					<div class="alert alert-info"><h4>Комментарии:</h4></div>
					<div class="col-lg-8">
					<?	for($i = 0; $i < count($comment); $i++) { ?>
						<div class="bs-callout bs-callout-info">
							<?php
							$username = getUserName($comment[$i]->uid);
							if ($comment[$i]->touser != 0) {
							    $tou = getUserName($comment[$i]->touser);
							}

							echo '<b>'.$username->lastname.' '.$username->name.'</b> ( '.$tou->lastname.' '.$tou->name .' ) -->  '.$comment[$i]->comment; ?>
						</div>
					<? } ?>
					</div>
				</div>
				<br>