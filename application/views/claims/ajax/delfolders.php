<?php

include('config.php');

$inputs = $_POST['inputs'];


for($i = 0; $i < count($inputs); $i++) {
    $sql = "DELETE FROM category WHERE id=".$inputs[$i];
    mysql_query($sql);
   // echo $sql;
}

?>