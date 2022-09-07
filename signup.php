<?php 
    require 'conexion.php';

    $message = '';

    if(!empty($_POST['usuario']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $sql = 'INSERT INTO usuarios (usuario,email,passwor) VALUES (:usuario, :email, :password)'; //! solucionar este error 
        $stmt = $conexion->prepare($sql);
        $stmt-> bindParam(':usuario',$_POST['usuario']);
        $stmt-> bindParam(':email',$_POST['email']);
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $stmt-> bindParam(':password',$_POST['password']);

        if($stmt->execute()){
            $message = 'Creación de cuenta exitosa!';
        } else {
            $message = 'Ups!, hubo un error al crear tú cuenta';
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>

    <!-- Mensaje de creacion de cuenta -->
    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Registro</h1>
    <span>ó <a href="login.php">Inicia sesión</a></span>

    <form action="signup.php" method="post">
        <input type="text" name="usuario" placeholder="Ingresa tú nombre">
        <input type="text" name="email" placeholder="Ingresa tú email">
        <input type="password" name="password" placeholder="Ingresa tú contraseña">
        <input type="password" name="confirm_password" placeholder="Confirma tú contraseña">
        <input type="submit" value="Enviar">
    </form>
    <hr>
    <a href="/burguershop">Inicio</a>
</body>
</html>