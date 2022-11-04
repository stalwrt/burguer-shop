<?php
include "Connection/db.php";

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

//° -------------------------------------------------------------
$nombre = $mysqli->real_escape_string($_POST['nombre']);
$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
$precio = $mysqli->real_escape_string($_POST['precio']);
$nombre_img = $_FILES['imagen']['name']; //+Contiene el nombre del archivo
$archivo = $_FILES['imagen']['tmp_name']; //+ Contiene el archivo como tal

$ruta = "images";
$ruta = $ruta . "/" . $nombre_img; // Images/nombre.jpg

move_uploaded_file($archivo, $ruta);

$query = "INSERT INTO productos (id, nombre, descripcion, precio, imagen) VALUES (null,'$nombre','$descripcion','$precio','$ruta')";

$mysqli->query($query);

$mysqli->close();
