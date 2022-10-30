<?php

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: /Burger_Shop/');
}
require 'Lib/Connection/dbUsuario.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT idUsuario, email, password FROM users WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['idUsuario'];
    header("Location: /Burger_Shop/");
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
  <!-- <?php require 'Templates/header.php' ?> -->

  <?php if (!empty($message)) : ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <!-- <h1>Inicio de sesión</h1>
  <span>ó <a href="signup.php">Registrate</a></span>

  <form action="login.php" method="POST">
    <input name="email" type="text" placeholder="Email">
    <input name="password" type="password" placeholder="Contraseña">
    <input type="submit" value="Submit">
  </form> -->

  <section class="login">
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
  </section>
</body>

</html>