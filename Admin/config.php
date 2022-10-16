<?php
    include "Connection/database.php";

    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion'];
    $precio = $_REQUEST['precio'];

    $nombre_img = $_FILES['imagen']['name']; //Contiene el nombre del archivo
    $archivo = $_FILES['imagen']['tmp_name']; // Contiene el archivo como tal

    $ruta = "images";
    $ruta = $ruta."/".$nombre_img; // Images/nombre.jpg

    move_uploaded_file($archivo,$ruta);

    //= $query = mysql_query("INSERT INTO productos VALUES ('','".$nombre."','".$descripcion.'",'".$precio.'",'".$ruta."',)"); 

    $query = mysql_query("INSERT INTO productos VALUES ()");

    if($query){
        echo "Insertado correctamente";
    } else {
        echo "Error al insertar";
    }
