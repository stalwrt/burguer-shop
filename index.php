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
  <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>

  <?php
  include 'Config/Connection/database.php';
  include 'Templates/navbar.php';
  ?>

  <div class="main-contenedor">
    <!-- SECCION DE LOGIN -->
    <?php require 'Templates/header.php' ?>

    <?php if (!empty($user)) : ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <!-- <br>Has iniciado sesión
      <a href="/burger_shop/Config/logout.php">
        Cerrar sesión
      </a> -->
    <?php else : ?>
      <h1>Por favor, inicia sesión o registrate</h1>

      <a href="login.php">Inicia sesión</a> ó
      <a href="signup.php">Registrate</a>
    <?php endif; ?>

    <!-- FIN DE SECCION DE LOGIN -->

    <!-- CATALOGOS DE PRODUCTOS  -->
    <h2>Productos</h2>

    <section class="card-container">
      <?php
      $query = $conn->query("SELECT * FROM productos");

      $query = "SELECT * FROM productos";

      if ($result = $conn->query($query)) {
        // fetch associative array
        while ($row = $result->fetch()) {
          $field1name = $row["nombreProducto"];
          $field2name = $row["descripcionProducto"];
          $field3name = $row["precioProducto"];
          $field4name = $row["imagenProducto"];

          //+ Solo me sirve como referencia 
          // echo '<b>' . $field1name . $field2name . '</b>';
          // echo $field3name . '<br/>';
          // echo $field4name;

          echo
          '<div class="card"> 
            <figure> 
              <img scr="">
            </figure> 
            <div class="contenido">
              <h3>' . $field1name . '</h3> 
              <p>' . $field2name . '</p> 
              <span class="precio"> $' . $field3name . '</span>
              <br>
              <a href="#">Saber más</a>
            </div>
          </div>';
        }
      }
      ?>
    </section>
  </div>

  <script type="text/javascript">
    const toggleSidebar = () => document.body.classList.toggle('open');
  </script>
</body>

</html>