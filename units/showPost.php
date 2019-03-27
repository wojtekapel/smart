<?php
include "../class/database.php";

$db = new db();

if(isset($_GET['number'])) {

  $postNumber = $_GET['number'];
  $query = "SELECT * FROM posts WHERE id = ".$postNumber;
  $result = $db->get($query)->fetch_assoc();
  // Array ( [id] => 4 [userid] => 1 [content] => Przykładowy post [json] =>
  // {"time":"09:55:16","date":"2019:03:08","user":"biszkopt","userId":"1","theme":"Temat postu"} ) biszkopt
  $json = json_decode($result['json']);
  $content = $result['content'];
  echo'

  <div class="media  p-1 ">

      <div class="media-body shadow white padding">
          <h4 class="link">'.$json->theme.'</h4>
          '.$content.'

      </div>
  </div><br/>';
}






 ?>
