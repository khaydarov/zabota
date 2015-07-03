<script>
  $(document).ready( function() {
    $('#main').removeClass('active');
    $('#notopened').addClass('active');
  })
</script>
<?php
?>
<div class="row">
  				<div class="alert alert-info"><b>Список заявок</b></div>
  			</div>
			<table class="table table-hover">
  				<tr>
  					<th>№ </th>
  					<th>Ф.И.О отправителя</th>
  					<th>Тип документа</th>
  					<th>Дата отправки</th>
  					<th>Статус</th>
  				</tr>
  				<?php
              for($i = 0; $i < count($claim); $i++) {
                $n = $i + 1;
                $id = $claim[$i]->cid;
                if ($claim[$i]->status == '1') {
                echo "<tr class='success'>";
                  echo '<td>'.$n.'</td>';
                  echo "<td><a href='?option=editclaim&id=$id'>".$claim[$i]->sen_name.'</td>';
                  echo "<td><a href='?option=editclaim&id=$id'>".getTypeName($claim[$i]->type).'</td>';
                  echo "<td><a href='?option=editclaim&id=$id'>".$claim[$i]->out_date.'</td>';
                  echo '<td>Отправлен</td>';
                echo '</tr>';
               }
              }
          ?>
			</table>
		<ul class="pager">
  			<li class="previous"><a href="#">&larr; Предыдущая</a></li>
			<li class="next"><a href="#">Следующая &rarr;</a></li>
		</ul>