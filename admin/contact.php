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

  </script>
  <?
     $count = '';//getCountOfClaims($_SESSION['uid']);
     $countOfInput = '';//CountOfInput($_SESSION['uid']);
     $countOfOutput = '';//CountOfOutput($_SESSION['uid']);
     $countClosed = '';//getCountofClosed($_SESSION['id_dep']);


     $conn = mysql_connect('localhost', 'root', '');
     $db = mysql_select_db('dt',$conn);


     function getLastId() 
     {
      $sql = "SELECT id FROM contacts ORDER BY id DESC LIMIT 1";
      $res = mysql_query($sql);
      $row = mysql_fetch_object($res);

      return $row->id;
     }
     $sql = "SELECT * FROM department";
     $res = mysql_query($sql);
     while ($row = mysql_fetch_object($res))
      $dep[] = $row;


    $sql = "SELECT * FROM state";
    $res = mysql_query($sql);

    while($row = mysql_fetch_object($res))
      $state[] = $row;

    if (isset($_POST['submit'])) {
        
        $dep = $_POST['dep'];
        $sec = $_POST['sec'];
        $sex = $_POST['sex'];
        $lastname = $_POST['lastname'];
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $rank = $_POST['rank'];   
        $date_birth = $_POST['date_birth'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $m_phone = $_POST['m_phone'];
        $d_phone = $_POST['d_phone'];
        $education = $_POST['education'];
        $in_t = $_POST['in_t'];
        $out = $_POST['out'];
        $photo = $_FILES['photo']['name'];
        move_uploaded_file($_FILES["photo"]['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/dt/uploads/photos/".$_FILES["photo"]["name"]);

       $sql = "INSERT INTO contacts (id_dep, id_sec, position, rank, lastname, name, fname, sex, date_birth, id_state, id_city, email, in_t, out_t, photo)
                            VALUES('$dep', '$sec', '$position', '$rank', '$lastname', '$name', '$fname', '$sex', '$date_birth', '$state', '$city', '$email', '$in_t', '$out', '$photo')";

       mysql_query($sql);
       
       $k = getLastId() ;

       $sql = "INSERT INTO phone_contact (id_contact, phone)
                            VALUES('$k', '$m_phone')";
       mysql_query($sql);

       $sql = "INSERT INTO phone_contact (id_contact, phone)
                            VALUES('$k', '$d_phone')";
        mysql_query($sql);

       $sql = "INSERT INTO education_contact (id_contact, education)
                              VALUES('$k', '$education')";

        mysql_query($sql);
    }

  ?>
  <script>
     function getSec() {
      var id = $('#dep').val();

      $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: 'id='+id,
        success: function(result) {
          $('#sec').html(result);
          //alert(result);
        }
      })
     }

    function getCity() {

      var id = $('#state').val();

     $.ajax( {
      type: 'POST',
      url: 'ajax.php',
      data: 'state='+id,
      success: function(result) {
          $('#city').html(result);
      }
     })
    }

     $(document).ready( function() {
        $('#date').datepicker();

        $('#submit').click( function() {
        })
     })
  </script>
</head>
<body>
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
          <li ><a href="dep.php">Добавить департамент</a></li>
      <li ><a href="reddep.php">Редактировать департамент</a></li>
          <li ><a href="user.php">Добавить сотрудника</a></li>
          <li id="addcontact" class="active"><a href="contact.php"><span class="glyphicon glyphicon-floppy-saved"></span> Добавить контакт</a></li>
          <li id="contacts"><a href=""><span class="glyphicon glyphicon-th-list"></span> Контакты</a></li>
          <li id="chat"><a href="?option=chat"><span class="glyphicon glyphicon-comment"></span> Чат</a></li>
      </ul>
    </div>
    <div class="col-lg-9 add_claim">
    <form action="" method="post" enctype="multipart/form-data">
            <hr>
            <select name="dep" id="dep" class="form-control" onchange="getSec();">
              <option value="">Выберите департамент или филиал</option>
              <?php
                 for($i = 0; $i < count($dep); $i++) {
                  $id = $dep[$i]->id;
                  echo "<option value='$id'>".$dep[$i]->name_ru.' / '.$dep[$i]->name_tj.'</option>';
                }
              ?>
            </select>
            <br>
            <select name="sec" id="sec" class="form-control">

            </select>
            <br>
            <div class="form-group">
              <input type="text" class="form-control" name="in_t" placeholder="Внутренний телефон">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="out" placeholder="Городской">
            </div>
            <div class="form-group">
              <select name="sex" id="" class="form-control">
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="lastname" placeholder="Фамилия">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Имя">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="fname" placeholder="Отчество">
            </div>
             <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="position" placeholder="Должность">
            </div>
            <select name="rank" id="" class="form-control">
              <option value="2">Директор</option>
              <option value="5">Зам. Директор</option>
              <option value="3">Начальник отдела</option>
              <option value="4">Сотрудник</option>
            </select>
            <br>
            <div class="form-group">
              <input type="text" class="form-control" name="date_birth" placeholder="Дата рождения" id="date">
            </div>
            <div class="form-group">
              <select name="state" id="state" class="form-control" onchange="getCity(); ">
                <option value="">Выберите область</option>
                <? for($i = 0; $i < count($state); $i++) { ?>
                  <option value="<?=$state[$i]->id; ?>"><?=$state[$i]->name; ?></option>
                <? } ?>
              </select>
            </div>
            <div class="form-group">
              <select name="city" id="city" class="form-control">
                <option value="">Выберите город</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" id="" class="form-control" placeholder="Мобильный телефона ( рабочий )" name="m_phone">
            </div>
            <div class="form-group">
              <input type="text" id="" class="form-control" placeholder="Номер телефона ( дополнительный )" name="d_phone">
            </div>
            <div class="form-group">
                <label for="">Добавить фотографию:</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Добавить</button>
            </div>
          </form>   
    </div>
  </div>
</body>
</html>