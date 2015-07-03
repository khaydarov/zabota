<script>
  $(document).ready( function() {
    $('#main').removeClass('active');
    $('#contacts').addClass('active');
  })
</script>
<?
    $phone = getPhoneNumber($contact->id);
    $foto_url = 'http://localhost/dt/uploads/photos/'.$contact->photo;
?>
<div class="row">
	<div class="col-lg-3" >
		<div class="contact-block">
			<div><img src="<?=$foto_url; ?>" alt="" width="100%" class="img"></div>
		</div>
	</div>
	<div class="col-lg-9" >
		<div class="contact-info">
			<b class="info">Ф.И.О:</b> <?=$contact->lastname.' '.$contact->name.' '.$contact->fname; ?><br>
			<b class="info">Мобильный телефон:</b> <?=$phone; ?><br>
			<b class="info">E-mail:</b> <?=$contact->email; ?><Br>
				<br>
			<b>Департамент:</b> <?=getDepNameById($contact->id_dep); ?><br>
			<b>Отдел: </b> <?=getSecNameById($contact->id_sec); ?><br>
			<b>Должность: </b> <?=$contact->position; ?><br>
			<b>Внутренний телефон: </b> <?=$contact->in_t; ?><br>
			<b>Городской телефон: </b> <?=$contact->out_t; ?><br>
		</div>
	</div>
</div>