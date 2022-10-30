<?php
session_start();

require 'Lib/Connection/dbUsuario.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT idUsuario, email, password FROM usuarios WHERE idUsuario = :idUsuario');
    $records->bindParam(':idUsuario', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bistro Online | Sesión</title>
    <link rel="stylesheet" href="Assets/CSS/style.css">
</head>

<body>
    <?php
    include_once 'Templates/menu.php';
    ?>
    <div class="main-contenedor">
        <!-- SECCION DE LOGIN -->

        <?php if (!empty($user)) : ?>
            <br> Hola. <?= $user['email']; ?>
            <br>Has iniciado sesión
            <a href="/burger_shop/Lib/logout.php">
                Cerrar sesión
            </a>
        <?php else : ?>
            <h1>Por favor, inicia sesión o registrate</h1>

            <a href="login.php">Inicia sesión</a> ó
            <a href="signup.php">Registrate</a>
        <?php endif; ?>

        <!-- FIN DE SECCION DE LOGIN -->
    </div>
</body>

</html>