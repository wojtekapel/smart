<?php

if(isset($_GET['login'])){
  $login = $_GET['login'];
  echo '<div class="media">
  <div class="media-left">
    <img src="img_avatar1.png" class="media-object" style="width:60px">
  </div>
  <div class="media-body">
    <h4 class="media-heading">'.$login.'</h4>
    <p>Witaj na forum '.$login.'</p>
  </div>
</div>';
}

 ?>
