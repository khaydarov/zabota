<!doctype html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title><?=$title; ?></title>

	<!-- INCLUDE STYLES -->
	<link rel="stylesheet" href="/social/application/views/styles/css/bootstrap.css">
	<link rel="stylesheet/less" href="/social/application/views/styles/main.less">
	<link rel="stylesheet" href="/social/application/views/styles/tpl.css">
	<link rel="stylesheet" href="/social/application/views/styles/css/south-street/jquery-ui-1.10.4.custom.css">	

	<!-- INCLUDE JS -->
	<script src="/social/application/views/styles/js/jquery-1.9.1.js"></script>
	<script src="/social/application/views/styles/js/jquery-ui-1.10.3.custom.js"></script>
	<script src="/social/application/views/styles/js/bootstrap.js"></script>
	<script src="/social/application/views/styles/js/json2.js"></script>
  <script src="/social/application/views/styles/js/myscripts.js"></script>
	<script src="/social/application/views/styles/js/xmlhttprequest.js"></script>
	<script src="/social/application/views/styles/js/9.less-1.3.0.min.js"></script>

	<script>
       $(document).ready (function() {
          $('#data').datepicker();
          $('#data1').datepicker();

          $.datepicker.regional['ru'] = { 
            closeText: 'Закрыть', 
            prevText: '&#x3c;Пред', 
            nextText: 'След&#x3e;', 
            currentText: 'Сегодня', 
            monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь', 
            'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'], 
            monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн', 
            'Июл','Авг','Сен','Окт','Ноя','Дек'], 
            dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'], 
            dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'], 
            dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'], 
            dateFormat: 'dd.mm.yy', 
            firstDay: 1, 
            isRTL: false 
            }; 
            $.datepicker.setDefaults($.datepicker.regional['ru']); 
       });

  </script>
  <?
     $count = getCountOfClaims($_SESSION['uid']);
     $countOfInput = CountOfInput($_SESSION['uid']);
     $countOfOutput = CountOfOutput($_SESSION['uid']);
     $countClosed = getCountofClosed($_SESSION['id_dep']);

     $username = $_SESSION['username'];

     $components = split(' ', $username);

     $lastname =  $components[0];
     $name = $components[1];

  ?>
</head>
<body id="body">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="index.php"><b>Покровская обитель</b></a>
   		</div>
   		<div class="col-lg-6 col-xs-12">
				<div class="row">
					<form class="col-lg-5 navbar-form navbar-left" role="search" method="POST" action="?option=search">
       					<div class="form-group">
          					<input type="text" style="width: 400px;" class="form-control" placeholder="Поиск пациента или персонала" name="txtSearch" id="search">
        				</div>
        				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Найти</button>
      		</form>
      	</div>
      </div>
      		<ul class="nav navbar-nav navbar-right">
            <li id="files"><a href="?option=files"><span class="glyphicon glyphicon-paperclip"></span> Файловый архив</a></li>
       			<li class="dropdown">
   					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$lastname.' '.$name; ?> <span class="caret"></span></a>
    				<ul class="dropdown-menu">
      					<li><a href="?option=change"><span class="glyphicon glyphicon-pencil"></span> Редактировать свой профиль</a></li>
    				</ul>
    			  </li>
            <li><a href="?option=logOut"><span class="glyphicon glyphicon-log-out"></span> Выйти</a></li>
        	 </ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="col-lg-3 col-xs-12">
			<ul class="nav nav-pills nav-stacked">
  				<li class="active" id="main"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Главная страница</a></li>
          <li id="contacts"><a href="?option=allpersonal"><span class="glyphicon glyphicon-th-list"></span> Табель сотрудников</a></li>
          <li id="patients"><a href="?option=allpatients"><span class="glyphicon glyphicon-th-list"></span> Ведомость о Пациентах</a></li>
          <li id="schedule"><a href="?option=schedule&data=<?=date('d.m.20y'); ?>"><span class="glyphicon glyphicon-list-alt"></span> Расписание</a></li>
          <li id="medicines"><a href="?option=medicines"><span class="glyphicon glyphicon-leaf"></span> Медикаменты</a></li>
          <li id="costs"><a href="?option=costs"><span class="glyphicon glyphicon-link"></span> Расходные материалы</a></li>
          <li id="chemists"><a href="?option=chemists"><span class="glyphicon glyphicon-asterisk"></span> Аптеки Партнеры</a></li>
  				<!-- <?php if ($_SESSION['role'] == '1') { ?>
          <li id="addclaim"><a href="?option=addpersonal"><span class="glyphicon glyphicon-tag"></span> Добавить персонал</a></li>
          <? } ?>-->
			</ul>
		</div>
		<div class="col-lg-9 col-xs-12 add_claim">
			 <?=$content; ?>
		</div>
	</div>
<hr>
</body>

</html>