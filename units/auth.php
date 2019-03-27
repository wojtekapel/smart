<?php
session_start();
include "../class/database.php";
$db = new db();
    if(isset($_GET['login'])){
      $login = $_GET['login'];
      $query = "SELECT * FROM users WHERE login ='".$login."'";
      //
      if($db->get($query)->num_rows){
        if(isset($_GET['password'])){
          $pass = $db->get($query)->fetch_assoc();
              if($_GET['password'] != $pass['password']) {
                echo "no access";
                unset($_SESSION['login']);
              }
              else {

                echo "login";
                $_SESSION['login'] = $_GET['login'];
              }
        }
        else echo "exist";
      //
      }
      else echo "none";

    }
    else echo "error";
