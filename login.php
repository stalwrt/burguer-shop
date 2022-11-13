<?php

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: index.php');
}
require 'Lib/Connection/dbUsuario.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT idUsuario, email, password FROM usuarios WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['idUsuario'];
    header("Location: index.php");
    $message = 'Hola';
  } else {
    $message = 'Ups, las credenciales no coinciden';
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Bistro Online | Login</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <?php require 'Templates/menu.php' ?>

  <?php if (!empty($message)) : ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <!-- <section class="login">
    <div class="login_box">
      <div class="left">
        <div class="top_link"><a href="/burger_shop/"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Regresar al inicio</a></div>
        <div class="contact">
          <form action="login.php" method="POST">
            <h3>Inicio de sesión</h3>
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Contraseña">
            <button class="submit" type="submit">Enviar</button>
            <br>
            <span>¿No tienes una cuenta? <a href="signup.php">Registrate</a></span>
          </form>
        </div>
      </div>
      <div class="right">
        <div class="right-text">
          <h2>Burger Bistro</h2>
          <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, maiores.</h5>
        </div>
        <div class="right-inductor"><img src="" alt=""></div>
      </div>
    </div>
  </section> -->

  <!-- -----------------------------------  -->
  <main class="content-login">
    <div class="login-card">
      <h2>Login</h2>
      <form class="login-form" action="login.php" method="POST">
        <input class="control" type="text" placeholder="Email" name="email">

        <input class="control" id="password" type="password" placeholder="Contraseña" name="password">

        <!-- <div class="password">
          <input class="control" id="password" type="password" placeholder="Contraseña">
          <button class="toggle" type="button" onclick="togglePassword(this)"></button>
        </div> -->

        <button class="control" type="submit">Enviar</button>
        <h3>¿No tienes una cuenta?, <a href="signup.php">Crea una</a></h3>
      </form>
    </div>
  </main>

  <script src="Assets/JS/main.js"></script>
</body>

</html>