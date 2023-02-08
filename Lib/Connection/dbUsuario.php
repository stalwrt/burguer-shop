<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'burgerbistro';

// $server = 'localhost';
// $username = 'u573435260_root';
// $password = 'Leonardo286';
// $database = 'u573435260_burgerbistro';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
