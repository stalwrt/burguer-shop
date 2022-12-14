<?php

require 'Config/Connection/database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);

  if ($stmt->execute()) {
    $message = 'Creación de usuario exitosa!';
  } else {
    //! cambiar este mensaje
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

  <!-- <?php require 'Templates/header.php' ?> -->

  <?php if (!empty($message)) : ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <!-- <h1>Registro</h1>
  <span>ó <a href="login.php">Inicia sesión</a></span>

  <form action="signup.php" method="POST">
    <input name="email" type="text" placeholder="Escribe tu email">
    <input name="password" type="password" placeholder="Escribe tu contraseña">
    <input name="confirm_password" type="password" placeholder="Confirma tu contraseña">
    <input type="submit" value="Submit">
  </form> -->

  <section class="login">
    <div class="login_box">
      <div class="left">
        <div class="top_link"><a href="/burger_shop/"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Regresar al inicio</a></div>
        <div class="contact">
          <form action="signup.php" method="POST">
            <h3>Registro</h3>
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Contraseña">
            <input name="confirm_password" type="password" placeholder="Confirma tu contraseña">
            <button class="submit" type="submit">Enviar</button>
            <br>
            <span>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></span>
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