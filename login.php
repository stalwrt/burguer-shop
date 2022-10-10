<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /burguershop/');
  }
  require 'Config/Connection/database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /burguershop/");
    } else {
      $message = 'Lo sentimos, las credenciales no coinciden';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login | Bistro Shop</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/style.css">
  </head>
  <body>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <section class="login">
      <div class="login_box">
        <div class="left">
          <div class="top_link">
            <a href="/burguershop/" src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download">Regresar a Inicio</a>
          </div>
          <div class="contact">
            <form action="login.php" method="POST">
              <h3>Iniciar sesión</h3>
              <input name="email" type="text" placeholder="Email">
              <input name="password" type="password" placeholder="Contraseña">
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
