<script>
	$(document).ready( function() {
		$('#main').removeClass('active');
		$('#addclaim').addClass('active');

	});
	
	function checkdate() {
		var d = $('#data').val();
		var d1 = $('#data1').val();
		
		if (d > d1) {
			alert('Дата выходящего не может быть меньше даты входящего');
			$('#data1').val('');
		}
	}
    function getSection() {
		var id = $('#sen_dep option:selected').val();

		$.ajax({
			type: "POST",
			url: "application/views/claims/ajax/getDirector.php",
			data: 'id='+id,
			success: function(result) {
                 $('#sen_sec').html(result);
			}
		});
	}
	
	function generateOutNum() {
		var section = $('#sen_sec :selected').val();
		var department = $('#sen_dep :selected').val();
		var type = $('#type :selected').val();

		var depCode;
		var secCode;
		var typeCode;
		var lastClaim;
        var gen;
		

		$.ajax ({
			async: false,
			type: "POST",
			url: "application/views/claims/ajax/departmentCode.php",
			data: 'id='+department,
			dataType: 'text',
			success: function CallbackName(result) {
			    depCode = result;
			}
		});

		$.ajax ({
			async: false,
			type: "POST",
			url: "application/views/claims/ajax/sectionCode.php",
			data: 'id='+section,
			dataType: 'text',
			success: function CallbackName(result) {
			    secCode = result;
			}
		});

		$.ajax ({
			async: false,
			type: "POST",
			url: "application/views/claims/ajax/type.php",
			data: 'id='+type,
			dataType: 'text',
			success: function CallbackName(result) {
			    typeCode = result;
			}
		});

		$.ajax ({
			async: false,
			type: "POST",
			url: "application/views/claims/ajax/lastClaim.php",
			dataType: 'text',
			success: function CallbackName(result) {
			    lastClaim = result;
			}
		});
        
        gen = depCode+'/'+secCode+'-'+typeCode+'/'+lastClaim;

        $('#in_num').val(gen);
	}

	function getDirector(id) {
		//var id = $('#rec_dep :selected').val();
        
        $.ajax({
        	type: "POST",
        	url: "application/views/claims/ajax/getDirector1.php",
        	data: "id="+id,
        	success: function(result) {
        		$('#rec').html(result);
        	}
        })
	}
	
	getDirector('82');
</script>
<div class="row">
  				<div class="alert alert-info"><b>Добавить заявку</b></div>
  			</div>
				<form method="post" action="" role="form" name="form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-4">
							<select class="form-control" name="type" id="type" >
								<option value="">Выберите тип документа</option>
								<?php
								    for($i = 0; $i < count($types); $i++) {
								    	$idt = $types[$i]->id;
								    	echo "<option value='$idt'>".$types[$i]->name_ru.' / '.$types[$i]->name_tj."</option>";
								    }
								?>
							</select>
						</div>
						<div class="col-sm-7">
							<input type="text" class="form-control input-md" placeholder="Тема / Описание документа" name="description">
						</div>
					</div>
					<br>
					<div class="form-group">
						<select class="form-control" id="sen_dep" name="sen_dep" onchange="getSection()">
							<option value="">Департамент отправителя: </option>
							<?php
							    for($i = 0; $i < count($departments); $i++) {
							    	$idd = $departments[$i]->id;
							    	echo "<option value='$idd'>".$departments[$i]->name_ru. ' / '.$departments[$i]->name_tj. "</option>";
							    }
							?>
						</select>
						<br>
						<select class="form-control" name="sen_name" id="sen_sec" onchange="generateOutNum()">
							<option value="">Отправитель: </option>
						</select>
					</div>
					<div class="row">
						<div class="col-sm-5">
							<input type="text" class="form-control input-md" placeholder="Номер входящего" name="in_num" id="in_num">
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control input-md" id="data" placeholder="Выберите дату" name="in_date">
						</div>
					</div>
					<br>
					
					<!--<div class="form-group">
						<input type="text" class="form-control input-md" placeholder="Ф.И.О отправителя" name="sen_name">
					</div>-->
					<div class="form-group">
						<input type="file" name="filename" size="">
					</div>
					<div class="form-group">
						<select class="form-control" name="rec_dep" id="rec_dep" onchange="getDirector();">
							<option value="">Департамент получателя</option>
							<?php
							    for($i = 0; $i < count($departments); $i++) {
							    	$ide = $departments[$i]->id;
									if ($departments[$i]->id == '82')
										echo "<option value='$ide' selected>".$departments[$i]->name_ru.' / '.$departments[$i]->name_tj."</option>";
									else 
										echo "<option value='$ide'>".$departments[$i]->name_ru.' / '.$departments[$i]->name_tj."</option>";
									
							    }
							?>
						</select>
						<br>
						<select class="form-control" name="rec" id="rec">
							<option value="">Получатель:</option>
						</select>
					</div>
					<div class="row">
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Номер Исходящего" name="out_num">
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Дата" id="data1" name="out_date" onchange="checkdate(); ">
						</div>
					</div>
					<br>
					<button class="btn btn-md btn-primary" name="submit">Добавить</button>
				</form>
				<br>