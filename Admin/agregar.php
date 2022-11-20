<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php

    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];

        include("Connection/db.php");

        //° INSERT INTO PRODUCTOS
        $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria) VALUES ('" . $nombre . "','" . $descripcion . "','" . $precio . "', '" . $categoria . "')";

        $resultado = mysqli_query($mysqli, $sql);

        if ($resultado) {
            // Los datos ingresaron a la base de datos 
            echo
            "<script language='JavaScript'>
                window.alert('Los datos fueron ingresados correctamente a la Base de Datos');
            </script> 

            location.assign('index.php');";
        } else {
            // Los datos NO ingresaron a la base de datos 
            echo
            "<script language='JavaScript'>
                window.alert('ERROR: Los datos NO fueron ingresados a la Base de Datos');
            </script> 

            location.assign('index.php');";
        }

        mysqli_close($mysqli);
    } else {
    ?>

        <h1>Agregar nuevo productos</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="">Nombre del producto</label>
            <input type="text" name="nombre" placeholder="Ingresa el nombre">

            <br>

            <label for="">Descripción del producto</label>
            <input type="text" name="descripcion" placeholder="Ingresa la descripción">

            <br>

            <label for="">Precio del producto</label>
            <input type="text" name="precio" placeholder="Ingresa el precio">

            <br>

            <label for="">Categoria del producto</label>
            <select name="categoria" id="">
                <option value="hamburguesas">Hamburguesa</option>
                <option value="bebidas">Bebida</option>
            </select>

            <input type="submit" name="enviar" value="Agregar">

            <a href="index.php">Regresar</a>
        </form>

    <?php
    }
    ?>
</body>

</html>