<?php
// $server = 'localhost:3306';
// $username = 'root';
// $password = '';
// $database = 'burgerbistro';

// try {
//   $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
// } catch (PDOException $e) {
//   die('Connection Failed: ' . $e->getMessage());
// }

function ConectarDB(){
  $conex = mysqli_connect("localhost","root","");
  if(!$conex){
    die("Error: ".mysqli_error());
  }

  $database = mysqli_select_db("burgerbistro",$conex);
  if(!$database){
    die("Error: ".mysqli_error());
  }

}
