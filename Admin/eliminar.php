<?php

$id = $_GET['id'];

include("Connection/db.php");

$sql = "DELETE FROM productos WHERE id='" . $id . "'";

$resultado = mysqli_query($mysqli, $sql);

if ($resultado) {
    echo "
    <script language='JavaScript'>
        window.alert('Los datos se eliminarón correctamente de la Base de Datos');

        location.assign('index.php');
    </script>";
} else {
    echo "
    <script language='JavaScript'>
        window.alert('Los datos NO se eliminarón de la Base de Datos');

        location.assign('index.php');
    </script>";
}
