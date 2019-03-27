<?php
include "../class/database.php";

$db = new db();

if(isset($_GET['name'])){
  echo $db->getUserId($_GET['name']);
}
else echo 'Podaj nazę użytkownika!';

 ?>
