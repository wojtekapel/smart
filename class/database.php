<?php




class db {




  public function get($query){

    // $connect = @new mysqli('mysql.cba.pl', 'radiogielda', 'Stefan1234', '4ham');
    $connect = @new mysqli('localhost', 'root', 'titop630', 'smart');
    mysqli_query($connect, "SET CHARSET utf8");
    mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");


      if($connect->connect_errno > 0 ){
        echo 'błąd połączenia z bazą danych';
      }
      else{

        $result = $connect->query($query);

        $connect->close();
        return $result;
       }

  }

  public function set($query){

    $polaczenie = new mysqli('localhost', 'root', 'titop630', 'smart');
    // $polaczenie = new mysqli('mysql.cba.pl', 'radiogielda', 'Stefan1234', '4ham');
    mysqli_query($polaczenie, "SET CHARSET utf8");
    mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
    $query = str_replace('drop','', $query);
    $polaczenie->query($query);
    $polaczenie->close();
    return;
  }
  
  public function insert_data($json, $lat, $lon){

    $temp = json_decode($json);

    $czas = date('H:i:s');
    $data = date('Y-m-d ');


    $query = "INSERT INTO dest VALUES";
    $_query = "(NULL, '$temp->nameNowy', '$lat', '$lon', '$json' )";
    $query_ = $query.$_query;

    $this->set($query_);
    // echo $query_;
    return;
  }


  public function addUser($login, $password, $repassword){
    $query = "INSERT INTO users VALUES";
    $_query = "(NULL, '$login', '$password', '')";
    $query = $query.$_query;
    $db->set($query);
  }

  public function savePost($user, $theme, $content, $data, $time){


    $userId = $this->getUserId($user);

    $obj = new stdClass();
    $obj->time = $time;
    $obj->date = $data;
    $obj->user = $user;
    $obj->userId = $userId;
    $obj->theme = $theme;

    $json = json_encode($obj);

    $query = "INSERT INTO posts VALUES";
    $_query = "(NULL, $userId,'$content','$json')";
    $query = $query.$_query;
    $this->set($query);


  }

  public function getUserId($userName){
    $query = "SELECT id FROM users WHERE login = '".$userName."'";
    $result = $this->get($query)->fetch_assoc();

    return $result['id'];

  }

  public function getUserName($userId){
    $query = "SELECT login FROM users WHERE id = ".$userId;
    $result = $this->get($query)->fetch_assoc();
    return $result['login'];
  }

  }
