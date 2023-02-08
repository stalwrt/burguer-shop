<?php
include("Connection/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php
    if (isset($_POST['enviar'])) {
        // cuando se presiona el botón enviar
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];

        $sql = "UPDATE productos SET nombre='" . $nombre . "', descripcion='" . $descripcion . "', precio='" . $precio . "', categoria='" . $categoria . "' WHERE id='" . $id . "'";

        $resultado = mysqli_query($mysqli, $sql);

        if ($resultado) {
            echo "
            <script language='JavaScript'>
                window.alert('Los datos fueron actualizados correctamente');

                location.assign('index.php');
            </script> ";
        } else {
            echo "
            <script language='JavaScript'>
                window.alert('Los datos NO fueron actualizados');

                location.assign('index.php');
            </script> ";
        }
        mysqli_close($mysqli);
    } else {
        // cuando NO se presiona el botón enviar
        $id = $_GET['id'];
        $sql = "SELECT * FROM productos WHERE id='" . $id . "'";
        $resultado = mysqli_query($mysqli, $sql);

        $fila = mysqli_fetch_assoc($resultado);

        $nombre = $fila["nombre"];
        $descripcion = $fila["descripcion"];
        $precio = $fila["precio"];
        $categoria = $fila["categoria"];

        mysqli_close($mysqli);
    ?>
        <div class="caja">
            <h1>Editar producto</h1>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nuevo nombre">

                <br>

                <label for="">Descripcion</label>
                <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" placeholder="Nueva descripción">

                <br>

                <label for="">Precio</label>
                <input type="text" name="precio" value="<?php echo $precio; ?>" placeholder="Nuevo precio">

                <br>

                <label for="">Categoria</label>
                <select name="categoria" id="">
                    <option value="<?php echo $categoria; ?>"></option> <!-- No estoy seguro de si debe ir este echo o no  -->
                    <!-- Creo que no es necesario, solo es para llenar el campo y saber que categoria es, pero de todas formas lo dejo  -->
                    <!-- YA CONFIRMÉ DE QUE FUNCIONA, ASI QUE MEJOR NO TOCO NADA  -->
                    <option value="hamburguesas">Hamburguesa</option>
                    <option value="bebidas">Bebida</option>
                    <option value="alitas">Alitas</option>
                    <option value="sides">Sides</option>
                </select>

                <br>

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <input type="submit" value="ACTUALIZAR" name="enviar">

                <a href="index.php">Regresar</a>
            </form>

        </div>

    <?php
    }
    ?>
</body>

</html>