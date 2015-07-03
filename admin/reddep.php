<?php
    $conn = mysql_connect('localhost', 'root', '');
    $db = mysql_select_db('dt', $conn);
	
	$sql = "SELECT * FROM department";
	$res = mysql_query($sql);
	
	while($row = mysql_fetch_object($res))
		$result[] = $row;

    if (isset($_POST['submit']))
    {
      $name_ru = $_POST['name_ru'];
      $name_tj = $_POST['name_tj'];
	  $id = $_POST['id'];

      $sql = "UPDATE department SET name_ru='$name_ru' AND name_tj='$name_tj' WHERE id='$id'";

      mysql_query($sql);

    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Список заявок</title>

	<!-- INCLUDE STYLES -->
	<link rel="stylesheet" href="/dt/application/views/styles/css/bootstrap.css">
	<link rel="stylesheet/less" href="/dt/application/views/styles/main.less">
	<link rel="stylesheet" href="/dt/application/views/styles/tpl.css">
	<link rel="stylesheet" href="/dt/application/views/styles/css/south-street/jquery-ui-1.10.4.custom.css">	

	<!-- INCLUDE JS -->
	<script src="/dt/application/views/styles/js/jquery-1.9.1.js"></script>
	<script src="/dt/application/views/styles/js/jquery-ui-1.10.3.custom.js"></script>
	<script src="/dt/application/views/styles/js/bootstrap.js"></script>
	<script src="/dt/application/views/styles/js/json2.js"></script>
	<script src="/dt/application/views/styles/js/xmlhttprequest.js"></script>
	<script src="/dt/application/views/styles/js/9.less-1.3.0.min.js"></script>

	<script>
       $(document).ready (function() {
          $('#data').datepicker();
          $('#data1').datepicker();
		  
       });
	   
	   function reddep() {
		var str = $('#department option:selected').val();
		a = str.split(' / ');
		$('#id_dep').val(a[0]);
		$('#name_ru').val(a[1]);
		$('#name_tj').val(a[2]);
	   }
  </script>
  <?
     $count = '';//getCountOfClaims($_SESSION['uid']);
     $countOfInput = '';//CountOfInput($_SESSION['uid']);
     $countOfOutput = '';//CountOfOutput($_SESSION['uid']);
     $countClosed = '';//getCountofClosed($_SESSION['id_dep']);
  ?>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="#">Ориенбанк</a>
   		 	</div>
   		 	<div class="col-lg-6">
				<div class="row">
					<form class="col-lg-5 navbar-form navbar-left" role="search">
       					<div class="form-group">
          					<input type="text" style="width: 500px;" class="form-control" placeholder="Найти заявку">
        				</div>
        				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Найти</button>
      				</form>
      			</div>
      		</div>
      		<ul class="nav navbar-nav navbar-right">
       			<li><a href="#"><span class="glyphicon glyphicon-user"></span> <? echo $_SESSION['lastname'].' '.$_SESSION['name']; ?></a></li>
       			<li class="dropdown">
   					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Настройки <span class="caret"></span></a>
    				<ul class="dropdown-menu">
      					<li><a href="#">Profile</a></li>
  						<li><a href="#">Messages</a></li>
    				</ul>
    			   </li>
             <li><a href="?option=logOut"><span class="glyphicon glyphicon"></span>Выйти</a></li>
        	 </ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="col-lg-3">
			<ul class="nav nav-pills nav-stacked">
  		  <li id="main"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Главная страница</a></li>
          <li><a href="dep.php">Добавить департамент</a></li>
          <li class="active"><a href="reddep.php">Редактировать департамент</a></li>
          <li><a href="user.php">Добавить сотрудника</a></li>
          <li id="addcontact"><a href="contact.php"><span class="glyphicon glyphicon-floppy-saved"></span> Добавить контакт</a></li>
          <li id="contacts"><a href=""><span class="glyphicon glyphicon-th-list"></span> Контакты</a></li>
  				<li id="chat"><a href="?option=chat"><span class="glyphicon glyphicon-comment"></span> Чат</a></li>
			</ul>
		</div>
		<div class="col-lg-9 add_claim">
          <form action="" method="post">
            <div class="row">
              <div class="alert alert-info">Редактировать департамент</div>
            </div>
			<div class="form-group">
				<label for="">Выберите департамент:</label>
				<select name="" id="department" class="form-control" onchange="reddep();">
					<option>Департамент</option>
					<? for($i = 0; $i < count($result); $i++) { ?>
						<option><?=$result[$i]->id.' / '.$result[$i]->name_ru.' / '.$result[$i]->name_tj; ?></option>
					<? } ?>
				</select>
			</div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Название департамента на русском" name='name_ru' id="name_ru">
            </div>
            <br>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Название департамента на таджикском" name="name_tj" id="name_tj">
            </div>
			<input type="hidden" name="id" value="" id="id_dep">
            <button type="submit" name="submit" class="btn btn-success">Добавить</button>
            <hr>
          </form>   
		</div>
	</div>
</body>
</html>