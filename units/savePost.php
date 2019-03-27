<?php
include "../class/database.php";
session_start();
$db = new db();

$x = false;
if(isset($_POST['theme'])){

   if($_POST['theme'] !=''){
     if($_POST['content'] != ''){

       $data = date("Y:m:d");
       $time = date("H:i:s");
       echo $db->savePost($_SESSION['login'], $_POST['theme'], $_POST['content'], $data, $time);


     }
     else $x = true;
   }
   else $x = true;

}

if($x)echo 'Coś nic nie wpisałeś.';

 ?>
