<?php
//include "Connection/db.php";

//$nombre = $mysqli->real_escape_string($_POST['nombre']);
//$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
//$precio = $mysqli->real_escape_string($_POST['precio']);

// $query = "INSERT INTO productos (id, nombre, descripcion, precio, imagen) VALUES (null,'$nombre','$descripcion','$precio','$ruta')";

//= --------------------------------------------------------------------------
// if (isset($_REQUEST['Enviar'])) {
//     if ($_FILES['foto']['name']) {
//         $tipoArchivo = $_FILES['foto']['type'];
//         $nombreArchivo = $_FILES['foto']['name'];
//         $tamanoArchivo = $_FILES['foto']['size'];
//         $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
//         $binariosImagen = fread($imagenSubida, $tamanoArchivo);
//         include_once 'Connection/db.php';
//         $con = mysqli_connect("localhost", "root", "", "burgerbistro");
//         $binariosImagen = mysqli_escape_string($con, $binariosImagen);

//         //| poner la condicion del id del producto 
//         $query = ("UPDATE productos SET nombreImg='" . $nombreArchivo . "', img='" . $binariosImagen . "', tipoImg='" . $tipoArchivo);

//         $res = mysqli_query($con, $query);
//         if ($res) {
//             echo '<script>window.alert("Se ha actualizado la imagen");</script>';
//         } else {
//             echo '<script>window.alert("No se ha actualizado la imagen");</script>';
//         }
//     }
// }

// include_once 'Connection/db.php';
// $con = mysqli_connect("localhost", "root", "", "burgerbistro");

//| poner la condicion del id del producto 
// $query = ("SELECT nombreimg, img, tipoimg FROM productos WHERE IdUsuario = '" . $_SESSION['s_IdUsuario'] . "' ");
// $res = mysqli_query($con, $query);
// while ($row = mysqli_fetch_array($res)) {


// $mysqli->query($query);

// $mysqli->close();

// ------------------------------------

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