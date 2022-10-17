<?php
session_start();

require 'Config/Connection/database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT idUsuario, email, password FROM usuarios WHERE idUsuario = :idUsuario');
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
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/CSS/style.css">
  <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- SECCION DE LOGIN -->
  <?php require 'Templates/header.php' ?>

  <?php if (!empty($user)) : ?>
    <br> Bienvenido. <?= $user['email']; ?>
    <br>Has iniciado sesión
    <a href="logout.php">
      Cerrar sesión
    </a>
  <?php else : ?>
    <h1>Por favor, inicia sesión o registrate</h1>

    <a href="login.php">Login</a> or
    <a href="signup.php">SignUp</a>
  <?php endif; ?>

  <!-- FIN DE SECCION DE LOGIN -->

  <!-- CATALOGOS DE PRODUCTOS  -->
  <h2>Productos</h2>

  <div class="contenedor">
    <?php
    include "Config/Connection/database.php";

    $query = "SELECT * FROM productos";
    $resultado = $conn->query($query);
    while ($row = $resultado->fetch()) {
    ?>

      <div class="card">
        <img src="data:image/jpg;base64, <?php echo base64_encode($row['imagenProducto']); ?>">
        <h4><?php echo $row['nombreProducto']; ?></h4>
        <p>
          <?php echo $row['descripcionProducto']; ?>
        </p>
        <span>
          <?php echo $row['precioProducto']; ?>
        </span>
        <a href="#">Comprar ahora</a>
      </div>

    <?php
    }
    ?>
  </div>

  <script src="Assets/JS/main.js"></script>
</body>

</html>