<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <!-- aqui no es necesario llamar al header, solo necesitaria un icono para regresar al inicio  -->
    <h1>Login</h1>
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Ingresa tu email">
        <input type="password" name="password" placeholder="Ingresa tu contraseña">
        <input type="submit" value="Enviar">
    </form>
    <a href="/burguershop">Inicio</a>
</body>
</html>