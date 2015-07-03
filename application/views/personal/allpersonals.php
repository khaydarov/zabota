<script>
  $(document).ready( function() {
    $('#main').removeClass('active');
    $('#contacts').addClass('active');
  })
</script>
<?
?>
<div class="row">
  		<div class="alert alert-info"><b>Список персонала</b>
  		</div>
		<div class="col-lg-12">
			<? if ($role == 1) { ?>
		        <div class="pull pull-right"><a href="?option=addpersonal" class="btn btn-sm btn-primary">Добавить персонал</a></div>
		    <? } ?>
        </div>
</div>
<br>
      <div class="table-responsive">
			<table class="table table-bordered">
  				<tr class="">
  					<th>№ </th>
  					<th>Ф.И.О</th>
		            <th>Номер телефона</th>
		  			<th>Номер договора</th>
		  			<th>Доступ к работе</th>
		            <th>Осталось</th>
  				</tr>
          <?php
              for($i = 0; $i < count($personals); $i++) {
                $n = $i + 1;
                $id = $personals[$i]->id;
                
                if (leftTime($personals[$i]->end_access) > 0) {
                  echo "<tr class='success'>";
                       echo "<td>".$n.'</td>';
                       echo "<td><a href='?option=editpersonal&id=$id'>".$personals[$i]->username.'</a></td>';
                       echo "<td><a href='?option=editpersonal&id=$id'>".$personals[$i]->phone.'</a></td>';
                       echo "<td><a href='?option=editpersonal&id=$id'>".$personals[$i]->contract_num.'</a></td>';
                       echo "<td><a href='?option=editpersonal&id=$id'>".$personals[$i]->access.'</a></td>';
                       echo "<td>".leftTime($personals[$i]->end_access)." ".koldays(leftTime($personals[$i]->end_access))."</td>";
                  echo '</tr>';
                }
                else if (leftTime($personals[$i]->end_access) <= 0) 
                {
                  echo "<tr class='danger'>";
                       echo "<td>".$n.'</td>';
                       echo "<td><a href='?option=editpersonal&id=$id'>".$personals[$i]->username.'</a></td>';
                       echo "<td><a href='?option=editpersonal&id=$id'>".$personals[$i]->phone.'</a></td>';
                       echo "<td><a href='?option=editpersonal&id=$id'>".$personals[$i]->contract_num.'</a></td>';
                       echo "<td><a href='?option=editpersonal&id=$id'>".$personals[$i]->access.'</a></td>';
                       echo "<td>Заблокирован</td>";
                  echo '</tr>';
                }
              }
          ?>
			</table>
    </div>
</div>
