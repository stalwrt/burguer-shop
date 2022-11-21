<?php
session_start();

require 'Lib/Connection/dbUsuario.php';

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
//* CÓDIGO PARA VER PRODUCTOS 
require 'Lib/Connection/database.php';

$db = new DB();
$con = $db->connect();

// No trae a la descripcion porque esa se llamará en los detalles del producto 
$sql = $con->prepare("SELECT id, nombre, precio FROM productos");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); // Llama a todos los productos que estén en está tabla
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
  include_once('Templates/menu.php');
  ?>
  <main>
    <!-- SECCION DE LOGIN -->
    <div id="bienvenida">
      <?php if (!empty($user)) : ?>
        <br>
        <h2>
          Bienvenido/a <?= $user['email']; ?>!
        </h2>
      <?php else : ?>
        <h2>Por favor, inicia sesión o registrate</h2>
        <a href="usuario.php">Inicia sesión</a> ó
        <a href="usuario.php">Registrate</a>
      <?php endif; ?>
    </div>

    <!-- FIN DE SECCION DE LOGIN -->

    <!-- CATALOGOS DE PRODUCTOS  -->

    <div class="card-container">
      <h2>Productos destacados</h2>
      <br>
      <?php
      foreach ($resultado as $row) {
      ?>
        <div class="card">
          <input type="hidden" id="id" value="<?php echo $row['id']; ?>">
          <div class="imagen">
            <img src="">
          </div>
          <div class="contenido">
            <h3><?php echo $row['nombre']; ?></h3>
            <span>$<?php echo $row['precio']; ?> MXN</span>
            <br>
            <button class="btn-add">Agregar al carrito</button>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </main>

  <?php include_once('Templates/footer.php'); ?>
  <script src="Assets/JS/main.js"></script>
</body>

</html>