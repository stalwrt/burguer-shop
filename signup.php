<?php 
    require 'conexion.php';

    $message = '';

    if(!empty($_POST['usuario']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $sql = "INSERT INTO usuarios (email,passwor) VALUES (:email, :password)"; //Porque cambia el color de password pero no de email? cual de los dos está mal?
        $stmt = $conexion->prepare($sql);

        //* bind_param es para vincular parametros
        $stmt -> bind_param(':email',$_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt -> bind_param(':pasword', $password);

        if($stmt->execute()){
            $message = 'Creación de cuenta exitosa!';
        } else {
            $message = 'Ups!, ocurrió error al crear tú cuenta';
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
    <span>ó <a href="login.php">Inicia sesión</a></span> <!-- cambiar esto a login.php  -->

    <form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Ingresa tú email">
        <input type="password" name="password" placeholder="Ingresa tú contraseña">
        <input type="password" name="confirm_password" placeholder="Confirma tú contraseña">
        <input type="submit" value="Enviar">
    </form>
    <hr>
    <a href="/burguershop">Inicio</a>
</body>
</html>