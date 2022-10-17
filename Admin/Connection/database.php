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

function ConectarDB()
{
  $conex = mysqli_connect("localhost", "root", "");
  $error_message = mysqli_error($conex);

  if (!$conex) {
    echo "Query failed: " . $error_message;
    // die("Error: " . mysqli_error($conex));
  }

  $database = mysqli_select_db("burgerbistro", $conex);

  if (!$database) {
    die("Error: " . mysqli_error());
  }
}
