<script>
  $(document).ready( function() {
    $('#main').removeClass('active');
    $('#patients').addClass('active');
  })
</script>
<?
?>
<div class="row">
  				<div class="alert alert-info"><b>Список пациентов:</b>
          </div>
          <div class="col-lg-12">
            <? if ($role == 1) { ?>
              <div class="pull pull-right"><a href="?option=addpatient" class="btn btn-sm btn-primary">Добавить пациента</a></div>
            <? } ?>
          </div>
</div>
<br>
      <div class="table-responsive">
  			<table class="table table-bordered">
    				<tr class="info">
    					<th>№ </th>
    					<th>Ф.И.О</th>
              <th>Дата рождения</th>
              <th>Номер телефона</th>
    					<th>Номер палаты</th>
              <th>Дата поступления</th>
    				</tr>
            <?php
                for($i = 0; $i < count($patients); $i++) {
                  $n = $i + 1;
                  $id = $patients[$i]->id;

                  
                  if ($t == 0) {
                    echo "<tr>";
                         echo "<td>".$n.'</td>';
                         echo "<td><a href='?option=editpatient&id=$id'>".$patients[$i]->patientname.'</a></td>';
                         echo "<td><a href='?option=editpatient&id=$id'>".$patients[$i]->birthdate.'</a></td>';
                         echo "<td><a href='?option=editpatients&id=$id'>".$patients[$i]->phone.'</a></td>';
                         echo "<td><a href='?option=editpatient&id=$id'>".$patients[$i]->palata.'</a></td>';
                         echo "<td><a href='?option=editpatient&id=$id'>".$patients[$i]->indate."</a></td>";
                    echo '</tr>';
                  }
                }
            ?>
  			</table>
    </div>