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
    $message = '<h2 style="color:blue;">Creación de usuario exitosa</h2>';
  } else {
    $message = '<h2 style="color:red;">Lo sentimos, hubo un error al crear tu cuenta</h2>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Bistro Online | Registro</title>
</head>

<body>

  <?php require 'Templates/menu.php' ?>

  <?php if (!empty($message)) : ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <main>
    <div>
      <h2>Registro</h2>
      <form action="signup.php" method="POST">
        <input type="text" placeholder="Email" name="email">

        <input id="password" type="password" placeholder="Contraseña" name="password">

        <input id="password" type="password" placeholder="Confirma tu contraseña" name="confirm_password">

        <button type="submit">Enviar</button>
        <h3>¿Ya tienes una cuenta?, <a href="login.php">Inicia sesión</a></h3>
      </form>
    </div>
  </main>

  <script src="Assets/JS/main.js"></script>

</body>

</html>