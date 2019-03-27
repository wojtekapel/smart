<?php
include "../class/database.php";

$db = new db();

// $results = $db->get($query);
  if(isset($_GET['post'])){
    $query = "SELECT * FROM posts WHERE id =".$_GET['post'];
    echo $db->get($query)->fetch_assoc()['json'];
  }
  else{
    $query = "SELECT * FROM posts WHERE 1";
    $result = $db->get($query);

      while($row = $result->fetch_assoc()){
        $json = json_decode($row['json']);
        $rowId = $row['id'];
        echo'

        <div class="media  p-1 ">

            <div class="media-body shadow white">
                <h6 class="link" id="link'.$rowId.'" onclick="linkClick(this.id)">'.$json->theme.'</h6>
                <p> <small><i>  Założony '.$json->date.' - '.$json->time.'</i>     przez </small><span class="greenUser">'.$json->user.' </span></p>
            </div>
        </div><br/>';
      }
  }





 ?>
