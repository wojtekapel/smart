<?php

include "../class/database.php";
$db = new db();
$password = $_POST['pass'];
$db->addUser($_POST['login'], $password, $_POST['repassword']);

// header('location: /forum');
 ?>
