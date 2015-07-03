<script>
  $(document).ready( function() {
    $('#main').removeClass('active');
    $('#contacts').addClass('active');
  })
</script>
<?
?>
<div class="row">
  				<div class="alert alert-info"><b>Список контактов</b></div>
  			</div>
			<table class="table table-hover">
  				<tr class="success">
  					<th>№ </th>
  					<th>Ф.И.О</th>
  					<th>Департамент</th>
  					<th>Отдел</th>
  					<th>Внутренний телефон</th>
  				</tr>
          <?php
              for($i = 0; $i < count($contacts); $i++) {
                $n = $i + 1;
                $id = $contacts[$i]->id;
                
                echo "<tr class='warning'>";
                     echo "<td>".$n.'</td>';
                     echo "<td><a href='?option=editcontact&id=$id'>".$contacts[$i]->lastname.' '.$contacts[$i]->name.' '.$contacts[$i]->fname.'</a></td>';
                     echo "<td><a href='?option=editcontact&id=$id'>".getDepNameById($contacts[$i]->id_dep).'</a></td>';
                     echo "<td><a href='?option=editcontact&id=$id'>".getSecNameById($contacts[$i]->id_sec).'</a></td>';
                     echo "<td><a href='?option=editcontact&id=$id'>".$contacts[$i]->in_t.'</a></td>';
                echo '</tr>';
              }
          ?>
			</table>
		<ul class="pager">
  			<li class="previous"><a href="#">&larr; Предыдущая</a></li>
			<li class="next"><a href="#">Следующая &rarr;</a></li>
		</ul>