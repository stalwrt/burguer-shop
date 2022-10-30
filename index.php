<?php
session_start();

require 'Lib/Connection/dbUsuario.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT idUsuario, email, password FROM users WHERE idUsuario = :idUsuario');
  $records->bindParam(':idUsuario', $_SESSION['user_id']);
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
  <title>Bistro Online | Inicio</title>
  <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>

  <?php
  include 'Lib/Connection/dbUsuario.php';
  //* include 'Templates/navbar.php';
  include_once('Templates/menu.php');
  ?>

  <div class="main-contenedor">
    <!-- SECCION DE LOGIN -->
    <?php require 'Templates/header.php' ?>

    <?php if (!empty($user)) : ?>
      <br> Bienvenido. <?= $user['email']; ?>
    <?php else : ?>
      <h1>Por favor, inicia sesión o registrate</h1>

      <a href="login.php">Inicia sesión</a> ó
      <a href="signup.php">Registrate</a>
    <?php endif; ?>

    <!-- FIN DE SECCION DE LOGIN -->

    <!-- CATALOGOS DE PRODUCTOS  -->
    <main>
      <h2>Productos</h2>
      <br>
      <?php
      $response = json_decode(file_get_contents('http://localhost/burger_shop/api/productos/api-producto.php?categoria=hamburguesas'), true);

      if ($response['statuscode'] == 200) {
        foreach ($response['items'] as $item) {
          include('Templates/items.php');
        }
      } else {
        // mostrar error
      }
      ?>
    </main>

    <script type="text/javascript">
      const toggleSidebar = () => document.body.classList.toggle('open');
    </script>
    <script src="Assets/JS/main.js"></script>
</body>

</html>