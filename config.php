<?php
  $server='localhost';
  $user='root';
  $password='';
  $database_name='se21253';

  $conn = mysqli_connect($server,$user, $password, $database_name);

  if(!$conn){
    die("connection failed: ".mysqli_connect_error());
  }
?>