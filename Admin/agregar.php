<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
</head>

<body>
    <?php

    if (isset($_POST['enviar'])) {

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];

        include("Connection/db.php");

        //! CÓDIGO PARA SUBIR IMAGEN A LA BASE DE DATOS 

        $nombreIMG = $_FILES['imagen']['name']; // Obtiene el nombre del archivo
        $archivo = $_FILES['imagen']['tmp_name']; //Contiene el archivo

        $ruta = "Admin/Images";
        $ruta2 = "Images";

        $ruta = $ruta . "/" . $nombreIMG; // Images/nombre.jpg
        $ruta2 = $ruta2 . "/" . $nombreIMG;

        move_uploaded_file($archivo, $ruta);
        move_uploaded_file($archivo, $ruta2);

        //! FIN DE CODIGO PARA SUBIR IMAGEN 

        $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria,imagen) VALUES ('" . $nombre . "','" . $descripcion . "','" . $precio . "', '" . $categoria . "', '" . $ruta . "')";

        $resultado = mysqli_query($mysqli, $sql);

        if ($resultado) {
            // Los datos ingresaron a la base de datos 
            echo
            "<script language='JavaScript'>
                window.alert('Los datos fueron ingresados correctamente a la Base de Datos');

                location.assign('index.php');
            </script>";
        } else {
            // Los datos NO ingresaron a la base de datos 
            echo
            "<script language='JavaScript'>
                window.alert('ERROR: Los datos NO fueron ingresados a la Base de Datos');

                location.assign('index.php');
            </script>";
        }


        mysqli_close($mysqli);
    } else {
    ?>
        <div class="caja">
            <h1>Agregar nuevo productos</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <label for="">Nombre del producto</label>
                <input type="text" name="nombre" placeholder="Ingresa el nombre" required>

                <br>

                <label for="">Descripción del producto</label>
                <input type="text" name="descripcion" placeholder="Ingresa la descripción" required>

                <br>

                <label for="">Precio del producto</label>
                <input type="text" name="precio" placeholder="Ingresa el precio" required>

                <br>

                <label for="">Categoria del producto</label>
                <select name="categoria" id="" required>
                    <option value="hamburguesas">Hamburguesa</option>
                    <option value="bebidas">Bebida</option>
                    <option value="alitas">Alitas</option>
                    <option value="sides">Sides</option>
                </select>

                <br>

                <label for="">Seleccionar imagen</label>
                <br>
                <input type="file" name="imagen" required>

                <br>

                <input type="submit" name="enviar" value="Agregar">

                <a href="index.php">Regresar</a>
            </form>

        </div>

    <?php
    }
    ?>
</body>

</html>