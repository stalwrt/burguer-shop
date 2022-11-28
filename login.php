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
  } else {
    $message = 'Sorry, those credentials do not match';
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

  <main class="content-login">
    <div class="login-card">
      <h2>Login</h2>
      <form class="login-form" action="login.php" method="POST">
        <input class="control" type="text" placeholder="Email" name="email">

        <input class="control" id="password" type="password" placeholder="Contraseña" name="password">

        <button class="control" type="submit">Enviar</button>
        <h3>¿No tienes una cuenta?, <a href="signup.php">Crea una</a></h3>
      </form>
    </div>
  </main>

  <script src="Assets/JS/main.js"></script>
</body>

</html>