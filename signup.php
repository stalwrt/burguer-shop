<?php

  require 'Config/Connection/database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Creación de usuario exitosa';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro | Bistro Shop</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/style.css">
  </head>
  <body>

  <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
  <!-- agregar un link para ir al login  -->
  <section class="login">
      <div class="login_box">
        <div class="left">
          <div class="top_link">
            <a href="/burguershop/" src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download">Regresar a Inicio</a>
          </div>
          <div class="contact">
          <form action="signup.php" method="POST">
          <h3>Registrarse</h3>
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Contraseña">
            <input name="confirm_password" type="password" placeholder="Confirma tu contraseña">
            <button class="submit" type="submit">Vamos!</button>
          </form>
          </div>
        </div>
        <div class="right">
          <div class="right-text">
            <h2>Bistro Shop</h2>
            <h5>La mejor tienda en linea</h5>
          </div>
          <div class="right-inductor">
            <img src="" alt="">
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
