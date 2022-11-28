<?php

require 'Lib/Connection/dbUsuario.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);

  if ($stmt->execute()) {
    $message = 'Successfully created new user';
  } else {
    $message = 'Sorry there must have been an issue creating your account';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Bistro Online | Registro</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <?php require 'Templates/menu.php' ?>

  <?php if (!empty($message)) : ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <main class="content-login">
    <div class="login-card">
      <h2>Registro</h2>
      <form class="login-form" action="signup.php" method="POST">
        <input class="control" type="text" placeholder="Email" name="email">

        <!-- <div class="password"> -->
        <input class="control" id="password" type="password" placeholder="Contraseña" name="password">
        <!-- <button class="toggle" type="button" onclick="togglePassword(this)"></button> -->

        <input class="control password2" id="password" type="password" placeholder="Confirma tu contraseña" name="confirm_password">
        <!-- <button class="toggle" type="button" onclick="togglePassword(this)"></button> -->
        <!-- </div> -->

        <button class="control" type="submit">Enviar</button>
        <h3>¿Ya tienes una cuenta?, <a href="login.php">Inicia sesión</a></h3>
      </form>
    </div>
  </main>

  <script src="Assets/JS/main.js"></script>

</body>

</html>