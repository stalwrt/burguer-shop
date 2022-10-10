<?php
  session_start();

  require 'Config/Connection/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a Burger Bistro</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/style.css">
  </head>
  <body>
    <?php require 'Templates/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Has iniciado sesión
      <a href="Config/logout.php">
        Cerrar sesión 
      </a>
    <?php else: ?>
      <h1>Inicia sesión o crea una cuenta.</h1>

      <a href="login.php">Iniciar sesión</a> o
      <a href="signup.php">Registrarse</a>
    <?php endif; ?>
  </body>
</html>
