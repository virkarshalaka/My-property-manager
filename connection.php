<?php

function Connect(){
  $server = "localhost";
  $username = "root";
  $password = "root";
  $db = "my_prop_manager";

  //create a connections
  $conn = mysqli_connect($server, $username, $password, $db);

  if(!$conn)
  {
    die("Connection failed " . mysqli_connect_error() );
  }else {
    //print("Connected!!");
  }
  return $conn;
}

 ?>
