<?php
include "Connection/database.php";
//! require "Connection/database.php";
//= $query = "SELECT * FROM productos";

$nombre = $_REQUEST['nombreProducto'];
$descripcion = $_REQUEST['descripcionProducto'];
$precio = $_REQUEST['precioProducto'];

$nombre_img = $_FILES['imagenProducto']['name']; //+Contiene el nombre del archivo
$archivo = $_FILES['imagenProducto']['tmp_name']; //+ Contiene el archivo como tal

$ruta = "images";
$ruta = $ruta . "/" . $nombre_img; // Images/nombre.jpg

move_uploaded_file($archivo, $ruta);

//= $query = mysql_query("INSERT INTO productos VALUES ('','".$nombre."','".$descripcion.'",'".$precio.'",'".$ruta."',)"); 

//| $query = mysql_query("INSERT INTO productos VALUES ()");

$query = "INSERT INTO productos VALUES('','$nombre','$descripcion','$precio','$ruta')";

if ($query) {
    echo "Insertado correctamente";
} else {
    echo "Error al insertar";
}
