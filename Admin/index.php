<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Productos</h1>
    <form action="config.php" method="post" enctype="multipart/form-data">
        <!-- required es para que se tengan que llenar los campos si o si  -->
        <label for="">Ingresa el nombre del producto</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="">Ingresa la descripción</label>
        <input type="text" name="descripcion" required>
        <br>
        <label for="">Ingresa el precio</label>
        <input type="text" name="precio" required>
        <br>
        <label for="">Seleccione la imagen que desea subir</label>
        <input type="file" name="imagen" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>