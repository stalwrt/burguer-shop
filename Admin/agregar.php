<?php
include "Connection/db.php";

$nombre = $mysqli->real_escape_string($_POST['nombre']);
$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
$precio = $mysqli->real_escape_string($_POST['precio']);

$query = "INSERT INTO productos (id, nombre, descripcion, precio, imagen) VALUES (null,'$nombre','$descripcion','$precio','$ruta')";

//= --------------------------------------------------------------------------
if (isset($_REQUEST['Enviar'])) {
    if ($_FILES['foto']['name']) {
        $tipoArchivo = $_FILES['foto']['type'];
        $nombreArchivo = $_FILES['foto']['name'];
        $tamanoArchivo = $_FILES['foto']['size'];
        $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
        include_once 'Connection/db.php';
        $con = mysqli_connect("localhost", "root", "", "burgerbistro");
        $binariosImagen = mysqli_escape_string($con, $binariosImagen);

        //| poner la condicion del id del producto 
        $query = ("UPDATE productos SET nombreImg='" . $nombreArchivo . "', img='" . $binariosImagen . "', tipoImg='" . $tipoArchivo);

        $res = mysqli_query($con, $query);
        if ($res) {
            echo '<script>window.alert("Se ha actualizado la imagen");</script>';
        } else {
            echo '<script>window.alert("No se ha actualizado la imagen");</script>';
        }
    }
}

include_once 'Connection/db.php';
$con = mysqli_connect("localhost", "root", "", "burgerbistro");

//| poner la condicion del id del producto 
$query = ("SELECT nombreimg, img, tipoimg FROM productos WHERE IdUsuario = '" . $_SESSION['s_IdUsuario'] . "' ");
$res = mysqli_query($con, $query);
// while ($row = mysqli_fetch_array($res)) {


$mysqli->query($query);

$mysqli->close();
