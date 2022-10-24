<?php
include 'Connection/database.php';

$result = $conn->query("SELECT imagenProducto FROM productos");

if ($result->mysql_num_rows > 0) {
    $imgData = $result->fetch();

    // render imagen 
    header("Content-Type: image/jpg");
    echo $imgData;
} else {
    echo "Image not found";
}
