<?php
include "Connection/database.php";

// $nombre = $_REQUEST['nombreProducto'];
// $descripcion = $_REQUEST['descripcionProducto'];
// $precio = $_REQUEST['precioProducto'];

// $nombre_img = $_FILES['imagenProducto']['name']; //+Contiene el nombre del archivo
// $archivo = $_FILES['imagenProducto']['tmp_name']; //+ Contiene el archivo como tal

// $ruta = "images";
// $ruta = $ruta . "/" . $nombre_img; // Images/nombre.jpg

// move_uploaded_file($archivo, $ruta);

// //= $query = mysql_query("INSERT INTO productos VALUES ('','$nombre','$descripcion','$precio','$ruta')");

// $query = "INSERT INTO productos VALUES('','$nombre','$descripcion','$precio','$ruta')";

// if ($query) {
//     echo "Insertado correctamente";
// } else {
//     echo "Error al insertar";
// }

// -----------------------------------------
$nombre = $conn->real_escape_string($_POST['nombreProducto']);
$descripcion = $conn->real_escape_string($_POST['descripcionProducto']);
$precio = $conn->real_escape_string($_POST['precioProducto']);
$nombre_img = $_FILES['imagenProducto']['name']; //+Contiene el nombre del archivo
$archivo = $_FILES['imagenProducto']['tmp_name']; //+ Contiene el archivo como tal

$ruta = "images";
$ruta = $ruta . "/" . $nombre_img; // Images/nombre.jpg

move_uploaded_file($archivo, $ruta);

$query = "INSERT INTO productos (idProducto, nombreProducto, descripcionProducto, precioProducto, imagenProducto) VALUES ('{}','{$nombre}','{$descripcion}','{$precio}','{$ruta}')";

$conn->query($query);

$conn->close();
