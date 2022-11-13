<?php
include "Connection/db.php";
?>

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
    <!-- quité temporalmente la accion ruta para pruebas  -->
    <form action="" method="post" enctype="multipart/form-data">
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
        <input type="file" name="foto" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    if (isset($_REQUEST['Enviar'])) {

        $nombre = $mysqli->real_escape_string($_POST['nombre']);
        $descripcion = $mysqli->real_escape_string($_POST['descripcion']);
        $precio = $mysqli->real_escape_string($_POST['precio']);

        if ($_FILES['foto']['name']) {
            $tipoArchivo = $_FILES['foto']['type'];
            $nombreArchivo = $_FILES['foto']['name'];
            $tamanoArchivo = $_FILES['foto']['size'];
            $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            include_once 'Connection/db.php';
            $mysqli = mysqli_connect("localhost", "root", "", "burgerbistro");
            $binariosImagen = mysqli_escape_string($mysqli, $binariosImagen);

            $query = "INSERT INTO productos (id, nombre, descripcion, precio, nombreImg, img, tipoImg) VALUES (null,'$nombre','$descripcion','$precio','$nombreArchivo','$binariosImagen','$tipoArchivo')";

            $res = mysqli_query($mysqli, $query);
            if ($res) {
                echo '<script>window.alert("Se ha actualizado correctamente");</script>';
            } else {
                echo '<script>window.alert("Ups, no se ha actualizado");</script>';
            }
        }
    }

    $query = ("SELECT nombreImg, img, tipoImg FROM productos");
    $res = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($res)) {
    ?>
        <!-- <form method="post" enctype="multipart/form-data">
            <div class="text-center">
                <img src="data:image/<?php echo $row['tipoimg'] ?>;base64,<?php echo base64_encode($row['img']) ?>" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50%;">
                <h6>sube una foto diferente...</h6>
                <input type="file" class="text-center center-block file-upload" name="foto">
                <br>
                <hr>

                <button class="btn btn-lg btn-success" name="guardarFoto" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Guardar foto</button>
            </div>
        </form> -->

        </hr><br>
    <?php
    }
    ?>

    <?php

    $mysqli->query($query);

    $mysqli->close();

    ?>
</body>

</html>